<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Support\Str;
use Spatie\Browsershot\Browsershot;
use function Spatie\LaravelPdf\Support\pdf;

class DownloadSurveyController extends Controller
{
    public function __invoke(Survey $survey)
    {
        $survey->load(
            'patient',
            'questionnaireSurveys.questionnaire.questions.answers.choice',
            'questionnaireSurveys.questionnaire.choices.questionable',
            'questionnaireSurveys.questionnaire.questions.choices.questionable',
        );

//        return view('pdf.survey', compact('survey'));

        return pdf()
            ->view('pdf.survey', compact('survey'))
            ->withBrowsershot(function (Browsershot $browsershot) {
                $browsershot
                    ->setNpmBinary(config('services.browsershot.npm_path'))
                    ->setNodeBinary(config('services.browsershot.node_path'));

            })
            ->name(Str::kebab("$survey->title di {$survey->patient->full_name}.pdf"));
    }
}

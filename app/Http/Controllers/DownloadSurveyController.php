<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Support\Str;
use Spatie\Browsershot\Browsershot;
use Wnx\SidecarBrowsershot\BrowsershotLambda;
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

        return pdf()
            ->view('pdf.survey', compact('survey'))
            ->withBrowsershot(function (Browsershot $browsershot) {
                $browsershot = new BrowsershotLambda();

            })
            ->name(Str::kebab("$survey->title di {$survey->patient->full_name}.pdf"));

//        BrowsershotLambda::html(view('pdf.survey', compact('survey')))
//            ->save(Str::kebab("$survey->title di {$survey->patient->full_name}.pdf"));
    }
}

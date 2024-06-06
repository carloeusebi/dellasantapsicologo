<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Support\Str;
use Wnx\SidecarBrowsershot\BrowsershotLambda;

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

//        return pdf()
//            ->view('pdf.survey', compact('survey'))
//            ->name(Str::kebab("$survey->title di {$survey->patient->full_name}.pdf"));

        $base64 = BrowsershotLambda::html(view('pdf.survey', compact('survey')))
            ->base64pdf();

        $filename = Str::kebab("$survey->title di {$survey->patient->full_name}.pdf");

        file_put_contents($filename, base64_decode($base64));

        return response()->download($filename)->deleteFileAfterSend();
    }
}

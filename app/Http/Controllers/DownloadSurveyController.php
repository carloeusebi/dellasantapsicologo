<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Wnx\SidecarBrowsershot\BrowsershotLambda;

class DownloadSurveyController extends Controller
{
    public function __invoke(Survey $survey)
    {
        $survey->load(
            [
                'patient',
                'questionnaireSurveys.questionnaire.choices.questionable',
                'questionnaireSurveys.questionnaire.questions.choices.questionable',
                'questionnaireSurveys.questionnaire.questions.answers' => function (HasMany $query) use ($survey) {
                    $query->whereRelation('questionnaireSurvey', 'survey_id', $survey->id)
                        ->with('choice');
                }
            ]);

        $base64 = BrowsershotLambda::html(view('pdf.survey', compact('survey')))
            ->setOption('printBackground', true)
            ->base64pdf();

        $filename = Str::kebab("$survey->title di {$survey->patient->full_name}.pdf");

        file_put_contents($filename, base64_decode($base64));

        return response()->file($filename)->deleteFileAfterSend();
    }
}

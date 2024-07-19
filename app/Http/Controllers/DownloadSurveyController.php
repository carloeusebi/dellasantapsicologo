<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;
use Wnx\SidecarBrowsershot\BrowsershotLambda;

class DownloadSurveyController extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Survey $survey)
    {
        $this->authorize('view', $survey);

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
            ->margins(15, 0, 15, 0)
            ->showBrowserHeaderAndFooter()
            ->headerHtml(
                '<div style="display:flex; justify-content: space-between; font-size: 10px; width: 100%; margin: 0 24px">
                    <span>'.now()->translatedFormat('d F Y H:i').'</span>
                    <span>'.$survey->title.' di '.$survey->patient->full_name.'</span>
                </div>'
            )
            ->footerHtml('<div style="font-size: 10px; width: 100%; text-align: center;">Pagina <span class="pageNumber"></span> / <span class="totalPages"></span></div>')
            ->setOption('printBackground', true)
            ->format('A4')
            ->base64pdf();

        $filename = Str::kebab("$survey->title di {$survey->patient->full_name}.pdf");

        file_put_contents($filename, base64_decode($base64));

        return response()->file($filename)->deleteFileAfterSend();
    }
}

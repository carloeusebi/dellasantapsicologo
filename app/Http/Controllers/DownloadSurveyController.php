<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;
use Spatie\LaravelPdf\Enums\Format;
use Spatie\LaravelPdf\Facades\Pdf;

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
                },
            ]);

        return Pdf::view('pdf.survey', ['survey' => $survey])
            ->onLambda()
            ->margins(top: 15, bottom: 15)
            ->name(Str::kebab("$survey->title di {$survey->patient->full_name}.pdf"))
            ->headerhtml(view('pdf.components.survey.header', ['survey' => $survey]))
            ->footerhtml(view('pdf.components.survey.footer'))
            ->format(Format::A4);
    }
}

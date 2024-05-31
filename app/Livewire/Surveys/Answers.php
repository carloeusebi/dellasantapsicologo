<?php

namespace App\Livewire\Surveys;

use App\Models\Answer;
use App\Models\Choice;
use App\Models\QuestionnaireSurvey;
use App\Models\Survey;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\HasMany;
use LaravelIdea\Helper\App\Models\_IH_QuestionnaireSurvey_C;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Url;
use Livewire\Component;
use Mary\Traits\Toast;

#[Lazy]
class Answers extends Component
{
    use Toast;

    public Survey $survey;

    #[Url]
    public ?string $questionnaireSurvey_id = null;

    #[Url]
    public ?string $question_id = null;

    #[Url(as: 'cerca', except: '')]
    public string $query = '';

    public bool $updateModal = false;

    public bool $massUpdateModal = false;

    #[Computed]
    public function questionnaires(): Collection|array|_IH_QuestionnaireSurvey_C
    {
        return $this->survey->questionnaireSurvey()
            ->with('questionnaire.choices', 'questionnaire.tags')
            ->with([
                'questionnaire.questions' => function (HasMany $query) {
                    $query->when($this->query, function (Builder $query, string $search) {
                        collect(explode(' ', $search))->each(function (string $term) use ($query) {
                            $query->where('text', 'like', "%$term%");
                        });
                    })
                        ->with('answers', function (HasMany $query) {
                            $query->whereRelation('questionnaireSurvey.survey', 'id', $this->survey->id);
                        });
                }
            ])
            ->when($this->query, function (Builder $query, string $search) {
                $query->whereHas('questionnaire.questions', function (Builder $query) use ($search) {
                    collect(explode(' ', $search))->each(function (string $term) use ($query) {
                        $query->where('text', 'like', "%$term%");
                    });
                });
            })
            ->withCount('skippedAnswers')
            ->get();
    }

    public function deleteAnswer(int $id): void
    {
        try {
            $answer = Answer::findOrFail($id);

            $this->authorize('update', $this->survey);

            $questionnaireSurvey = $answer->questionnaireSurvey;

            $answer->delete();

            $questionnaireSurvey->updateCompletedStatus();

            $this->success('Successo!', 'Risposta eliminata!');
        } catch (ModelNotFoundException) {
            $this->error('Risposta non trovata!', 'Per favore ricaricare la pagina!');
        } catch (Exception $e) {
            $this->error('Impossibile eliminare la risposta!', $e->getMessage());
        } finally {
            $this->updateModal = false;
        }
    }

    /**
     * @param  array<array{
     *  'question_id': string,
     *  'questionnaire_survey_id': string,
     *  'choice_id'?: string,
     *  'points'?: string,
     * }>  $updates
     */
    public function massUpdateAnswers(array $updates): void
    {
        foreach ($updates as $update) {
            $this->changeAnswer(
                (int) $update['questionnaire_survey_id'],
                (int) $update['question_id'],
                $update['choice_id'] ?? null,
                $update['points'] ?? null,
                true,
            );
        }

        $this->massUpdateModal = false;

        $this->success('Successo!', 'Risposte salvate!');
    }

    public function changeAnswer(
        int $questionnaire_survey_id,
        int $question_id,
        ?int $choice_id = null,
        ?int $points = null,
        bool $isMassUpdate = false
    ): void {

        $this->authorize('update', $this->survey);

        $choice = Choice::find($choice_id);

        Answer::updateOrCreate(
            [
                'questionnaire_survey_id' => $questionnaire_survey_id,
                'question_id' => $question_id,
            ],
            [
                'choice_id' => $choice_id,
                'skipped' => false,
                'value' => $choice?->value ?? $points,
            ]
        );

        QuestionnaireSurvey::find($questionnaire_survey_id)
            ->updateCompletedStatus();

        if (!$isMassUpdate) {
            $this->updateModal = false;
            $this->success('Successo!', 'Risposta salvata!');
        }
    }
}

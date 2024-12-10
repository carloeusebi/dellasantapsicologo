<?php

namespace App\Livewire\Surveys\Tabs;

use App\Actions\AnswerQuestion;
use App\Models\Answer;
use App\Models\QuestionnaireSurvey;
use App\Models\Survey;
use App\Traits\SurveysComparison;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Url;
use Livewire\Component;
use Mary\Traits\Toast;

/**
 * @property Collection<QuestionnaireSurvey> $questionnaires
 */
#[Lazy(isolate: false)]
class AnswersTab extends Component
{
    use SurveysComparison, Toast;

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
    public function questionnaires(): Collection
    {
        return $this->survey->questionnaireSurveys()
            ->with([
                'questionnaire.tags',
                'questionnaire.choices',
                'questionnaire.variables.questions:id',
                'questionnaire.questions' => function ($query) {
                    /** @var HasMany $query */
                    $query->when($this->query, function ($query, string $search) {
                        /** @var HasMany $query */
                        collect(explode(' ', $search))->each(function (string $term) use ($query) {
                            $query->where('text', 'like', "%$term%");
                        });
                    })
                        ->with([
                            'choices',
                            'answers' => function (HasMany $query) {
                                $query->whereRelation('questionnaireSurvey.survey', 'id', $this->survey->id)
                                    ->with('choice');
                            },
                        ]);
                },
            ])
            ->when($this->query, function ($query, string $search) {
                /** @var Builder $query */
                $query->whereHas('questionnaire.questions', function ($query) use ($search) {
                    /** @var Builder $query */
                    collect(explode(' ', $search))->each(function (string $term) use ($query) {
                        $query->where('text', 'like', "%$term%");
                    });
                });
            })
            ->when($this->isComparing, function ($query) {
                /** @var Builder $query */
                $query->whereRelation('questionnaire', function ($query) {
                    $ids = $this->comparisonQuestionnaireSurveys->pluck('questionnaire_id')->toArray();
                    /** @var Builder $query */
                    $query->whereIn('id', $ids);
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

            $this->dispatch('updatedAnswer');

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
     *  'question_id': number,
     *  'questionnaire_survey_id': number,
     *  'choice_id'?: number,
     * }>  $updates
     */
    public function massUpdateAnswers(array $updates): void
    {
        foreach ($updates as $update) {
            $this->changeAnswer(
                questionnaire_survey_id: $update['questionnaire_survey_id'],
                question_id: $update['question_id'],
                choice_id: $update['choice_id'],
                isMassUpdate: true,
            );
        }

        $this->dispatch('updatedAnswer');

        $this->massUpdateModal = false;

        $this->success('Successo!', 'Risposte salvate!');
    }

    public function changeAnswer(
        int $questionnaire_survey_id,
        int $question_id,
        int $choice_id,
        bool $isMassUpdate = false,
    ): void {

        AnswerQuestion::run(
            questionnaire_survey_id: $questionnaire_survey_id,
            question_id: $question_id,
            choice_id: $choice_id
        );

        if (! $isMassUpdate) {
            $this->dispatch('updatedAnswer');
            $this->updateModal = false;
            $this->success('Successo!', 'Risposta salvata!');
        }
    }

    public function render(): View
    {
        $this->loadCompareSurvey();

        return view('livewire.surveys.tabs.answers-tab');
    }
}

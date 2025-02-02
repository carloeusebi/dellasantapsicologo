<?php

namespace App\Traits;

use App\Models\Answer;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;

/**
 * @property Survey $survey
 * @property Collection<Survey> $comparisonSurveys
 */
trait SurveysComparison
{
    public ?Survey $comparisonSurvey = null;

    public bool $isComparing = false;

    public ?int $comparisonSurvey_id = null;

    public Collection $comparisonQuestionnaireSurveys;

    #[Computed]
    public function comparisonSurveys(): Collection
    {
        return $this->survey->patient->surveys()->where('id', '!=', $this->survey->id)
            ->get();
    }

    public function compare(): void
    {
        if ($this->comparisonSurvey_id) {
            $this->isComparing = true;
            $this->dispatch('comparing', $this->comparisonSurvey_id);
        } else {
            $this->clearComparison();
            $this->dispatch('clearing-comparison');
        }

        $this->loadCompareSurvey();
    }

    public function clearComparison(): void
    {
        $this->reset('isComparing', 'comparisonSurvey_id', 'comparisonSurvey', 'comparisonQuestionnaireSurveys');
    }

    public function loadCompareSurvey(): void
    {
        if (! $this->comparisonSurvey_id || ! $this->isComparing) {
            return;
        }

        $this->comparisonSurvey = Survey::find($this->comparisonSurvey_id);

        $this->comparisonQuestionnaireSurveys = $this->comparisonSurvey
            ->questionnaireSurveys()
            ->with([
                'lastAnswer',
                'questionnaire',
                'questionnaire.variables.cutoffs',
                'questionnaire.variables.questions.answers' => function ($query) {
                    /** @var Builder<Answer> $query */
                    $query->whereRelation('questionnaireSurvey', 'survey_id', $this->comparisonSurvey_id)
                        ->with('choice');
                },
                'questions.answers' => function ($query) {
                    /** @var Builder<Answer> $query */
                    $query->whereRelation('questionnaireSurvey', 'survey_id', $this->comparisonSurvey_id)
                        ->with('choice');
                },
            ])
            ->withCount('answers', 'questions', 'skippedAnswers')
            ->get();
    }
}

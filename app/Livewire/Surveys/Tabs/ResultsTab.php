<?php

namespace App\Livewire\Surveys\Tabs;

use App\Models\QuestionnaireSurvey;
use App\Models\Survey;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Lazy]
/**
 * @property Collection<QuestionnaireSurvey> $questionnaireSurveys
 * @property Collection<Survey> $comparisonSurveys
 * @property Collection<QuestionnaireSurvey> $comparisonQuestionnaireSurveys
 */
class ResultsTab extends Component
{
    public Survey $survey;

    public ?Collection $comparisonQuestionnaireSurveys = null;

    public ?Survey $comparisonSurvey = null;

    public bool $isComparing = false;

    public ?int $comparisonSurvey_id = null;

    #[Url]
    public ?string $questionnaireSurvey_id = null;

    #[Computed]
    public function comparisonSurveys(): Collection
    {
        return $this->survey->patient->surveys()->where('id', '!=', $this->survey->id)
            ->get();
    }

    public function render(
    ): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Factory|View|Application
    {
        $this->loadCompareSurvey();

        return view('livewire.surveys.tabs.results-tab');
    }

    public function loadCompareSurvey(): void
    {
        if (!$this->comparisonSurvey_id || !$this->isComparing) {
            return;
        }

        $this->comparisonSurvey = Survey::find($this->comparisonSurvey_id);

        $this->comparisonQuestionnaireSurveys = $this->comparisonSurvey
            ->questionnaireSurveys()
            ->with('questionnaire', 'questionnaire.variables.cutoffs')
            ->with([
                'questionnaire.variables.questions.answers' => function (HasMany $query) {
                    $query->whereRelation('questionnaireSurvey', 'survey_id', $this->comparisonSurvey_id);
                }
            ])
            ->with('lastAnswer')
            ->withCount('answers', 'questions', 'skippedAnswers')
            ->get();
    }

    #[Computed]
    public function questionnaireSurveys(): Collection
    {
        return $this->survey->questionnaireSurveys()
            ->with('questionnaire', 'questionnaire.variables.cutoffs')
            ->with([
                'questionnaire.variables.questions.answers' => function (HasMany $query) {
                    $query->whereRelation('questionnaireSurvey', 'survey_id', $this->survey->id);
                }
            ])
            ->with('lastAnswer')
            ->withCount('answers', 'questions', 'skippedAnswers')
            ->when($this->isComparing, function (Builder $query) {
                $query->whereRelation('questionnaire', function (Builder $query) {
                    $ids = $this->comparisonQuestionnaireSurveys->pluck('questionnaire_id')->toArray();
                    $query->whereIn('id', $ids);
                });
            })
            ->get();
    }

    public function compare(): void
    {
        if ($this->comparisonSurvey_id) {
            $this->isComparing = true;
        } else {
            $this->clearComparison();
        }

        $this->loadCompareSurvey();
    }

    public function clearComparison(): void
    {
        $this->reset('isComparing', 'comparisonSurvey_id', 'comparisonSurvey', 'comparisonQuestionnaireSurveys');
    }
}

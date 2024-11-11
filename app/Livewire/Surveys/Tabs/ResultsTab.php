<?php

namespace App\Livewire\Surveys\Tabs;

use App\Models\QuestionnaireSurvey;
use App\Models\Survey;
use App\Traits\SurveysComparison;
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
 */
class ResultsTab extends Component
{
    use SurveysComparison;

    public Survey $survey;

    #[Url]
    public ?string $questionnaireSurvey_id = null;

    public function render(
    ): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Factory|View|Application
    {
        $this->loadCompareSurvey();

        return view('livewire.surveys.tabs.results-tab');
    }

    #[Computed]
    public function questionnaireSurveys(): Collection
    {
        return $this->survey->questionnaireSurveys()
            ->with([
                'lastAnswer',
                'questionnaire',
                'questionnaire.variables.cutoffs',
                'questionnaire.variables.questions.answers' => function ($query) {
                    /** @var HasMany $query */
                    $query->whereRelation('questionnaireSurvey', 'survey_id', $this->survey->id);
                }
            ])
            ->withCount('answers', 'questions', 'skippedAnswers')
            ->when($this->isComparing, function ($query) {
                /** @var HasMany $query */
                $query->whereRelation('questionnaire', function (Builder $query) {
                    $ids = $this->comparisonQuestionnaireSurveys->pluck('questionnaire_id')->toArray();
                    $query->whereIn('id', $ids);
                });
            })
            ->get();
    }
}

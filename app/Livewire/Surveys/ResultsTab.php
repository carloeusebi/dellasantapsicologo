<?php

namespace App\Livewire\Surveys;

use App\Models\Survey;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use LaravelIdea\Helper\App\Models\_IH_QuestionnaireSurvey_C;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Lazy]
class ResultsTab extends Component
{
    public Survey $survey;

    #[Url]
    public ?string $questionnaireSurvey_id = null;

    #[Computed]
    public function questionnaireSurveys(): Collection|array|_IH_QuestionnaireSurvey_C
    {
        return $this->survey->questionnaireSurveys()
            ->with(
                'questionnaire.variables.cutoffs'
            )
            ->with([
                'questionnaire.variables.questions.answers' => function (HasMany $query) {
                    $query->whereRelation('questionnaireSurvey', 'survey_id', $this->survey->id);
                }
            ])
            ->with('lastAnswer')
            ->withCount('answers', 'questions', 'skippedAnswers')
            ->get();
    }
}

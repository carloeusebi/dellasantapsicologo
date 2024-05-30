<?php

namespace App\Livewire\Surveys;

use App\Models\Survey;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use LaravelIdea\Helper\App\Models\_IH_QuestionnaireSurvey_C;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class Results extends Component
{
    public Survey $survey;

    #[Computed]
    public function questionnaireSurveys(): Collection|array|_IH_QuestionnaireSurvey_C
    {
        return $this->survey->questionnaireSurvey()
            ->with(
                'questionnaire.variables.cutoffs'
            )
            ->with([
                'questionnaire.variables.questions.answers' => function (HasMany $query) {
                    $query->whereRelation('questionnaireSurvey', 'survey_id', $this->survey->id);
                }
            ])
            ->withCount('answers', 'questions')
            ->get();
    }
}

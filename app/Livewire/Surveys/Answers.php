<?php

namespace App\Livewire\Surveys;

use App\Models\Survey;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use LaravelIdea\Helper\App\Models\_IH_QuestionnaireSurvey_C;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class Answers extends Component
{
    public Survey $survey;

    public string $accordion = '';

    public string $query = '';

    #[Computed]
    public function questionnaires(): Collection|array|_IH_QuestionnaireSurvey_C
    {
        return $this->survey->questionnaireSurvey()
            ->with('questionnaire.choices', 'questionnaire.tags', 'answers.question', 'answers.choice')
            ->when($this->query, function (Builder $query, string $search) {
                $query->where(function (Builder $query) use ($search) {
                    collect(explode(' ', $search))->each(function (string $term) use ($query) {
                        $query->where(function (Builder $query) use ($term) {
                            $query->whereRelation('questionnaire', 'title', 'like', "%$term%")
                                ->orWhereRelation('questionnaire.tags', 'tag', 'like', "%$term%");
                        });
                    });
                });
            })
            ->get();
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('livewire.surveys.answers');
    }
}

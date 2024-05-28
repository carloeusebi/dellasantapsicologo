<?php

namespace App\Livewire\Surveys;

use App\Models\Survey;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\View\View;
use LaravelIdea\Helper\App\Models\_IH_QuestionnaireSurvey_C;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Lazy]
class Answers extends Component
{
    public Survey $survey;

    #[Url]
    public ?string $questionnaireSurvey_id = null;

    #[Url]
    public ?string $question_id = null;

    #[Url(as: 'cerca', except: '')]
    public string $query = '';

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
            ->get();
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('livewire.surveys.answers');
    }
}

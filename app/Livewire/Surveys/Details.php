<?php

namespace App\Livewire\Surveys;

use App\Models\Survey;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class Details extends Component
{
    public Survey $survey;

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $this->survey->load([
            'questionnaireSurveys' => function (HasMany $query) {
                $query->with(['questionnaire', 'lastAnswer'])
                    ->withCount('answers', 'questions');
            }
        ])
            ->load('lastAnswer')
            ->loadCount('answers', 'skippedQuestions', 'comments');

        return view('livewire.surveys.details');
    }
}

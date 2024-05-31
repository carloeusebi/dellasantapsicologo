<?php

namespace App\Livewire\Surveys;

use App\Models\Survey;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;
use Livewire\Attributes\Url;
use Livewire\Component;

class ShowSurvey extends Component
{
    public Survey $survey;

    #[Session, Url(except: 'dettagli')]
    public string $tab = 'dettagli';

    #[On(['removedComment', 'updatedAnswer'])]
    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $this->authorize('view', $this->survey);

        $this->survey->load('patient')
            ->load('skippedQuestions.question.questionnaire')
            ->loadCount('comments', 'skippedQuestions');

        return view('livewire.surveys.show');
    }
}

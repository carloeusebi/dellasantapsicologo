<?php

namespace App\Livewire\Surveys;

use App\Models\Survey;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Mary\Traits\Toast;

class ShowSurvey extends Component
{
    use Toast;

    public Survey $survey;

    #[Url(except: 'dettagli')]
    public string $tab = 'dettagli';

    #[Url]
    public ?string $questionnaireSurvey_id = null;

    #[Url]
    public ?string $questionnaire_id = null;

    #[On('notify')]
    public function notify(string $type, string $title, string $description): void
    {
        $this->toast($type, $title, $description);
    }

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

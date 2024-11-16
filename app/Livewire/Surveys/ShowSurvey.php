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

    public ?int $comparisonSurvey_id = null;

    #[Url(except: 'dettagli')]
    public string $tab = 'dettagli';

    #[Url]
    public ?string $questionnaireSurvey_id = null;

    #[Url]
    public ?string $questionnaire_id = null;

    #[On('notify')]
    public function notify(string $type, string $title, string $description): void
    {
        $this->{$type}($title, $description);
    }

    #[On('comparing')]
    public function compare(int $comparisonSurvey_id): void
    {
        $this->comparisonSurvey_id = $comparisonSurvey_id;
    }

    #[On('clearing-comparison')]
    public function clearComparison(): void
    {
        $this->comparisonSurvey_id = null;
    }

    #[On(['removedComment', 'updatedAnswer'])]
    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application {
        $this->authorize('view', $this->survey);

        $this->survey->load('patient')
            ->load('skippedQuestions.question.questionnaire')
            ->loadCount('comments', 'skippedQuestions');

        return view('livewire.surveys.show-survey');
    }
}

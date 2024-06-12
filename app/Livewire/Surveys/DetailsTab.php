<?php

namespace App\Livewire\Surveys;

use App\Models\Survey;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

#[Lazy]
class DetailsTab extends Component
{
    use Toast;

    public Survey $survey;

    public bool $emailModal = false;

    public bool $deleteModal = false;

    #[Validate('required|email', as: 'Indirizzo email')]
    public ?string $emailAddress = '';

    #[Validate('required', as: 'Oggetto email')]
    public string $emailSubject = 'Questionario per la valutazione';

    #[Validate('required', as: 'Messaggio email')]
    public string $emailMessage = '';

    public function mount(): void
    {
        $this->loadSurvey();

        $this->emailAddress = $this->survey->patient->email;

        $this->emailMessage = config('mail.default_link_to_test_message');
    }

    #[On('updatedAnswer')]
    public function loadSurvey(): void
    {
        $this->survey->load([
            'questionnaireSurveys' => function (HasMany $query) {
                $query->with(['questionnaire', 'lastAnswer'])
                    ->withCount('answers', 'questions');
            }
        ])
            ->load('lastAnswer')
            ->loadCount('answers', 'skippedQuestions', 'comments');
    }

    public function sendEmail(): void
    {
        $this->authorize('view', $this->survey);

        $this->validate();

        try {
            $this->survey->sendEmailWithLink($this->emailSubject, $this->emailAddress, $this->emailMessage);
            $this->success('Successo!', 'Email inviata correttamente!');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            $this->error('Errore durante l\'invio dell\'email. Si prega di riprovare più tardi.', $e->getMessage(),
                timeout: 5_000);
        } finally {
            $this->reset('emailModal');
        }
    }

    public function deleteSurvey(): void
    {
        $this->authorize('delete', $this->survey);

        $this->survey->delete();

        $this->reset('deleteModal');

        $this->success('Successo!', 'Questionario eliminato correttamente!', redirectTo: route('surveys.index'));
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $this->loadSurvey();

        return view('livewire.surveys.details-tab');
    }
}

<?php

namespace App\Livewire\Questionnaires;

use App\Actions\CloneQuestionnaire;
use App\Livewire\Forms\QuestionnaireForm;
use App\Models\Questionnaire;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\QueryException;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Mary\Traits\Toast;

class ShowQuestionnaire extends Component
{
    use Toast;

    const string TITLE = 'titolo';
    const string QUESTIONS = 'domande';
    const string VARIABLES = 'variabili';

    #[Url(as: 'tab')]
    public string $selectedTab = 'titolo';
    public int $step = 1;

    public QuestionnaireForm $form;

    public ?Questionnaire $questionnaire = null;

    public bool $copyBeforeArchive = false;

    public bool $forceDeleteModal = false;

    public function mount(): void
    {
        $this->authorize('view', $this->questionnaire);

        $this->form->setQuestionnaire($this->questionnaire);
    }

    public function delete(): void
    {
        $this->authorize('delete', $this->questionnaire);

        $this->questionnaire->delete();

        if ($this->copyBeforeArchive) {
            $this->replicate();
            return;
        }

        $this->success('Successo!', 'Il questionario è stato archiviato con successo!',
            redirectTo: route('questionnaires.index'));
    }

    public function replicate(): void
    {
        try {
            $newQuestionnaire = CloneQuestionnaire::run($this->questionnaire);

            $this->success('Successo!', 'Il questionario è stato replicato con successo!',
                redirectTo: route('questionnaires.show', $newQuestionnaire));
        } catch (Exception $e) {
            $this->error('Errore!',
                'Si è verificato un errore durante la replicazione del questionario!<br>'.$e->getMessage(),
                timeout: 10_000);
        }
    }

    public function forceDelete(): void
    {
        $this->reset('forceDeleteModal');

        $this->authorize('forceDelete', $this->questionnaire);

        try {
            $this->questionnaire->forceDelete();

            $this->success('Successo!', 'Il questionario è stato eliminato con successo!',
                redirectTo: route('questionnaires.index'));
        } catch (QueryException $e) {
            report($e);
            $this->error('Errore!',
                'Si è verificato un errore durante l\'eliminazione del questionario!',
                timeout: 10_000);
        }
    }

    #[On('updated')]
    public function onUpdate(string $message): void
    {
        $this->success('Successo!', $message);
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $this->questionnaire?->loadCount('surveys');

        return view('livewire.questionnaires.show-questionnaire');
    }
}

<?php

namespace App\Livewire\Questionnaires;

use App\Actions\CloneQuestionnaire;
use App\Livewire\Forms\QuestionnaireForm;
use App\Models\Questionnaire;
use App\Models\Tag;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Mary\Traits\Toast;

/**
 * @property Collection<Tag> $tags
 */
class ShowQuestionnaire extends Component
{
    use Toast;

    public static string $TITLE = 'titolo';
    public static string $QUESTIONS = 'domande';
    public static string $VARIABLES = 'variabili';

    #[Url(as: 'tab')]
    public string $selectedTab = 'titolo';
    public int $step = 1;

    public QuestionnaireForm $form;

    public ?Questionnaire $questionnaire = null;

    public bool $copyBeforeArchive = false;


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
                'Si è verificato un errore durante la replicazione del questionario!<br>'.$e->getMessage());
        }
    }

    public function forceDelete(): void
    {
        $this->authorize('forceDelete', $this->questionnaire);

        $this->questionnaire->forceDelete();

        $this->success('Successo!', 'Il questionario è stato eliminato con successo!',
            redirectTo: route('questionnaires.index'));
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

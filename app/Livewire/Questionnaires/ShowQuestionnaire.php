<?php

namespace App\Livewire\Questionnaires;

use App\Livewire\Forms\QuestionnaireForm;
use App\Models\Questionnaire;
use App\Models\Tag;
use Illuminate\Auth\Access\AuthorizationException;
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


    public function mount(): void
    {
        $this->authorize('view', $this->questionnaire);

        $this->form->setQuestionnaire($this->questionnaire);
    }


    public function delete(): void
    {
        $this->authorize('delete', $this->questionnaire);

        $this->questionnaire->delete();

        $this->success('Successo!', 'Il questionario è stato eliminato con successo!',
            redirectTo: route('questionnaires.index'));
    }

    #[On('updated')]
    public function onUpdate(string $message): void
    {
        $this->success('Successo!', $message);
    }

    public function previous(): void
    {
        if ($this->step === self::$CHOOSE_TITLE) {
            return;
        }

        $this->step--;
    }

    public function next(): void
    {
        if ($this->step === self::$CHOOSE_TITLE) {
            try {
                $this->authorize('updateText', $this->questionnaire);
                $this->form->update();
            } catch (AuthorizationException) {
                // Do nothing
            }
        }

        if ($this->step === self::$CHOOSE_QUESTIONS) {
            $this->questionnaire?->update(['step' => self::$CHOOSE_VARIABLES]);
        }

        if ($this->step === self::$CHOOSE_VARIABLES) {
            return;
        }

        $this->step++;
    }

    #[On(['choice-deleted', 'question-deleted'])]
    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $this->questionnaire?->loadCount('surveys');

        return view('livewire.questionnaires.show-questionnaire');
    }
}
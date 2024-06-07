<?php

namespace App\Livewire\Questionnaires;

use App\Livewire\Forms\QuestionnaireForm;
use App\Models\Questionnaire;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

/**
 * @property \Illuminate\Database\Eloquent\Collection<Tag> $tags
 */
class QuestionnaireWizard extends Component
{
    public static int $CHOOSE_TITLE = 1;
    public static int $CHOOSE_QUESTIONS = 2;
    public static int $CHOOSE_VARIABLES = 3;

    public int $step = 1;

    public QuestionnaireForm $form;

    public ?Questionnaire $questionnaire = null;

    public ?string $newChoicePoints = null;

    public ?string $newChoiceText = null;

    public function mount(?Questionnaire $questionnaire = null): void
    {
        if ($questionnaire) {
            $this->form->setQuestionnaire($questionnaire);
            $this->questionnaire = $questionnaire;
        }
    }

    #[Computed(cache: true)]
    public function tags(): Collection
    {
        return Tag::select(['id', 'tag', 'color'])->orderBy('tag')->get();
    }

//    public function addChoice(): void
//    {
//        $this->validate([
//            'newChoicePoints' => 'required|int|min:0|max:10',
//            'newChoiceText' => 'required|string',
//        ], attributes: [
//            'newChoicePoints' => 'Punti',
//            'newChoiceText' => 'Testo',
//        ]);
//
//        if ($this->choices === null) {
//            $this->choices = collect();
//        }
//
//        $this->choices->push([
//            'points' => (int) $this->newChoicePoints,
//            'text' => $this->newChoiceText,
//        ]);
//
//        $this->reset('newChoicePoints', 'newChoiceText');
//    }

    public function previous(): void
    {
        if ($this->step === self::$CHOOSE_TITLE) {
            return;
        }

        $this->step--;
    }

    public function next(): void
    {
        if ($this->step === self::$CHOOSE_TITLE && !$this->questionnaire) {
            $this->questionnaire = $this->form->store();
        }

        if ($this->step === self::$CHOOSE_VARIABLES) {
            return;
        }

        $this->step++;
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('livewire.questionnaires.questionnaire-wizard');
    }
}

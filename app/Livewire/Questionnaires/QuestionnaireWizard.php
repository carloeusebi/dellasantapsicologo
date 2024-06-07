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
use Livewire\Attributes\On;
use Livewire\Component;

/**
 * @property \Illuminate\Database\Eloquent\Collection<Tag> $tags
 */
class QuestionnaireWizard extends Component
{
    public static int $CHOOSE_TITLE = 1;
    public static int $CHOOSE_QUESTIONS = 2;
    public static int $CHOOSE_VARIABLES = 3;

    public int $step = 2;

    public QuestionnaireForm $form;

    public ?Questionnaire $questionnaire = null;

    public ?string $newChoicePoints = null;

    public ?string $newChoiceText = null;

    public ?string $newQuestionText = null;

    public ?bool $newQuestionReversed = false;

    public function mount(?string $id = null): void
    {
        $questionnaire = Questionnaire::find($id);

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

    public function addChoice(): void
    {
        $this->validate([
            'newChoicePoints' => 'required|int|min:0|max:10',
            'newChoiceText' => 'required|string',
        ], attributes: [
            'newChoicePoints' => 'Punti',
            'newChoiceText' => 'Testo',
        ]);

        $this->questionnaire?->choices()->create([
            'points' => $this->newChoicePoints,
            'text' => $this->newChoiceText,
        ]);

        $this->form->choices = $this->questionnaire->choices;

        $this->reset('newChoicePoints', 'newChoiceText');
    }

    public function addQuestion(): void
    {
        $this->validate([
            'newQuestionText' => 'required|string',
        ], attributes: [
            'newQuestionText' => 'Testo',
        ]);

        $this->questionnaire?->loadCount('questions');

        $this->questionnaire?->questions()->create([
            'text' => $this->newQuestionText,
            'reversed' => $this->newQuestionReversed,
            'order' => $this->questionnaire->questions_count + 1,
        ]);

        $this->form->questions = $this->questionnaire->questions;

        $this->reset('newQuestionText', 'newQuestionReversed');
    }

    public function updateQuestionsOrder(array $orders): void
    {
        $orders = array_map(fn(array $order) => [$order['value'], $order['order']], $orders);
        foreach ($orders as [$id, $order]) {
            $this->questionnaire?->questions()->find($id)->update(['order' => $order]);
        }
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
        if ($this->step === self::$CHOOSE_TITLE && !$this->questionnaire) {
            $this->questionnaire = $this->form->store();
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

        return view('livewire.questionnaires.questionnaire-wizard');
    }
}

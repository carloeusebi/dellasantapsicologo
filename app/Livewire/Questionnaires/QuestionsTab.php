<?php

namespace App\Livewire\Questionnaires;

use App\Models\Questionnaire;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Component;

#[Lazy]
class QuestionsTab extends Component
{
    public Questionnaire $questionnaire;

    public ?string $newChoicePoints = null;

    public ?string $newChoiceText = null;

    public ?string $newQuestionText = null;

    public ?bool $newQuestionReversed = false;

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

        $this->reset('newQuestionText', 'newQuestionReversed');
    }

    public function updateQuestionsOrder(array $orders): void
    {
        $orders = array_map(fn(array $order) => [$order['value'], $order['order']], $orders);
        foreach ($orders as [$id, $order]) {
            $this->questionnaire?->questions()->find($id)->update(['order' => $order]);
        }
    }


    #[On('choice-deleted')]
    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $this->questionnaire->load('questions.choices');

        return view('livewire.questionnaires.questions-tab');
    }
}

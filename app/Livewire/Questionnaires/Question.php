<?php

namespace App\Livewire\Questionnaires;

use App\Models\Questionnaire;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class Question extends Component
{
    use Toast;

    public \App\Models\Question|null $question = null;

    public Questionnaire $questionnaire;

    #[Validate('nullable|string|max:255')]
    public string $text = '';

    public bool $reversed = false;

    public bool $deleteModal = false;

    public bool $expanded = false;

    public string $newChoicePoints = '';

    public string $newChoiceText = '';

    public function mount(\App\Models\Question $question): void
    {
        $this->question = $question;

        $this->text = $question->text;

        $this->reversed = $question->reversed;
    }

    public function update(): void
    {
        $this->validate();

        $this->question->update([
            'text' => $this->text,
            'reversed' => $this->reversed,
        ]);
    }

    public function delete(): void
    {
        $this->question->delete();

        $this->reset('deleteModal');

        $this->success('Successo', 'Domanda eliminata con successo.', timeout: 1500);

        $this->dispatch('question-deleted');
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

        $this->question->choices()->create([
            'points' => $this->newChoicePoints,
            'text' => $this->newChoiceText,
        ]);

        $this->reset('newChoicePoints', 'newChoiceText');
    }

    public function toggleExpanded(): void
    {
        $this->expanded = !$this->expanded;
    }

    #[On('choice-deleted')]
    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $this->question->load('choices');

        return view('livewire.questionnaires.question');
    }
}

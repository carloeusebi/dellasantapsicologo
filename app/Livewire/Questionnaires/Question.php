<?php

namespace App\Livewire\Questionnaires;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Question extends Component
{
    public \App\Models\Question|null $question = null;

    #[Validate('required|string|max:255')]
    public string $text = '';

    public bool $reversed = false;

    public bool $canEditText = false;

    public bool $canEditStructure = false;

    public bool $deleteModal = false;

    public function mount(\App\Models\Question $question): void
    {
        $this->question = $question;

        $this->text = $question->text;

        $this->reversed = $question->reversed;
    }

    public function update(): void
    {
        $this->validate([
            'text' => 'required|string|max:255',
        ]);

        $this->question->update([
            'text' => $this->text,
            'reversed' => $this->reversed,
        ]);
    }

    public function delete(): void
    {
        $this->question->delete();

        $this->reset('deleteModal');

        $this->dispatch('question-deleted');
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('livewire.questionnaires.question');
    }
}

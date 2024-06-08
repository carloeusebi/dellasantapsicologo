<?php

namespace App\Livewire\Questionnaires;

use App\Models\Questionnaire;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class Variable extends Component
{
    use Toast;

    public Questionnaire $questionnaire;

    public \App\Models\Variable $variable;

    public bool $questionsModal = false;

    public array $selectedQuestions = [];

    #[Validate('required|string|max:255')]
    public string $name;

    public function mount(): void
    {
        $this->variable->load('questions');

        $this->name = $this->variable->name;

        $this->selectedQuestions = $this->getVariableIds();
    }

    /** @return int[] */
    public function getVariableIds(): array
    {
        return $this->variable->questions->pluck('id')->toArray();
    }

    public function openQuestionsModal(): void
    {
        if ($this->questionnaire->questions->isEmpty()) {
            $this->questionnaire->load('questions');
        }

        $this->questionsModal = true;
    }

    public function closeQuestionsModal(): void
    {
        $this->questionsModal = false;

        $this->selectedQuestions = $this->getVariableIds();
    }

    public function syncQuestions(): void
    {
        $this->authorize('updateStructure', $this->questionnaire);

        $this->variable->questions()->sync($this->selectedQuestions);

        $this->questionsModal = false;

        $this->success('Successo!', 'Domande salvate con successo!');
    }

    public function selectAll(): void
    {
        $this->selectedQuestions = $this->questionnaire->questions->pluck('id')->toArray();
    }

    public function selectNone(): void
    {
        $this->selectedQuestions = [];
    }

    public function render()
    {
        return view('livewire.questionnaires.variable');
    }
}

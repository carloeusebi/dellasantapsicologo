<?php

namespace App\Livewire\Questionnaires;

use App\Livewire\Forms\CutoffForm;
use App\Models\Questionnaire;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

class Variable extends Component
{
    use Toast;

    public Questionnaire $questionnaire;

    public \App\Models\Variable $variable;

    public CutoffForm $form;

    public bool $questionsModal = false;

    public array $selectedQuestions = [];

    public bool $deleteModal = false;

    public bool $newCutoffModal = false;

    #[Validate('required|string|max:255', as: 'Nome variabile')]
    public string $name;

    #[Validate('required|bool', as: 'Basata sul genere')]
    public bool $genderBased = false;

    public function mount(): void
    {
        $this->variable->load('questions');

        $this->name = $this->variable->name;

        $this->genderBased = $this->variable->gender_based;

        $this->selectedQuestions = $this->getQuestionsIds();
    }

    /** @return int[] */
    public function getQuestionsIds(): array
    {
        return $this->variable->questions->pluck('id')->toArray();
    }

    public function storeCutoff(): void
    {
        $this->authorize('updateStructure', $this->questionnaire);

        $this->form->store($this->variable);

        $this->reset('newCutoffModal');

        $this->form->reset();

        $this->success('Successo!', 'Soglia aggiunta con successo!');
    }

    public function update(): void
    {
        $this->authorize('updateText', $this->questionnaire);

        $this->validateOnly('name');
        $this->validateOnly('genderBased');

        $data = ['name' => $this->name];

        if (Auth::user()->can('updateStructure', $this->questionnaire)) {
            $data['gender_based'] = $this->genderBased;
        }

        $this->variable->update($data);

        $this->success('Successo!', 'Variabile aggiornata con successo!');
    }

    public function delete(): void
    {
        $this->authorize('updateStructure', $this->questionnaire);

        $this->variable->delete();

        $this->deleteModal = false;

        $this->dispatch('variable-deleted');
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

        $this->selectedQuestions = $this->getQuestionsIds();
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

    public function closeNewCutoffModal(): void
    {
        $this->reset('newCutoffModal');

        $this->form->reset();

        $this->resetValidation();
    }

    #[On('cutoff-deleted')]
    public function render(
    ): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Factory|View|Application
    {
        return view('livewire.questionnaires.variable');
    }
}

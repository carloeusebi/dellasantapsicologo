<?php

namespace App\Livewire\Questionnaires;

use App\Models\Questionnaire;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Lazy]
class VariablesTab extends Component
{
    public Questionnaire $questionnaire;

    public bool $newVariableModal = false;

    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('required|bool')]
    public bool $genderBased = false;

    public function closeVariableModal(): void
    {
        $this->newVariableModal = false;

        $this->reset('name', 'genderBased');
    }

    public function createVariable(): void
    {
        $this->authorize('updateText', $this->questionnaire);

        $this->validate();

        $this->questionnaire->variables()->create([
            'name' => $this->name,
            'gender_based' => $this->genderBased
        ]);

        $this->reset('genderBased', 'name', 'newVariableModal');
    }

    #[On('variable-deleted')]
    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $this->questionnaire->load('variables.cutoffs');

        return view('livewire.questionnaires.variables-tab');
    }
}

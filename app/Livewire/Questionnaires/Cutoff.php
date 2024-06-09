<?php

namespace App\Livewire\Questionnaires;

use App\Models\Questionnaire;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Cutoff extends Component
{
    public \App\Models\Cutoff $cutoff;

    public Questionnaire $questionnaire;

    #[Validate('required|string|max:255')]
    public string $name = '';

    public function delete(): void
    {
        $this->cutoff->delete();

        $this->dispatch('cutoff-deleted');
    }

    public function mount(): void
    {
        $this->name = $this->cutoff->name;
    }
}

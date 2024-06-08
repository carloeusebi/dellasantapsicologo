<?php

namespace App\Livewire\Questionnaires;

use Livewire\Attributes\Validate;
use Livewire\Component;

class Cutoff extends Component
{
    public \App\Models\Cutoff $cutoff;

    #[Validate('required|string|max:255')]
    public string $name = '';

    public function mount(): void
    {
        $this->name = $this->cutoff->name;
    }

    public function render()
    {
        return view('livewire.questionnaires.cutoff');
    }
}

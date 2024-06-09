<?php

namespace App\View\Components\Cutoffs;

use App\Livewire\Forms\CutoffForm;
use App\Models\Variable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public function __construct(
        public CutoffForm $form,
        public Variable $variable
    ) {
    }

    public function render(): View
    {
        return view('components.cutoffs.form');
    }
}

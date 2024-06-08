<?php

namespace App\Livewire\Questionnaires;

use App\Models\Questionnaire;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class VariablesTab extends Component
{
    public Questionnaire $questionnaire;

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $this->questionnaire->load('variables.cutoffs');

        return view('livewire.questionnaires.variables-tab');
    }
}

<?php

namespace App\Livewire\Questionnaires\Components;

use App\Livewire\Forms\CutoffForm;
use App\Models\Cutoff;
use App\Models\Questionnaire;
use App\Models\Variable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class CutoffComponent extends Component
{
    public Cutoff $cutoff;

    public Questionnaire $questionnaire;

    public Variable $variable;

    public CutoffForm $form;

    public bool $updateModal = false;

    public bool $deleteModal = false;

    public function mount(): void
    {
        $this->form->setCutoff($this->cutoff);
    }

    public function update(): void
    {
        $this->form->update();

        $this->dispatch('cutoff-updated');

        $this->reset('updateModal');
    }

    public function closeUpdateModal(): void
    {
        $this->reset('updateModal');

        $this->form->setCutoff($this->cutoff);
    }

    public function delete(): void
    {
        $this->cutoff->delete();

        $this->dispatch('cutoff-deleted');
    }

    #[On('cutoff-updated')]
    public function render(
    ): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Factory|View|Application {
        return view('livewire.questionnaires.components.cutoff-component');
    }
}

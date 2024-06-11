<?php

namespace App\Livewire\Questionnaires;

use App\Livewire\Forms\CutoffForm;
use App\Models\Questionnaire;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Cutoff extends Component
{
    public \App\Models\Cutoff $cutoff;

    public Questionnaire $questionnaire;

    public \App\Models\Variable $variable;

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
    ): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Factory|View|Application
    {
        return view('livewire.questionnaires.cutoff');
    }
}

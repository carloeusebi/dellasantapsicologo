<?php

namespace App\Livewire\Questionnaires;

use Livewire\Component;

class Choice extends Component
{
    public \App\Models\Choice $choice;

    public string $text = '';

    public string $points = '';

    public bool $canEditText = false;

    public bool $canEditStructure = false;

    public bool $deleteModal = false;

    public function mount(\App\Models\Choice $choice): void
    {
        $this->choice = $choice;
        $this->text = $choice->text;
        $this->points = $choice->points;
    }

    public function update(): void
    {
        if ($this->canEditText) {
            $this->choice->text = $this->text;
        }
        if ($this->canEditStructure) {
            $this->choice->points = $this->points;
        }

        $this->choice->save();
    }

    public function delete(): void
    {
        $this->choice->delete();

        $this->deleteModal = false;

        $this->dispatch('choice-deleted');
    }

    public function render()
    {
        return view('livewire.questionnaires.choice');
    }
}

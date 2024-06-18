<?php

namespace App\Livewire\Questionnaires\Components;

use App\Models\Choice;
use Livewire\Component;

class ChoiceComponent extends Component
{
    public Choice $choice;

    public string $text = '';

    public string $points = '';

    public bool $isFirst = false;

    public bool $canEditText = false;

    public bool $canEditStructure = false;

    public bool $deleteModal = false;

    public function mount(Choice $choice): void
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
}

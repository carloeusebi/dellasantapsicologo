<?php

namespace App\Livewire\Forms;

use App\Models\Tag;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TagForm extends Form
{
    public ?Tag $tag = null;

    #[Validate('required|string|max:255', as: 'Nome')]
    public $name = '';

    #[Validate('required|string|regex:^#([A-Fa-f0-9]{6})^', as: 'Colore')]
    public $color = '';

    public function setTag(Tag $tag): void
    {
        $this->tag = $tag;

        $this->name = $tag->tag;
        $this->color = $tag->color;

        $this->resetValidation();
    }

    public function store(): Tag
    {
        $this->validate();

        return Tag::create([
            'tag' => $this->name,
            'color' => $this->color,
        ]);
    }

    public function update(): Tag
    {
        $this->validate();

        $this->tag->update([
            'tag' => $this->name,
            'color' => $this->color,
        ]);

        return $this->tag;
    }
}

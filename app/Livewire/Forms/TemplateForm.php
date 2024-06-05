<?php

namespace App\Livewire\Forms;

use App\Models\Template;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TemplateForm extends Form
{
    public ?Template $template;

    #[Validate('required|string|max:255', as: 'Nome')]
    public string $name = '';

    #[Validate('nullable|string', as: 'Descrizione')]
    public string $description = '';

    #[Validate('nullable|boolean', as: 'Visibile')]
    public bool $visible = false;

    #[Validate('nullable|array|exists:tags,id', as: 'Tag')]
    public array $selectedTags = [];

    #[Validate('required|array|exists:questionnaires,id', as: 'Questionari')]
    public array $selectedQuestionnaires = [];

    public function setTemplate(Template $template): void
    {
        $this->template = $template;
        $this->name = $template->name;
        $this->description = $template->description;
        $this->visible = $template->visible;
        $this->selectedTags = $template->tags->pluck('id')->toArray();
        $this->selectedQuestionnaires = $template->questionnaires->pluck('id')->toArray();

        $this->resetValidation();
    }

    public function store(): Template
    {
        $this->validate();

        $template = Auth::user()->templates()->create([
            'name' => $this->name,
            'description' => $this->description,
            'visible' => $this->visible,
        ]);

        $template->tags()->attach($this->selectedTags);
        $template->questionnaires()->attach($this->selectedQuestionnaires);

        return $template;
    }

    public function update(): Template
    {
        $this->validate();

        $this->template->update([
            'name' => $this->name,
            'description' => $this->description,
            'visible' => $this->visible,
        ]);

        $this->template->tags()->sync($this->selectedTags);

        return $this->template;
    }
}

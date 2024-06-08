<?php

namespace App\Livewire\Forms;

use App\Models\Questionnaire;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class QuestionnaireForm extends Form
{
    public ?Questionnaire $questionnaire = null;

    #[Validate('required|string|max:255', as: 'Titolo')]
    public $title = '';

    #[Validate('required|string', as: 'Descrizione')]
    public $description = '';

    #[Validate('required|boolean', as: 'Visibile')]
    public $visible = true;

    #[Validate('nullable|array|exists:tags,id', as: 'Tags')]
    public $selectedTags = [];

    public $choices = null;

    public $questions = null;

    public function setQuestionnaire(Questionnaire $questionnaire): void
    {
        $this->questionnaire = $questionnaire;

        $this->title = $questionnaire->title;
        $this->description = $questionnaire->description;
        $this->visible = $questionnaire->visible;
        $this->selectedTags = $questionnaire->tags->pluck('id')->toArray();
        $this->choices = $questionnaire->choices;
        $this->questions = $questionnaire->questions;
    }

    public function store()
    {
        $this->validate();

        $questionnaire = Auth::user()->questionnaires()->create([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $questionnaire->tags()->attach($this->selectedTags);

        return $questionnaire;
    }

    public function update(): void
    {
        $this->validate();

        $this->questionnaire->update([
            'title' => $this->title,
            'description' => $this->description,
            'visible' => $this->visible,
        ]);

        $this->questionnaire->tags()->sync($this->selectedTags);
    }

}

<?php

namespace App\Livewire\Forms;

use App\Models\Cutoff;
use App\Models\Variable;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CutoffForm extends Form
{
    public ?Cutoff $cutoff;

    #[Validate('required|string|max:255', as: 'Nome')]
    public $name = '';

    #[Validate('required|string|in:lesser_than,greater_than,range', as: 'Tipo')]
    public $type = null;

    #[Validate(['nullable', 'integer'], as: 'Da')]
    public $from = null;

    #[Validate(['nullable', 'integer', 'required_if:type,range', 'gt:from'], as: 'A')]
    public $to = null;

    #[Validate(['nullable', 'integer'], as: 'Da femminile')]
    public $fem_from = null;

    #[Validate(['nullable', 'integer', 'gt:fem_from'], as: 'A femminile')]
    public $fem_to = null;

    public array $cutoffTypes = [
        ['id' => 'lesser_than', 'name' => 'Minore di'],
        ['id' => 'greater_than', 'name' => 'Maggiore di'],
        ['id' => 'range', 'name' => 'Compreso tra'],
    ];

    public function setCutoff(Cutoff $cutoff): void
    {
        $this->cutoff = $cutoff;

        $this->name = $cutoff->name;
        $this->from = $cutoff->from;
        $this->type = $cutoff->type;
        $this->to = $cutoff->to;
        $this->fem_from = $cutoff->fem_from;
        $this->fem_to = $cutoff->fem_to;
    }

    public function store(Variable $variable): Cutoff
    {
        $this->validate();

        $this->performAdditionalValidation($variable);

        return $variable->cutoffs()->create([
            'name' => $this->name,
            'type' => $this->type,
            'from' => $this->from,
            'to' => $this->to,
            'fem_from' => $this->fem_from,
            'fem_to' => $this->fem_to,
        ]);
    }

    protected function performAdditionalValidation(Variable $variable): void
    {
        if ($this->type === 'range' && $variable->gender_based) {
            $this->validate([
                'from' => 'lt:to',
                'fem_from' => 'lt:fem_to',
            ], attributes: [
                'from' => 'Da',
                'fem_from' => 'Da femminile',
            ]);
        } elseif ($this->type === 'range' && !$variable->gender_based) {
            $this->validate([
                'from' => 'lt:to',
            ], attributes: [
                'from' => 'Da',
            ]);
        }

        if ($variable->gender_based) {
            $this->validate([
                'fem_from' => 'required',
                'fem_to' => 'required_if:type,range',
            ], attributes: [
                'fem_from' => 'Da femminile',
                'fem_to' => 'A femminile',
            ]);
        }
    }

    public function update(): void
    {
        $this->validate();

        $this->performAdditionalValidation($this->cutoff->variable);

        $this->cutoff->update([
            'name' => $this->name,
            'type' => $this->type,
            'from' => $this->from,
            'to' => $this->to,
            'fem_from' => $this->fem_from,
            'fem_to' => $this->fem_to,
        ]);
    }

    protected function prepareForValidation($attributes): array
    {
        if ($attributes['type'] !== 'range') {
            $attributes['to'] = null;
            $attributes['fem_to'] = null;
        }

        return $attributes;
    }
}

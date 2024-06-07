<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property array<array{'id': int, 'points': int, 'text': string }> $custom_choices
 */
class Question extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'text',
        'questionnaire_id',
        'previous_question',
        'next_question',
        'custom_choices', // Leave this here for backwards compatibility
        'reversed',
        'order',
        'old_id',
    ];

    protected $casts = [
        'reversed' => 'boolean',
        'custom_choices' => 'array', // Leave this here for backwards compatibility
    ];

    public function calculateScore(Choice $choice): int
    {
        if (!$this->reversed) {
            return $choice->points;
        }

        $choices = $this->choices->isEmpty() ? $this->questionnaire->choices : $this->choices;
        $chosenIndex = $choices->search(fn(Choice $c) => $c->id === $choice->id);
        $reversedIndex = $choices->count() - 1 - $chosenIndex;
        return $choices->get($reversedIndex)?->points;
    }

    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function choices(): MorphMany
    {
        return $this->morphMany(Choice::class, 'questionable');
    }

}

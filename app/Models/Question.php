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
        'reversed',
        'order',
        'old_id',
    ];

    protected $casts = [
        'reversed' => 'boolean',
    ];

    public function calculateScore(Choice $choice): int
    {
        if (!$this->reversed) {
            return $choice->points;
        }

        $choices = $this->choices->isEmpty() ? $this->questionnaire->choices : $this->choices;
        $possibleScores = $choices->pluck('points')->toArray();
        return min($possibleScores) + max($possibleScores) - $choice->points;
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

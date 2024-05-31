<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property array<array{'id': int, 'points': int, 'customAnswer': string }> $custom_choices
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
        'custom_choices',
        'order',
        'old_id',
    ];

    protected $casts = [
        'custom_choices' => 'array',
        'reversed' => 'boolean',
    ];

    public function calculateScore(Choice $choice): int
    {
        if (!$this->reversed) {
            return $choice->points;
        }

        $possibleScores = $this->questionnaire->choices->pluck('points')->toArray();
        return min($possibleScores) + max($possibleScores) - $choice->points;
    }

    public function calculateCustomScore(int $score): int
    {
        if (!$this->reversed) {
            return $score;
        }

        $possibleScores = array_map(fn(array $choice) => $choice['points'], $this->custom_choices);
        return min($possibleScores) + max($possibleScores) - $score;
    }

    public function getCustomAnswerText(?int $value): string
    {
        if (empty($this->custom_choices)) {
            return '';
        }

        if (!$value && $value !== 0) {
            return 'Risposta saltata';
        }

        return collect($this->custom_choices)->first(fn(array $answer) => $answer['points'] === $value)['customAnswer'];
    }

    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}

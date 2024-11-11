<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\Pivot;

class QuestionnaireSurvey extends Pivot
{
    use HasFactory;

    public $timestamps = true;

    public $incrementing = true;

    protected $casts = [
        'completed' => 'boolean',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    /** @return Attribute<bool, never> */
    protected function hasBeenUpdated(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => $attributes['created_at'] !== $attributes['updated_at']
        );
    }

    /**
     * @return array{0: bool, 1: bool} [$questionnaireSurveyCompleted, $surveyCompleted]
     */
    public function updateCompletedStatus(): array
    {
        $this->touch();

        $this->loadCount('answers', 'questions');

        $previousStatus = $this->completed;

        $completed = $this->answers_count === $this->questions_count;

        $this->update(['completed' => $completed]);

        if ($previousStatus !== $completed) {
            $this->survey->updateCompletedStatus();
        }

        return [$completed, $this->survey->fresh()->completed];
    }

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    public function questions(): HasManyThrough
    {
        return $this->hasManyThrough(
            Question::class,
            Questionnaire::class,
            'id',
            'questionnaire_id',
            'questionnaire_id',
        )->withTrashedParents();
    }

    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class)
            ->withTrashed();
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class, 'questionnaire_survey_id', 'id');
    }

    public function skippedAnswers(): HasMany
    {
        return $this->hasMany(Answer::class, 'questionnaire_survey_id', 'id')
            ->whereSkipped(true);
    }

    public function lastAnswer(): HasOne
    {
        return $this->hasOne(Answer::class, 'questionnaire_survey_id', 'id')
            ->orderByDesc('updated_at')
            ->latest();
    }
}

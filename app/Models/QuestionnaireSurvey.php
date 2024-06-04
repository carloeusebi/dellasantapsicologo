<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property bool|null $completed
 */
class QuestionnaireSurvey extends Pivot
{
    public $incrementing = 'questionnaire_survey';

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function updateCompletedStatus(): void
    {
        $this->loadCount('answers', 'questions');

        $this->completed = $this->answers_count === $this->questions_count;

        $this->update(['completed' => $this->completed]);

        $this->survey->updateCompletedStatus();
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
        );
    }

    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class);
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

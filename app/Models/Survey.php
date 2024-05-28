<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Survey extends Model
{
    use SoftDeletes;

    public function scopeUserScope(Builder $query): void
    {
        if (Auth::user()->isNotAdmin()) {
            $query->whereRelation('patient.user', 'id', Auth::id());
        }
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class)
            ->withArchived();
    }

    public function questionnaires(): BelongsToMany
    {
        return $this->belongsToMany(Questionnaire::class)
            ->using(QuestionnaireSurvey::class);
    }

    public function questionnaireSurvey(): HasMany
    {
        return $this->hasMany(QuestionnaireSurvey::class);
    }

    public function answers(): HasManyThrough
    {
        return $this->hasManyThrough(
            Answer::class,
            QuestionnaireSurvey::class,
            'survey_id',
            'questionnaire_survey_id',
            'id',
            'id'
        );
    }

    public function comments(): HasManyThrough
    {
        return $this->hasManyThrough(
            Answer::class,
            QuestionnaireSurvey::class,
            'survey_id',
            'questionnaire_survey_id',
            'id',
            'id',
        )->whereNotNull('comment');
    }

    public function skippedQuestions(): HasManyThrough
    {
        return $this->hasManyThrough(
            Answer::class,
            QuestionnaireSurvey::class,
            'survey_id',
            'questionnaire_survey_id',
            'id',
            'id',
        )->whereSkipped(true);
    }
}

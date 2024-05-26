<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class QuestionnaireSurvey extends Pivot
{
    public $timestamps = false;

    public $incrementing = 'questionnaire_survey';

    protected $casts = [
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public function lastAnswered(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->answers->last()?->created_at;
            }
        );
    }

    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class);
    }

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class, 'questionnaire_survey_id', 'id');
    }
}

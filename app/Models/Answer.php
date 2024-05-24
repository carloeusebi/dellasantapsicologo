<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'value',
        'comment',
    ];

    public function questionnaireSurvey(): BelongsTo
    {
        return $this->belongsTo(QuestionnaireSurvey::class);
    }

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }

    public function survey()
    {
        return $this->questionnaireSurvey->survey;
    }


    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}

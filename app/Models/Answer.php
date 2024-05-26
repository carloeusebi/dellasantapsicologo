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
        'key'
    ];

    public function questionnaireSurvey(): BelongsTo
    {
        return $this->belongsTo(QuestionnaireSurvey::class);
    }

    public function choice(): BelongsTo
    {
        return $this->belongsTo(Choice::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}

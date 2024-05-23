<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'text',
        'questionnaire_id',
        'previous_question',
        'next_question',
        'reversed',
        'answers',
        'old_id',
    ];

    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class);
    }

    public function previousQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'previous_question');
    }

    public function nextQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'next_question');
    }

    protected function casts(): array
    {
        return [
            'answers' => 'array',
            'reversed' => 'boolean',
        ];
    }
}

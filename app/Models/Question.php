<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property array<array{'id': int, 'points': int, 'customAnswer': string }> $custom_answers
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
        'answers',
        'old_id',
    ];

    protected $casts = [
        'custom_answers' => 'array',
        'reversed' => 'boolean',
    ];

    public function getCustomAnswerText(int $value): string
    {
        if (empty($this->custom_answers)) {
            return '';
        }

        if ($value === -1) {
            return 'Risposta saltata';
        }

        return collect($this->custom_answers)->first(fn(array $answer) => $answer['points'] === $value)['customAnswer'];
    }
//
//    public function getQuestionNumber(): int
//    {
//        return $this->questionnaire->
//            load('questions')
//                ->questions
//                ->search(fn(Question $question) => $question->is($this)) + 1;
//    }

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
}

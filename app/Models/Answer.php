<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

class Answer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'questionnaire_survey_id',
        'question_id',
        'value',
        'comment',
        'choice_id',
        'skipped',
    ];

    public function chosenCustomAnswer(Question $question): string
    {
        if (!$question->custom_answers) {
            return '';
        }

        $choices = Arr::first($question->custom_answers, function (array $answer) {
            return $answer['points'] === $this->value;
        });

        return $choices['customAnswer'] ?? '';
    }

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

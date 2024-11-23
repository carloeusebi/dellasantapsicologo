<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    protected static function booted(): void
    {
        static::deleting(function (Answer $answer) {
            info('Deleting answer '.$answer->id);
            log_non_vendor_stack_trace();
        });
    }

    /** @return Attribute<?int, never> */
    protected function reversedChoiceId(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                if (! $attributes['choice_id']) {
                    return null;
                }

                $choices = $this->question->choices->isEmpty() ? $this->question->questionnaire->choices : $this->question->choices;
                $choice = $choices->first(fn (Choice $choice) => $choice->id === $attributes['choice_id']);

                if (! $this->question->reversed) {
                    return $choice->id;
                }

                $chosenIndex = $choices->search(fn (Choice $c) => $c->id === $choice->id);
                $reversedIndex = $choices->count() - 1 - $chosenIndex;

                return $choices->get($reversedIndex)?->id;
            }
        );
    }

    //    public function chosenCustomChoice(Question $question): string
    //    {
    //        if (!$question->custom_choices) {
    //            return '';
    //        }
    //
    //        $choices = Arr::first($question->custom_choices, function (array $answer) {
    //            return $answer['points'] === $this->value;
    //        });
    //
    //        return $choices['customAnswer'] ?? '';
    //    }

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

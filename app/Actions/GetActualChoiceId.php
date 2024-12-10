<?php

namespace App\Actions;

use App\Models\Answer;
use App\Models\Choice;
use App\Models\Question;
use App\Models\Questionnaire;
use Lorisleiva\Actions\Concerns\AsAction;

class GetActualChoiceId
{
    use AsAction;

    public function handle(?Answer $answer, Question $question, Questionnaire $questionnaire): ?int
    {
        if (! $answer || ! $answer->choice_id) {
            return null;
        }

        if (! $question->reversed) {
            return $answer->choice->id;
        }

        $choices = $answer->choice->questionable_type === Question::class ? $question->choices : $questionnaire->choices;
        $selectedChoice = $choices->first(fn (Choice $choice) => $answer->choice?->is($choice));

        return get_reversed_choice($choices, $selectedChoice)?->id;
    }
}

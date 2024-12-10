<?php

namespace App\Actions;

use App\Models\Choice;
use App\Models\Question;
use Lorisleiva\Actions\Concerns\AsAction;

final class CalculateScore
{
    use AsAction;

    public function handle(Question $question, ?Choice $choice): ?int
    {
        if (! $choice) {
            return null;
        }

        if (! $question->reversed) {
            return $choice->points;
        }

        $choices = $question->choices->isEmpty()
            ? $question->questionnaire->choices
            : $question->choices;

        return get_reversed_choice($choices, $choice)->points;
    }
}

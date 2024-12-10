<?php

use App\Actions\GetActualChoiceId;
use App\Models\Answer;
use App\Models\Choice;
use App\Models\Question;
use App\Models\Questionnaire;
use Carbon\Carbon;
use Illuminate\Support\Collection;

function get_formatted_date(?Carbon $date, string $format = 'd F Y'): string
{
    if (! $date) {
        return '';
    }

    if ($date->isToday()) {
        $diff = 'Oggi';
    } elseif ($date->isYesterday()) {
        $diff = 'Ieri';
    } else {
        $diff = $date->diffForHumans();
    }

    return "<span>$diff</span>&nbsp;<span class='text-xs'>({$date->translatedFormat($format)})</span>";
}

function log_non_vendor_stack_trace(): void
{
    $backtrace = debug_backtrace();
    foreach ($backtrace as $trace) {
        if (isset($trace['file']) && ! str_contains($trace['file'], 'vendor')) {
            info($trace['file'].':'.$trace['line']);
        }
    }
}

/**
 * @param  Collection<int, Choice>  $choices
 */
function get_reversed_choice(Collection $choices, Choice $choice): ?Choice
{
    $chosenIndex = $choices->search(fn (Choice $c) => $c->id === $choice->id);
    $reversedIndex = $choices->count() - 1 - $chosenIndex;

    return $choices->get($reversedIndex);
}

function get_actual_choice_id(?Answer $answer, Question $question, Questionnaire $questionnaire): ?int
{
    return GetActualChoiceId::run($answer, $question, $questionnaire);
}

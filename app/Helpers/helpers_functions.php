<?php

use Carbon\Carbon;

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

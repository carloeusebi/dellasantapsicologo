<?php

use Carbon\Carbon;

function get_formatted_date(Carbon|null $date, string $format = 'd F Y'): string
{
    if (!$date) {
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

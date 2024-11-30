<?php

namespace App\Listeners;

use App\Events\SurveyCompleted;
use App\Notifications\SurveyCompletedNotification;

class SendSurveyCompletedNotificationListener
{
    public function handle(SurveyCompleted $event): void
    {
        $event->survey->user->notify(new SurveyCompletedNotification($event->survey));
    }
}

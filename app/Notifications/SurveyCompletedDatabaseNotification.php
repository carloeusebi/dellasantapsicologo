<?php

namespace App\Notifications;

use App\Models\Survey;
use Illuminate\Notifications\Notification;

class SurveyCompletedDatabaseNotification extends Notification
{
    public function __construct(
        public Survey $survey
    ) {
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toArray($notifiable): array
    {
        return [
            'type' => 'Valutazione Completata',
            'survey_id' => $this->survey->id,
            'message' => "{$this->survey->title} di {$this->survey->patient->full_name}"
        ];
    }
}

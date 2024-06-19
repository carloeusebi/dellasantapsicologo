<?php

namespace App\Notifications;

use App\Models\Survey;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;

class SurveyCompletedPushNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Survey $survey
    ) {
    }

    public function via($notifiable): array
    {
        return [WebPushChannel::class];
    }

    public function toWebPush($notifiable, $notification): WebPushMessage
    {
        return (new WebPushMessage)
            ->title('Valutazione Completata')
            ->icon('/favicon.ico')
            ->body("{$this->survey->patient->full_name} ha completato la valutazione {$this->survey->title}")
            ->action('Vai alla valutazione', 'view_survey')
            ->options(['TTL' => 3000])
            ->data(['url' => route('surveys.show', $this->survey)]);
    }

}

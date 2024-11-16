<?php

namespace App\Notifications;

use App\Models\Survey;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;

class SurveyCompletedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public Survey $survey) {}

    public function via(): array
    {
        return ['mail', 'database', WebPushChannel::class];
    }

    public function toMail(): MailMessage
    {
        return (new MailMessage)
            ->subject('Valutazione completata')
            ->greeting('Buone notizie,')
            ->line(
                "{$this->survey->patient->full_name} ha completato {$this->survey->title} in data ".
                now()->translatedFormat('d F Y').' alle '.now()->translatedFormat('H:i')
            )
            ->action('Vai alla valutazione', url(route('surveys.show', $this->survey)));
    }

    public function toArray(): array
    {
        return [
            'type' => 'Valutazione Completata',
            'survey_id' => $this->survey->id,
            'message' => "{$this->survey->title} di {$this->survey->patient->full_name}",
        ];
    }

    public function toWebPush(): WebPushMessage
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

<?php

namespace App\Notifications;

use App\Models\Survey;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SurveyCompletedEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Survey $survey
    ) {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
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

    public function toArray($notifiable): array
    {
        return [];
    }
}

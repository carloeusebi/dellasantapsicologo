<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Throwable;

class ExceptionNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        protected Throwable $exception
    ) {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Exception Notification')
            ->line('An exception was thrown in your application.')
            ->line($this->exception->getMessage())
            ->line('File:')
            ->line($this->exception->getFile())
            ->line('Line:')
            ->line($this->exception->getLine())
            ->line('Stack trace:')
            ->line($this->exception->getTraceAsString());
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}

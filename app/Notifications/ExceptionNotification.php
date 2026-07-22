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

    public string $exceptionClass;

    public string $message;

    public string $file;

    public int $line;

    public string $traceAsString;

    public function __construct(Throwable $exception)
    {
        $this->exceptionClass = get_class($exception);
        $this->message = $exception->getMessage();
        $this->file = $exception->getFile();
        $this->line = $exception->getLine();
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
            ->line("{$this->exceptionClass}: {$this->message}")
            ->line('File:')
            ->line($this->file)
            ->line('Line:')
            ->line((string) $this->line);
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}

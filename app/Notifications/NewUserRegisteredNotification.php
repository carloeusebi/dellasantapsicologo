<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserRegisteredNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        protected User $user
    ) {}

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New User Registered')
            ->line('A new user has registered.')
            ->line('Name: '.$this->user->name)
            ->line('Email: '.$this->user->email)
            ->line('Totale Utenti: '.User::count());
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}

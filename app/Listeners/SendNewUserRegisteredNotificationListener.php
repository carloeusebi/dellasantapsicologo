<?php

namespace App\Listeners;

use App\Models\Role;
use App\Models\User;
use App\Notifications\NewUserRegisteredNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Notification;

class SendNewUserRegisteredNotificationListener
{
    public function handle(Registered $event): void
    {
        /** @var User $user */
        $user = $event->user;

        Notification::send(
            User::whereRelation('role', 'name', Role::ADMIN)->get(),
            new NewUserRegisteredNotification($user)
        );
    }
}

<?php

namespace App\Livewire\Components;

use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Component;

/**
 * @property DatabaseNotificationCollection $notifications
 */
#[Lazy]
class UserNotifications extends Component
{
    public int $unreadNotificationsCount = 0;

    public bool $drawer = false;

    public function mount(): void
    {
        // @phpstan-ignore-next-line
        $this->unreadNotificationsCount = Auth::user()->unreadNotifications->count();
    }

    public function markAllAsRead(): void
    {
        // @phpstan-ignore-next-line
        Auth::user()->unreadNotifications->markAsRead();

        $this->unreadNotificationsCount = 0;
    }

    public function markAsRead(string $notificationId): void
    {
        $notification = Auth::user()->notifications()
            ->whereId($notificationId)
            ->first();

        $notification->markAsRead();

        $this->redirectRoute(
            'surveys.show',
            ['survey' => $notification->data['survey_id']],
            navigate: true
        );
    }

    #[Computed]
    public function notifications()
    {
        return Auth::user()->notifications;
    }

//    public function updateUnreadNotificationsCount(): void
//    {
//        // @phpstan-ignore-next-line
//        $this->unreadNotificationsCount = Auth::user()->unreadNotifications->count();
//    }

    public function deleteAll(): void
    {
        $this->drawer = false;

        Auth::user()->notifications()->delete();

        $this->unreadNotificationsCount = 0;
    }

    public function delete(string $id): void
    {
        Auth::user()->notifications()->whereId($id)->delete();
    }

    public function placeholder(): string
    {
        return <<<'HTML'
            <div>
             <x-button icon="o-bell" class="btn-ghost btn-sm hover:bg-inherit" responsive />
            </div>
        HTML;
    }
}

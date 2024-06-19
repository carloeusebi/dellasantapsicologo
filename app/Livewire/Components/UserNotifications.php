<?php

namespace App\Livewire\Components;

use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Mary\Traits\Toast;

/**
 * @property DatabaseNotificationCollection $notifications
 */
#[Lazy]
class UserNotifications extends Component
{
    use Toast;

    public int $unreadNotificationsCount = 0;

    public function mount(): void
    {
        $this->unreadNotificationsCount = Auth::user()->unreadNotifications->count();
    }

    public function updateUnreadNotificationsCount(): void
    {
        $this->unreadNotificationsCount = Auth::user()->unreadNotifications->count();
    }


    public function markAsRead($notificationId): void
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
        return Auth::user()->notifications->take(5);
    }

    public function placeholder(): string
    {
        return <<<'HTML'
<div>
 <x-button label="Notifiche" icon="o-bell" class="btn-ghost btn-sm" responsive />
</div>
HTML;
    }
}

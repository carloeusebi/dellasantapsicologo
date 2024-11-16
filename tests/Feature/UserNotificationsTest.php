<?php

use App\Livewire\Components\UserNotifications;
use App\Models\Survey;
use App\Models\User;
use App\Notifications\SurveyCompletedNotification;

use function PHPUnit\Framework\assertCount;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->livewire = Livewire::actingAs($this->user)
        ->test(UserNotifications::class);

    $this->survey = Survey::factory()->recycle($this->user)->create();
    notifyUser($this->user, $this->survey);
});

function notifyUser(User $user, Survey $survey): void
{
    $user->notify(new SurveyCompletedNotification($survey));
}

it('can marks a notification as read', function () {
    $this->livewire
        ->call('markAsRead', $this->user->unreadNotifications->first()->id)
        ->assertRedirectToRoute('surveys.show', ['survey' => $this->survey->id]);

    $this->assertTrue($this->user->unreadNotifications()->get()->isEmpty());
});

it('can mark all notifications as read', function () {
    notifyUser($this->user, $this->survey);

    $this->livewire
        ->call('markAllAsRead');

    $this->assertTrue($this->user->unreadNotifications()->get()->isEmpty());
});

it('can updated the unread notifications count', function () {
    $this->livewire
        ->assertSet('unreadNotificationsCount', 0)
        ->call('updateUnreadNotificationsCount')
        ->assertSet('unreadNotificationsCount', 1);
});

it('can delete a notification', function () {
    $this->livewire
        ->call('delete', $this->user->notifications->first()->id);

    assertCount(0, $this->user->refresh()->notifications);
});

it('can delete all notifications', function () {
    notifyUser($this->user, $this->survey);

    $this->livewire
        ->call('deleteAll');

    assertCount(0, $this->user->refresh()->notifications);
});

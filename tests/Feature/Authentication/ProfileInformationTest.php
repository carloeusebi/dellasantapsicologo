<?php

use App\Livewire\Profile\UpdateProfileInformationForm;
use App\Models\User;
use Livewire\Livewire;

test('current profile information is available', function () {
    $this->actingAs($user = User::factory()->create());

    $component = Livewire::test(UpdateProfileInformationForm::class);

    $component
        ->assertSet('name', $user->name)
        ->assertSet('email', $user->email);
});

test('profile information can be updated', function () {
    $this->actingAs($user = User::factory()->create());

    Livewire::test(UpdateProfileInformationForm::class)
        ->set('name', 'Test Name')
        ->set('email', 'test@example.com')
        ->call('updateProfileInformation');

    expect($user->fresh())
        ->name->toEqual('Test Name')
        ->email->toEqual('test@example.com');
});

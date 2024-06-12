<?php

use App\Livewire\Patients\ShowPatient;
use App\Models\Patient;
use App\Models\User;
use Livewire\Livewire;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

it('displays patient', function () {
    $user = User::factory()->create();
    $patient = Patient::factory()->recycle($user)->create();

    Livewire::actingAs($user)
        ->test(ShowPatient::class, ['patient' => $patient])
        ->assertSee($patient->full_name);
});

it('changes patient state', function () {
    $user = User::factory()->create();

    $patient = Patient::factory()->recycle($user)->create();

    Livewire::actingAs($user)
        ->test(ShowPatient::class, ['patient' => $patient])
        ->call('changeState');

    assertTrue($patient->fresh()->isArchived());
});

it('resets form', function () {
    $user = User::factory()->create();
    $patient = Patient::factory()->recycle($user)->create();

    $component = Livewire::actingAs($user)
        ->test(ShowPatient::class, ['patient' => $patient])
        ->set('form.first_name', 'New Name')
        ->call('resetForm');

    assertEquals($patient->first_name, $component->get('form.first_name'));
});

it('saves patient', function () {
    $user = User::factory()->create();
    $patient = Patient::factory()->recycle($user)->create();

    $newName = 'New Name';

    $component = Livewire::actingAs($user)
        ->test(ShowPatient::class, ['patient' => $patient])
        ->set('form.first_name', $newName)
        ->call('save');

    assertEquals($newName, $patient->fresh()->first_name);
});

it('deletes patient', function () {
    $user = User::factory()->create();
    $patient = Patient::factory()->recycle($user)->create();

    Livewire::actingAs($user)
        ->test(ShowPatient::class, ['patient' => $patient])
        ->call('delete');

    assertTrue($patient->fresh()->trashed());
});

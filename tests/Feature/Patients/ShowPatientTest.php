<?php

use App\Livewire\Patients\ShowPatient;
use App\Models\Patient;
use App\Models\User;
use Livewire\Livewire;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->livewire = Livewire::actingAs($this->user);
});

it('displays patient', function () {
    $patient = Patient::factory()->recycle($this->user)->create();

    $this->livewire
        ->test(ShowPatient::class, ['patient' => $patient])
        ->assertViewHas('patient', $patient);
});

it('changes patient state', function () {
    $patient = Patient::factory()->recycle($this->user)->create();

    $this->livewire
        ->test(ShowPatient::class, ['patient' => $patient])
        ->call('changeState');

    assertTrue($patient->fresh()->isArchived());
});

it('resets form', function () {
    $patient = Patient::factory()->recycle($this->user)->create();

    $component = $this->livewire
        ->test(ShowPatient::class, ['patient' => $patient])
        ->set('form.first_name', 'New Name')
        ->call('resetForm');

    assertEquals($patient->first_name, $component->get('form.first_name'));
});

it('saves patient', function () {
    $patient = Patient::factory()->recycle($this->user)->create();

    $newName = 'New Name';

    $this->livewire
        ->test(ShowPatient::class, ['patient' => $patient])
        ->set('form.first_name', $newName)
        ->call('save');

    assertEquals($newName, $patient->fresh()->first_name);
});

it('deletes patient', function () {
    $patient = Patient::factory()->recycle($this->user)->create();

    $this->livewire
        ->test(ShowPatient::class, ['patient' => $patient])
        ->call('delete');

    assertTrue($patient->fresh()->trashed());
});

it('hides other user patients', function () {
    $otherUserPatient = Patient::factory()->create();

    $this->livewire
        ->test(ShowPatient::class, ['patient' => $otherUserPatient])
        ->assertNotFound();
});

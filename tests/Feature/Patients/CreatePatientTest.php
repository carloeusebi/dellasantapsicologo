<?php

use App\Livewire\Patients\CreatePatient;
use App\Models\Patient;
use App\Models\User;
use function PHPUnit\Framework\assertCount;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNull;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->livewire = Livewire::actingAs($this->user)->test(CreatePatient::class);
});

it('creates a new patient and redirects', function () {
    $this->livewire
        ->set('form.first_name', 'John')
        ->set('form.last_name', 'Doe')
        ->call('save')
        ->assertRedirect(route('patients.show', Patient::first()));

    assertCount(1, Patient::all());
    assertEquals('John', Patient::first()->first_name);
    assertEquals('Doe', Patient::first()->last_name);
});


it('resets the form', function () {
    $this->livewire
        ->set('form.first_name', 'John')
        ->set('form.last_name', 'Doe')
        ->call('resetForm');

    assertNull($this->livewire->get('form.first_name'));
    assertNull($this->livewire->get('form.last_name'));
});

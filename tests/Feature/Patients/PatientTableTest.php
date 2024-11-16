<?php

use App\Livewire\Patients\Components\PatientTable;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->livewire = Livewire::actingAs($this->user)->withoutLazyLoading()->test(PatientTable::class);
});

it('renders with active patients by default', function () {
    Patient::factory(3)->recycle($this->user)->create();
    Patient::factory()->recycle($this->user)->archived()->create();

    Livewire::actingAs($this->user)->withoutLazyLoading()->test(PatientTable::class)
        ->assertViewHas('patients', fn (LengthAwarePaginator $collection) => $collection->count() === 3);
});

it('renders with all patients when state is set to all', function () {
    Patient::factory(3)->recycle($this->user)->create();
    Patient::factory()->recycle($this->user)->archived()->create();

    $this->livewire
        ->set('state', PatientTable::ALL_STATE)
        ->assertViewHas('patients', fn (LengthAwarePaginator $collection) => $collection->count() === 4);
});

it('renders with archived patients when state is set to archived', function () {
    Patient::factory(3)->recycle($this->user)->create();
    Patient::factory(2)->recycle($this->user)->archived()->create();

    $this->livewire
        ->set('state', PatientTable::ARCHIVED_STATE)
        ->assertViewHas('patients', fn (LengthAwarePaginator $collection) => $collection->count() === 2);
});

it('does not render other user patients', function () {
    $otherUser = User::factory()->create();

    Patient::factory(3)->recycle($otherUser)->create();

    $this->livewire
        ->refresh()
        ->assertViewHas('patients', fn (LengthAwarePaginator $collection) => $collection->isEmpty());
});

it('renders with patients sorted by birth date when sort by is set to birt_date', function () {
    Patient::factory()->recycle($this->user)->create(['birth_date' => now()->subYears(20)]);
    $oldest = Patient::factory()->recycle($this->user)->create(['birth_date' => now()->subYears(30)]);
    $youngest = Patient::factory()->recycle($this->user)->create(['birth_date' => now()->subYears(10)]);

    $this->livewire
        ->set('sortBy', ['column' => 'birth_date', 'direction' => 'desc'])
        ->assertViewHas('patients',
            fn (LengthAwarePaginator $collection
            ) => $collection->first()->is($youngest) && $collection->last()->is($oldest)
        );

});

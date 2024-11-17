<?php

use App\Livewire\Surveys\Components\SurveysTable;
use App\Models\Patient;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->surveys = Survey::factory(3)->recycle($this->user)->create();

    $this->livewire = Livewire::actingAs($this->user)
        ->withoutLazyLoading()
        ->test(SurveysTable::class);
});

it('renders the surveys table', function () {
    $this->livewire
        ->assertOk()
        ->assertViewHas('surveys', fn (LengthAwarePaginator $surveys) => $surveys->count() === 3)
        ->assertSee($this->surveys->pluck('title')->toArray());
});

it('renders survey by search term', function () {
    $survey = Survey::factory()->recycle($this->user)->create([
        'title' => 'Alakazam',
    ]);

    $this->livewire
        ->set('search', $survey->title)
        ->assertViewHas('surveys', fn (LengthAwarePaginator $surveys) => $surveys->count() === 1)
        ->assertSee($survey->title);
});

it('filters surveys by patient state', function () {
    $patient = Patient::factory()
        ->recycle($this->user)
        ->hasSurveys()
        ->archived()
        ->create();

    $this->livewire
        ->refresh()
        ->assertViewHas('surveys', fn (LengthAwarePaginator $surveys) => $surveys->count() === 4)
        ->set('patientState', SurveysTable::CURRENT)
        ->assertViewHas('surveys', fn (LengthAwarePaginator $surveys) => $surveys->count() === 3)
        ->set('patientState', SurveysTable::ARCHIVED)
        ->assertViewHas('surveys', fn (LengthAwarePaginator $surveys) => $surveys->count() === 1)
        ->assertSee($patient->surveys->first()->title);
});

it('filters surveys by state', function () {
    $survey = Survey::factory()->recycle($this->user)->completed()->create();

    $this->livewire
        ->refresh()
        ->assertViewHas('surveys', fn (LengthAwarePaginator $surveys) => $surveys->count() === 4)
        ->set('state', SurveysTable::NOT_COMPLETED)
        ->assertViewHas('surveys', fn (LengthAwarePaginator $surveys) => $surveys->count() === 3)
        ->set('state', SurveysTable::COMPLETED)
        ->assertViewHas('surveys', fn (LengthAwarePaginator $surveys) => $surveys->count() === 1)
        ->assertSee($survey->title);
});

it('only shows surveys for the current user', function () {
    $otherUser = User::factory()->create();
    Survey::factory(3)->recycle($otherUser)->create();

    $this->livewire
        ->refresh()
        ->assertViewHas('surveys', fn (LengthAwarePaginator $surveys) => $surveys->count() === 3);
});

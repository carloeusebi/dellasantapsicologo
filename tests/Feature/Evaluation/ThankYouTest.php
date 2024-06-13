<?php

use App\Livewire\Evaluation\ThankYou;
use App\Models\Survey;

it('mounts with completed survey', function () {
    $survey = Survey::factory()->completed()->create();

    Livewire::test(ThankYou::class, ['survey' => $survey])
        ->assertOk()
        ->assertSet('survey', $survey);
});

it('redirects with incomplete survey', function () {
    $survey = Survey::factory()->create();

    Livewire::test(ThankYou::class, ['survey' => $survey])
        ->assertRedirectToRoute('evaluation.home', $survey);
});

it('throws 404 with outdated survey', function () {
    $minutes = ThankYou::getMinutesFromCompletionBeforeThrowingNotFound() + 1;

    $survey = Survey::factory()->completed()->create();

    $survey->updated_at = now()->subMinutes($minutes);
    $survey->save();

    Livewire::test(ThankYou::class, ['survey' => $survey])
        ->assertNotFound();
});

<?php

use App\Actions\AnswerQuestion;
use App\Livewire\Evaluation\Home;
use App\Models\QuestionnaireSurvey;
use App\Models\Survey;

it('mounts with incomplete survey', function () {
    $survey = Survey::factory()->create();

    Livewire::test(Home::class, ['survey' => $survey])
        ->assertOk()
        ->assertSet('survey', $survey);
});

it('throws not found exception when survey is completed', function () {
    $survey = Survey::factory()->completed()->create();

    Livewire::test(Home::class, ['survey' => $survey])
        ->assertNotFound();
});

it('redirects to first non completed survey', function () {
    $survey = Survey::factory()
        ->has(QuestionnaireSurvey::factory()->completed())
        ->has(QuestionnaireSurvey::factory())
        ->create();

    AnswerQuestion::run(
        $survey->questionnaireSurveys->first()?->id,
        $survey->questionnaireSurveys->first()->questions()->first()->id
    );

    Livewire::test(Home::class, ['survey' => $survey])
        ->assertRedirectToRoute('evaluation.questionnaire', [
            $survey->token,
            $survey->questionnaireSurveys->where('completed', false)->first()->id,
        ]);
});

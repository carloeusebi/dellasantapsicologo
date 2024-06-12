<?php

use App\Actions\AnswerQuestion;
use App\Livewire\Evaluation\EvaluationPatientForm;
use App\Models\QuestionnaireSurvey;
use App\Models\Survey;
use function PHPUnit\Framework\assertEquals;

it('mounts with incomplete survey', function () {
    $survey = Survey::factory()->create();

    Livewire::test(EvaluationPatientForm::class, ['survey' => $survey])
        ->assertOk()
        ->assertSet('survey', $survey);
});

it('throws not found exception when survey is completed', function () {
    $survey = Survey::factory()->completed()->create();

    Livewire::test(EvaluationPatientForm::class, ['survey' => $survey])
        ->assertNotFound();
});

it('redirects to first non completed survey', function () {
    $survey = Survey::factory()
        ->has(QuestionnaireSurvey::factory()->completed())
        ->has(QuestionnaireSurvey::factory())
        ->create();

    AnswerQuestion::handle(
        $survey->questionnaireSurveys->first()?->id,
        $survey->questionnaireSurveys->first()->questions()->first()->id
    );

    Livewire::test(EvaluationPatientForm::class, ['survey' => $survey])
        ->assertRedirectToRoute('evaluation.questionnaire', [
            $survey->token,
            $survey->questionnaireSurveys->where('completed', false)->first()->id,
        ]);
});

it('resets the form', function () {
    $survey = Survey::factory()->create();
    $patientName = $survey->patient->first_name;

    $component = Livewire::test(EvaluationPatientForm::class, ['survey' => $survey])
        ->set('form.first_name', 'John')
        ->assertSet('form.first_name', 'John')
        ->call('resetForm');

    assertEquals($patientName, $component->form->first_name);
});

it('saves the form', function () {
    $survey = Survey::factory()
        ->hasQuestionnaires()
        ->create();

    Livewire::test(EvaluationPatientForm::class, ['survey' => $survey])
        ->set('form.first_name', 'John')
        ->set('form.last_name', 'Doe')
        ->call('save');

    assertEquals('John', $survey->refresh()->patient->first_name);
    assertEquals('Doe', $survey->refresh()->patient->last_name);
});

it('redirects to questionnaire', function () {
    $survey = Survey::factory()
        ->hasQuestionnaires()
        ->create();

    Livewire::test(EvaluationPatientForm::class, ['survey' => $survey])
        ->call('save')
        ->assertRedirectToRoute('evaluation.questionnaire', [
            $survey->token,
            $survey->questionnaireSurveys->first()->id
        ]);
});

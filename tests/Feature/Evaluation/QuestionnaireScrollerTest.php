<?php

use App\Actions\AnswerQuestion;
use App\Livewire\Evaluation\QuestionnaireScroller;
use App\Models\Answer;
use App\Models\Choice;
use App\Models\Questionnaire;
use App\Models\QuestionnaireSurvey;
use function PHPUnit\Framework\assertEquals;

it('mounts with incomplete questionnaire survey', function () {
    $qS = QuestionnaireSurvey::factory()->create();

    AnswerQuestion::handle(
        $qS->id,
        $qS->questions()->first()->id,
    );

    Livewire::test(QuestionnaireScroller::class, [
        'survey' => $qS->survey,
        'questionnaireSurvey' => $qS
    ])
        ->assertOk()
        ->assertSet('questionnaireSurvey', $qS)
        ->assertSet('survey', $qS->survey);
});

it('redirects if questionnaire survey is completed', function () {
    $qS = QuestionnaireSurvey::factory()
        ->has(Questionnaire::factory()->hasChoices())
        ->completed()->create();

    Livewire::test(QuestionnaireScroller::class, [
        'survey' => $qS->survey,
        'questionnaireSurvey' => $qS
    ])
        ->assertRedirectToRoute('evaluation.home', $qS->survey);
});

it('answer question and redirect to next question', function () {
    $qS = QuestionnaireSurvey::factory()
        ->create();

    $choice = Choice::factory()
        ->create([
            'questionable_id' => $qS->questionnaire->id,
            'questionable_type' => Questionnaire::class,
        ]);

    Livewire::test(QuestionnaireScroller::class, [
        'survey' => $qS->survey,
        'questionnaireSurvey' => $qS
    ])
        ->call('answerQuestion', $choice->id);

    $answer = Answer::first();

    assertEquals($qS->id, $answer->questionnaire_survey_id);
    assertEquals($qS->questions()->first()->id, $answer->question_id);
    assertEquals($choice->id, $answer->choice_id);
});

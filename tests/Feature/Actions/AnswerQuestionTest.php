<?php

use App\Actions\AnswerQuestion;
use App\Models\Answer;
use App\Models\Choice;
use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\QuestionnaireSurvey;
use App\Models\Survey;

use function Pest\Laravel\assertDatabaseHas;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

it('handle answers with choice', function () {
    $questionnaireSurvey = QuestionnaireSurvey::factory()->create();
    $choice = $questionnaireSurvey->questionnaire->choices->first();

    AnswerQuestion::run(
        $questionnaireSurvey->id,
        $questionnaireSurvey->questionnaire->questions->first()->id,
        $choice->id,
    );

    assertDatabaseHas('answers', [
        'questionnaire_survey_id' => $questionnaireSurvey->id,
        'question_id' => $questionnaireSurvey->questionnaire->questions->first()->id,
        'choice_id' => $choice->id,
        'value' => $choice->points,
    ]);
});

it('handles answers with a comment', function () {
    $questionnaireSurvey = QuestionnaireSurvey::factory()->create();
    $choice = $questionnaireSurvey->questionnaire->choices->first();

    AnswerQuestion::run(
        $questionnaireSurvey->id,
        $questionnaireSurvey->questionnaire->questions->first()->id,
        $choice->id,
        'This is a comment',
    );

    assertDatabaseHas('answers', [
        'comment' => 'This is a comment',
    ]);
});

it('handles skipped answers', function () {
    $questionnaireSurvey = QuestionnaireSurvey::factory()->create();

    AnswerQuestion::run(
        $questionnaireSurvey->id,
        $questionnaireSurvey->questionnaire->questions->first()->id,
        skipped: true,
    );

    assertDatabaseHas('answers', [
        'choice_id' => null,
        'value' => null,
        'skipped' => true,
    ]);
});

it('updates questionnaire survey completed status', function () {
    $questionnaireSurvey = QuestionnaireSurvey::factory()->create();
    QuestionnaireSurvey::factory()->recycle($questionnaireSurvey->survey)->create();

    $questionnaireSurvey->questions->each(function ($question) use ($questionnaireSurvey) {
        AnswerQuestion::run(
            $questionnaireSurvey->id,
            $question->id,
            $questionnaireSurvey->questionnaire->choices()->inRandomOrder()->first()->id,
        );
    });

    assertTrue($questionnaireSurvey->fresh()->completed);
    assertFalse($questionnaireSurvey->survey->fresh()->completed);
});

it('updates survey completed status', function () {
    $questionnaireSurvey = QuestionnaireSurvey::factory()->create();

    $questionnaireSurvey->questions->each(function ($question) use ($questionnaireSurvey) {
        AnswerQuestion::run(
            $questionnaireSurvey->id,
            $question->id,
            $questionnaireSurvey->questionnaire->choices()->inRandomOrder()->first()->id,
        );
    });

    assertTrue($questionnaireSurvey->fresh()->completed);
    assertTrue($questionnaireSurvey->survey->fresh()->completed);
});

it('updates survey completed status when all answers are skipped', function () {
    $questionnaireSurvey = QuestionnaireSurvey::factory()->create();

    $questionnaireSurvey->questions->each(function ($question) use ($questionnaireSurvey) {
        AnswerQuestion::run(
            $questionnaireSurvey->id,
            $question->id,
            skipped: true,
        );
    });

    assertTrue($questionnaireSurvey->fresh()->completed);
    assertTrue($questionnaireSurvey->survey->fresh()->completed);
});

it('correctly calculates the value of a reversed question', function () {
    $questionnaire = Questionnaire::factory()->make();
    $questionnaire->save();
    QuestionnaireSurvey::factory()->recycle($questionnaire)->create();
    Question::factory(5)->reversed()->recycle($questionnaire)->create();

    for ($i = 0; $i < 5; $i++) {
        Choice::factory()->recycle($questionnaire)->create([
            'points' => $i,
        ]);
    }

    $questionnaire->questions->each(function (Question $question, int $i) use ($questionnaire) {
        AnswerQuestion::run(
            $questionnaire->questionnaireSurveys->first()->id,
            $question->id,
            $questionnaire->choices->skip($i)->first()->id,
        );
    });

    $answers = Answer::all();

    assertEquals(4, $answers->first()->value);
    assertEquals(3, $answers->skip(1)->first()->value);
    assertEquals(2, $answers->skip(2)->first()->value);
    assertEquals(1, $answers->skip(3)->first()->value);
    assertEquals(0, $answers->last()->value);
});

it('updates survey updated_at column', function () {
    $survey = Survey::factory()
        ->hasQuestionnaires(3)
        ->create([
            'created_at' => now()->subDays(3),
            'updated_at' => now()->subDays(3),
        ]);

    $qS = $survey->questionnaireSurveys
        ->load('questionnaire.questions', 'questionnaire.choices')
        ->first();

    AnswerQuestion::run(
        questionnaire_survey_id: $qS->id,
        question_id: $qS->questionnaire->questions->first()->id,
        choice_id: $qS->questionnaire->choices->first()->id,
    );

    assertEquals(
        $survey->fresh()->updated_at->toDateString(),
        Answer::first()->updated_at->toDateString(),
    );
});

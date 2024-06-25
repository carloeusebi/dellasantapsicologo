<?php

use App\Actions\AnswerQuestion;
use App\Livewire\Evaluation\QuestionnaireScroller;
use App\Models\Answer;
use App\Models\Choice;
use App\Models\Questionnaire;
use App\Models\QuestionnaireSurvey;
use App\Models\Survey;
use App\Notifications\SurveyCompletedNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Livewire;
use function PHPUnit\Framework\assertCount;
use function PHPUnit\Framework\assertEquals;

beforeEach(function () {
    $this->qS = QuestionnaireSurvey::factory()->create();
    $this->livewire = Livewire::test(QuestionnaireScroller::class, [
        'survey' => $this->qS->survey,
        'questionnaireSurvey' => $this->qS
    ]);
});

it('mounts with incomplete questionnaire survey', function () {
    AnswerQuestion::handle(
        $this->qS->id,
        $this->qS->questions()->first()->id,
    );

    $this->livewire
        ->assertOk()
        ->assertSet('questionnaireSurvey', $this->qS)
        ->assertSet('survey', $this->qS->survey);
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

it('answer question and goes to next question', function () {
    $choice = Choice::factory()
        ->create([
            'questionable_id' => $this->qS->questionnaire->id,
            'questionable_type' => Questionnaire::class,
        ]);

    $this->livewire
        ->assertSet('question.id', $this->qS->questions()->first()->id)
        ->call('answerQuestion', $choice->id)
        ->assertSet('question.id', $this->qS->questions()->skip(1)->first()->id);

    $answer = Answer::first();

    assertEquals($this->qS->id, $answer->questionnaire_survey_id);
    assertEquals($this->qS->questions()->first()->id, $answer->question_id);
    assertEquals($choice->id, $answer->choice_id);
});

it('can skip a question if leaving a comment and resets the comment', function () {
    $this->livewire
        ->assertSet('question.id', $this->qS->questions()->first()->id)
        ->set('comment', 'Comment')
        ->call('skipQuestion')
        ->assertSet('question.id', $this->qS->questions()->skip(1)->first()->id)
        ->assertSet('comment', '');

    $answer = Answer::first();

    assertEquals($this->qS->id, $answer->questionnaire_survey_id);
    assertEquals($this->qS->questions()->first()->id, $answer->question_id);
    assertEquals(null, $answer->choice_id);
    assertEquals('Comment', $answer->comment);
});

it('cannot skip a question if not leaving a comment', function () {
    $this->livewire
        ->call('skipQuestion');

    assertCount(0, Answer::all());
});

it('redirects to home when not last questionnaire survey is completed', function () {
    QuestionnaireSurvey::factory()->recycle($this->qS->survey)->create(); // Create another questionnaire survey
    $this->qS->questions->each(function () {
        $this->livewire->call('answerQuestion', $this->qS->questionnaire->choices->first()->id);
    });
    $this->livewire->assertRedirectToRoute('evaluation.home', $this->qS->survey);
});

it('redirects to thank you when last questionnaire survey is completed', function () {

    $this->qS->questions->each(function () {
        $this->livewire->call('answerQuestion', $this->qS->questionnaire->choices->first()->id);
    });
    $this->livewire
        ->assertRedirectToRoute('evaluation.thank-you', $this->qS->survey);
});

it('resets answers when max time between answers has passed', function () {
    $questionnaireSurvey = QuestionnaireSurvey::factory()->create([
        'created_at' => now()->subHours(QuestionnaireScroller::getHoursBetweenAnswersBeforeReset() + 1),
        'updated_at' => now()->subHours(QuestionnaireScroller::getHoursBetweenAnswersBeforeReset() + 1)
    ]);

    AnswerQuestion::handle(
        $questionnaireSurvey->id,
        $questionnaireSurvey->questions()->first()->id,
    );


    Livewire::test(QuestionnaireScroller::class, [
        'survey' => $questionnaireSurvey->survey,
        'questionnaireSurvey' => $questionnaireSurvey
    ]);

    assertCount(0, Answer::all());
});

it('sends an email notification when last survey is completed', function () {
    Notification::fake();

    $survey = Survey::factory()
        ->has(QuestionnaireSurvey::factory()->count(2))
        ->create();

    $survey
        ->load(
            'questionnaireSurveys.questions',
            'questionnaireSurveys.survey',
            'questionnaireSurveys.questionnaire.choices',
        )
        ->questionnaireSurveys
        ->each(function (QuestionnaireSurvey $qS) use ($survey) {
            $qS->questions->each(function () use ($qS, $survey) {
                Livewire::test(QuestionnaireScroller::class, [
                    'survey' => $survey->fresh(),
                    'questionnaireSurvey' => $qS
                ])->assertOk()
                    ->call('answerQuestion', $qS->questionnaire->choices->random()->id);
            });
        });

    Notification::assertSentTo(
        [$survey->user], SurveyCompletedNotification::class
    );

    Notification::assertCount(1);
});

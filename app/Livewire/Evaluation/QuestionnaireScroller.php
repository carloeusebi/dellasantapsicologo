<?php

namespace App\Livewire\Evaluation;

use App\Actions\AnswerQuestion;
use App\Models\Question;
use App\Models\QuestionnaireSurvey;
use App\Models\Survey;
use App\Notifications\SurveyCompletedNotification;
use Error;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

class QuestionnaireScroller extends Component
{
    use Toast;

    protected static float $hoursBetweenAnswersBeforeReset = 2; // hours

    public Survey $survey;

    public QuestionnaireSurvey $questionnaireSurvey;

    public ?Question $question;

    public ?string $comment = null;

    public static function getHoursBetweenAnswersBeforeReset(): float|int
    {
        return self::$hoursBetweenAnswersBeforeReset;
    }

    public function mount(
        Survey $survey,
        QuestionnaireSurvey $questionnaireSurvey
    ): void {
        if (! $questionnaireSurvey->survey->is($survey)) {
            throw new Error('Invalid questionnaire survey');
        }

        $firstNotCompletedQuestionnaireSurvey = $survey->questionnaireSurveys
            ->where('completed', false)
            ->first();

        if ($this->questionnaireSurvey->completed || ! $this->questionnaireSurvey->is($firstNotCompletedQuestionnaireSurvey)) {
            $this->redirectRoute('evaluation.home', $survey);
        }

        if (
            $this->questionnaireSurvey->updated_at?->diffInHours() > self::$hoursBetweenAnswersBeforeReset &&
            $this->questionnaireSurvey->answers->isNotEmpty()
        ) {
            // LOG FOR DEBUGGIN PURPOSES
            info('                                                                                                                                                  ');
            info('**************************************************************************************************************************************************');
            info('Deleting answers for questionnaire survey '.$this->questionnaireSurvey->id);
            info('Last updated at '.$this->questionnaireSurvey->updated_at);

            $this->questionnaireSurvey->answers()->get()->each->delete();

            info('**************************************************************************************************************************************************');
            info('                                                                                                                                                  ');

            $this->questionnaireSurvey->touch();
            $this->warning(
                'Sono passate più di due ore dall\'ultima risposta',
                'Per questo motivo devi ricominciare il questionario da capo. Ma non ti preoccupare, le risposte dei questionari precedenti sono ancora valide.<br><br> Cliccami per farmi sparire!',
                css: 'text-wrap alert-warning',
                timeout: 20_000
            );
        }
    }

    // Needed to give a different target to skip question spinner
    public function skipQuestion(): void
    {
        $this->answerQuestion();
    }

    public function answerQuestion(?int $choiceId = null): void
    {
        if (! $choiceId && ! $this->comment) {
            $this->error('Per favore inserisci un <br>commento se vuoi saltare la domanda');

            return;
        }

        [$questionnaireSurveyCompleted, $surveyCompleted] = AnswerQuestion::handle(
            $this->questionnaireSurvey->id,
            $this->question->id,
            $choiceId,
            $this->comment,
            ! $choiceId
        );

        $this->reset('comment');

        if ($surveyCompleted) {
            $this->survey->user->notify(new SurveyCompletedNotification($this->survey));
            $this->redirectRoute('evaluation.thank-you', $this->survey, navigate: true);

            return;
        } elseif ($questionnaireSurveyCompleted) {
            $this->redirectRoute('evaluation.home', $this->survey, navigate: true);

            return;
        }

        $nextQuestion = $this->getNextQuestion();

        if ($nextQuestion) {
            $this->question = $nextQuestion;
        } else {
            $this->redirectRoute('evaluation.home', $this->survey, navigate: true);
        }
    }

    public function getNextQuestion(): ?Question
    {
        return $this->questionnaireSurvey->questions->load([
            'answers' => function ($query) {
                /** @var HasMany $query */
                $query->whereRelation('questionnaireSurvey', 'id', $this->questionnaireSurvey->id);
            },
        ])
            ->where(fn (Question $question) => $question->answers->isEmpty())
            ->load('choices')
            ->first();
    }

    #[Layout('components.layouts.evaluation')]
    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application {
        $this->survey->loadCount('questionnaireSurveys', 'completedQuestionnaireSurvey');

        $this->questionnaireSurvey->load('questionnaire.choices', 'questions')
            ->loadCount('questions');

        $this->question = $this->getNextQuestion();

        return view('livewire.evaluation.questionnaire');
    }
}

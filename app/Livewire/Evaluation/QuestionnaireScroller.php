<?php

namespace App\Livewire\Evaluation;

use App\Actions\AnswerQuestion;
use App\Events\SurveyCompleted;
use App\Models\Question;
use App\Models\QuestionnaireSurvey;
use App\Models\Survey;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;
use Symfony\Component\HttpFoundation\Response;

class QuestionnaireScroller extends Component
{
    use Toast;

    protected static float $hoursBetweenAnswersBeforeReset = 2; // hours

    public Survey $survey;

    public ?QuestionnaireSurvey $questionnaireSurvey;

    public ?Question $question;

    public ?string $comment = null;

    public static function getHoursBetweenAnswersBeforeReset(): float|int
    {
        return self::$hoursBetweenAnswersBeforeReset;
    }

    public function mount(Survey $survey, QuestionnaireSurvey $questionnaireSurvey): void
    {
        if (! $questionnaireSurvey->survey->is($survey) || $survey->completed) {
            abort(Response::HTTP_NOT_FOUND);
        }

        $firstNotCompletedQuestionnaireSurvey = $survey->questionnaireSurveys
            ->where('completed', false)
            ->first();

        if ($questionnaireSurvey->completed || ! $questionnaireSurvey->is($firstNotCompletedQuestionnaireSurvey)) {
            $this->redirectRoute('evaluation.home', $survey);

            return;
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

        [$questionnaireSurveyCompleted, $surveyCompleted] = AnswerQuestion::run(
            questionnaire_survey_id: $this->questionnaireSurvey->id,
            question_id: $this->question->id,
            choice_id: $choiceId,
            comment: $this->comment,
            skipped: ! $choiceId
        );

        $this->reset('comment');

        if ($surveyCompleted) {
            SurveyCompleted::dispatch($this->survey);
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
    public function render(): View
    {
        $this->survey->loadCount('questionnaireSurveys', 'completedQuestionnaireSurvey');

        $this->questionnaireSurvey->load('questionnaire.choices', 'questions')
            ->loadCount('questions');

        $this->question = $this->getNextQuestion();

        return view('livewire.evaluation.questionnaire');
    }
}

<?php

namespace App\Livewire\Evaluation;

use App\Actions\AnswerQuestion;
use App\Models\Question;
use App\Models\QuestionnaireSurvey;
use App\Models\Survey;
use Error;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

class Questionnaire extends Component
{
    use Toast;

    public Survey $survey;

    public QuestionnaireSurvey $questionnaireSurvey;

    public Question $question;

    public string $comment = '';

    public function mount(Survey $survey, QuestionnaireSurvey $questionnaireSurvey): void
    {
        if (!$questionnaireSurvey->survey->is($survey)) {
            throw new Error('Invalid questionnaire survey');
        }

        $firstNotCompletedQuestionnaireSurvey = $survey->questionnaireSurveys
            ->where('completed', false)
            ->first();

        if ($this->questionnaireSurvey->completed || !$this->questionnaireSurvey->is($firstNotCompletedQuestionnaireSurvey)) {
            $this->redirectRoute('evaluation.home', $survey);
        }

        $this->survey->loadCount('questionnaireSurveys', 'completedQuestionnaireSurvey');

        $this->questionnaireSurvey->load('questionnaire.choices', 'questions')
            ->loadCount('questions');
    }

    // Needed to give a different target to skip question spinner
    public function skipQuestion(): void
    {
        $this->answerQuestion();
    }

    public function answerQuestion(?int $choiceId = null): void
    {
        if ($this->question->is($this->questionnaireSurvey->questions->last())) {
            if ($this->questionnaireSurvey->is($this->survey->questionnaireSurveys->last())) {
                $this->redirectRoute('evaluation.thank-you', [$this->survey], navigate: true);
            } else {
                $this->redirectRoute('evaluation.home', $this->survey, navigate: true);
            }
        }

        if (!$choiceId && !$this->comment) {
            $this->error('Per favore inserisci un <br>commento se vuoi saltare la domanda');
            return;
        }

        usleep(500_000); // 500ms

        (new AnswerQuestion())->handle(
            $this->questionnaireSurvey->id,
            $this->question->id,
            $choiceId,
            $this->comment,
            !$choiceId
        );

        $this->reset('comment');
    }

    #[Layout('layouts.evaluation')]
    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $this->question = $this->questionnaireSurvey->questions->load([
            'answers' => function (HasMany $query) {
                $query->whereRelation('questionnaireSurvey', 'id', $this->questionnaireSurvey->id);
            }
        ])
            ->where(fn(Question $question) => $question->answers->isEmpty())
            ->load('choices')
            ->first();

        return view('livewire.evaluation.questionnaire');
    }
}

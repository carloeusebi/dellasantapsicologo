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

class Questionnaire extends Component
{
    public Survey $survey;

    public QuestionnaireSurvey $questionnaireSurvey;

    public Question $question;

    public function mount(Survey $survey, QuestionnaireSurvey $questionnaireSurvey): void
    {
        if (!$questionnaireSurvey->survey->is($survey)) {
            throw new Error('Invalid questionnaire survey');
        }

        if ($this->questionnaireSurvey->completed) {
            $this->redirectRoute('evaluation.home', $survey);
        }
    }

    public function answerQuestion(int $questionId, int $choiceId): void
    {
        if ($this->question->is($this->questionnaireSurvey->questions->last())) {
            if ($this->questionnaireSurvey->is($this->survey->questionnaireSurveys->last())) {
                $this->redirectRoute('evaluation.thank-you', [$this->survey], navigate: true);
            } else {
                $this->redirectRoute('evaluation.home', $this->survey, navigate: true);
            }
        }

        usleep(500_000); // 500ms

        (new AnswerQuestion())->handle($this->questionnaireSurvey->id, $questionId, $choiceId);
    }

    #[Layout('layouts.evaluation')]
    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $this->survey->loadCount('questionnaireSurveys', 'completedQuestionnaireSurvey');

        $this->questionnaireSurvey->load('questionnaire.choices', 'questions')
            ->loadCount('questions');

        $this->question = $this->questionnaireSurvey->questions->load([
            'answers' => function (HasMany $query) {
                $query->whereRelation('questionnaireSurvey', 'id', $this->questionnaireSurvey->id);
            }
        ])
            ->where(fn(Question $question
            ) => $question->answers->isEmpty())
            ->load('choices')
            ->first();

        return view('livewire.evaluation.questionnaire');
    }
}

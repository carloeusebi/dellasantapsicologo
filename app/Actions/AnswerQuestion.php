<?php

namespace App\Actions;

use App\Models\Answer;
use App\Models\Choice;
use App\Models\Question;
use App\Models\QuestionnaireSurvey;

class AnswerQuestion
{
    public function handle(
        int $questionnaire_survey_id,
        int $question_id,
        int $choice_id = null,
    ): void {

        $question = Question::with('questionnaire.choices')->findOrFail($question_id);

        $choice = Choice::findOrFail($choice_id);

        $value = $question->calculateScore($choice);

        Answer::updateOrCreate(
            [
                'questionnaire_survey_id' => $questionnaire_survey_id,
                'question_id' => $question_id,
            ],
            [
                'choice_id' => $choice_id,
                'skipped' => false,
                'value' => $value
            ]
        );

        QuestionnaireSurvey::find($questionnaire_survey_id)
            ->updateCompletedStatus();
    }
}

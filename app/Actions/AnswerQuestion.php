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
        ?int $choice_id = null,
        ?int $points = null,
    ): void {

        $question = Question::with('questionnaire.choices')->find($question_id);

        $choice = Choice::find($choice_id);

        $value = $choice ? $question->calculateScore($choice) : $points;

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

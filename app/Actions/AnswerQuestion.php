<?php

namespace App\Actions;

use App\Models\Answer;
use App\Models\Choice;
use App\Models\Question;
use App\Models\QuestionnaireSurvey;
use Lorisleiva\Actions\Concerns\AsAction;

final class AnswerQuestion
{
    use AsAction;

    /**
     * @return array{0: bool, 1: bool} [$questionnaireSurveyCompleted, $surveyCompleted]
     */
    public function handle(
        int $questionnaire_survey_id,
        int $question_id,
        ?int $choice_id = null,
        ?string $comment = null,
        bool $skipped = false,
    ): array {

        $question = Question::with('choices', 'questionnaire.choices')->findOrFail($question_id);

        $choice = Choice::find($choice_id);

        Answer::updateOrCreate(
            [
                'questionnaire_survey_id' => $questionnaire_survey_id,
                'question_id' => $question_id,
            ],
            [
                'choice_id' => $choice_id,
                'comment' => $comment,
                'skipped' => $skipped,
                'value' => CalculateScore::run($question, $choice),
            ]
        );

        return QuestionnaireSurvey::find($questionnaire_survey_id)->updateCompletedStatus();
    }
}

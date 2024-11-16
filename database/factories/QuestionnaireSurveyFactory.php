<?php

namespace Database\Factories;

use App\Models\Questionnaire;
use App\Models\QuestionnaireSurvey;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class QuestionnaireSurveyFactory extends Factory
{
    protected $model = QuestionnaireSurvey::class;

    public function definition(): array
    {
        return [
            'completed' => false,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'survey_id' => Survey::factory(),
            'questionnaire_id' => Questionnaire::factory(),
        ];
    }

    public function completed(): QuestionnaireSurveyFactory
    {
        return $this->state(fn (array $attributes) => ['completed' => true]);
    }
}

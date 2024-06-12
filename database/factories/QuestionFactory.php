<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Questionnaire;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition(): array
    {
        return [
            'text' => fake()->words(3, true),
            'reversed' => fake()->boolean(),
            'order' => fake()->numberBetween(0, 255),

            'questionnaire_id' => Questionnaire::factory(),
        ];
    }
}

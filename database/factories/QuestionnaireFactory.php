<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class QuestionnaireFactory extends Factory
{
    protected $model = Questionnaire::class;

    public function definition(): array
    {
        return [
            'description' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'title' => $this->faker->word(),
            'visible' => $this->faker->boolean(),

            'user_id' => User::factory(),
        ];
    }

    public function configure(): QuestionnaireFactory
    {
        return $this->afterCreating(function (Questionnaire $questionnaire) {
            Question::factory()->recycle($questionnaire)->count(2)->create();
        });
    }
}

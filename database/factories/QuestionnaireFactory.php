<?php

namespace Database\Factories;

use App\Models\Choice;
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
            'title' => $this->faker->words(3, true),
            'visible' => false,

            'user_id' => User::factory(),
        ];
    }

    public function visible(): QuestionnaireFactory
    {
        return $this->state(fn (array $attributes) => ['visible' => true]);
    }

    public function notVisible(): QuestionnaireFactory
    {
        return $this->state(fn (array $attributes) => ['visible' => false]);
    }

    public function configure(): QuestionnaireFactory
    {
        return $this->afterCreating(function (Questionnaire $questionnaire) {
            Question::factory()->recycle($questionnaire)->count(2)->create();
            Choice::factory()->recycle($questionnaire)->count(2)->create();
        });
    }
}

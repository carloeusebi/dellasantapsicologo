<?php

namespace Database\Factories;

use App\Models\Choice;
use App\Models\Questionnaire;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChoiceFactory extends Factory
{
    protected $model = Choice::class;

    public function definition(): array
    {
        $questionable = $this->questionable();

        return [
            'questionable_id' => Questionnaire::factory(),
            'questionable_type' => Questionnaire::class,
            'points' => $this->faker->randomNumber(),
            'text' => $this->faker->text(),
        ];
    }

    public function questionable()
    {
        return $this->faker->randomElement([
            'App\Models\Question',
            'App\Models\Questionnaire',
        ]);
    }
}

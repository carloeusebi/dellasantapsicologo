<?php

namespace Database\Factories;

use App\Models\Questionnaire;
use App\Models\Variable;
use Illuminate\Database\Eloquent\Factories\Factory;

class VariableFactory extends Factory
{
    protected $model = Variable::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'gender_based' => false,

            'questionnaire_id' => Questionnaire::factory(),
        ];
    }

    public function genderBased(): VariableFactory
    {
        return $this->state(fn(array $attributes) => [$attributes['gender_based'] => false]);
    }
}

<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\Survey;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SurveyFactory extends Factory
{
    protected $model = Survey::class;

    public function definition(): array
    {
        return [
            'completed' => false,
            'title' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'patient_id' => Patient::factory(),
        ];
    }

    public function completed(): SurveyFactory
    {
        return $this->state(fn(array $attributes) => ['completed' => true]);
    }
}

<?php

namespace Database\Factories;

use App\Models\Cutoff;
use App\Models\Variable;
use Illuminate\Database\Eloquent\Factories\Factory;

class CutoffFactory extends Factory
{
    protected $model = Cutoff::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'from' => $this->faker->numberBetween(1, 30),
            'to' => $this->faker->numberBetween(1, 30),
            'type' => fake()->randomElement(['greater_than', 'lesser_than', 'range']),
            'fem_from' => $this->faker->numberBetween(1, 30),
            'fem_to' => $this->faker->numberBetween(1, 30),

            'variable_id' => Variable::factory(),
        ];
    }
}

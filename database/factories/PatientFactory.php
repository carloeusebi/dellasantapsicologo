<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PatientFactory extends Factory
{
    protected $model = Patient::class;

    public function definition(): array
    {
        $gender = fake()->randomElement(['Maschio', 'Femmina']);

        return [
            'address' => fake('it_IT')->address(),
            'codice_fiscale' => fake('it_IT')->regexify('[A-Z]{6}[0-9]{2}[A-EHLMPR-T][0-9]{2}[A-Z][0-9]{3}[A-Z]'),
            'email' => fake('it_IT')->unique()->safeEmail(),
            'phone' => fake('it_IT')->phoneNumber(),
            'weight' => fake('it_IT')->numberBetween(10, 255),
            'height' => fake('it_IT')->numberBetween(10, 255),
            'qualification' => fake('it_IT')->word(),
            'job' => fake('it_IT')->word(),
            'cohabitants' => fake('it_IT')->word(),
            'drugs' => fake('it_IT')->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'first_name' => fake('it_IT')->firstName($gender === 'Maschio' ? 'male' : 'female'),
            'last_name' => fake('it_IT')->lastName(),
            'gender' => $gender,
            'birth_date' => fake()->dateTimeBetween('-50 years', '-20 years'),
            'birth_place' => fake('it_IT')->word(),
            'therapy_start_date' => fake()->dateTimeBetween('-10 months'),

            'user_id' => User::factory(),
        ];
    }

    public function archived(): static
    {
        return $this->state(fn(array $attributes) => [
            'archived_at' => now(),
        ]);
    }
}

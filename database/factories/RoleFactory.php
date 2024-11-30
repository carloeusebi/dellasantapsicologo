<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'label' => $this->faker->word(),
        ];
    }

    public function admin(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => Role::ADMIN,
                'label' => 'Admin',
            ];
        });
    }

    public function doctor(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => Role::DOCTOR,
                'label' => 'Dottore',
            ];
        });
    }

    public function superuser(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => Role::SUPERUSER,
                'label' => 'Superuser',
            ];
        });
    }

    public function patient(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => Role::PATIENT,
                'label' => 'Paziente',
            ];
        });
    }
}

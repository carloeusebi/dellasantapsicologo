<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'admin@example.com',
        ])->role()->associate(Role::firstWhere('name', Role::$ADMIN))->save();

        User::factory(10)
            ->hasPatients(20)
            ->has(Patient::factory()->count(3)->archived(), 'patients')
            ->create();

        $this->call([
            TagSeeder::class, QuestionnaireSeeder::class, QuestionSeeder::class, ChoiceSeeder::class,
            VariableSeeder::class, CutoffSeeder::class
        ]);
    }
}

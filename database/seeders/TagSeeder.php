<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            ['name' => 'Bambini', 'color' => '#08b6d9'],
            ['name' => 'Ansia', 'color' => '#ff00ff'],
            ['name' => 'Rabbia', 'color' => '#ff0000'],
            ['name' => 'Adulti', 'color' => '#1d00fa'],
            ['name' => 'DCA', 'color' => '#e53edf'],
            ['name' => 'Rimuginio/Ruminazione', 'color' => '#7d8b18'],
            ['name' => 'Perfezionismo', 'color' => '#14eb4a'],
            ['name' => 'Depressione', 'color' => '#927c7c'],
            ['name' => 'DOC', 'color' => '#d73737'],
            ['name' => 'Attaccamento', 'color' => '#f46d25'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}

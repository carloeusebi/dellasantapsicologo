<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            ['tag' => 'Bambini', 'color' => '#08b6d9'],
            ['tag' => 'Ansia', 'color' => '#ff00ff'],
            ['tag' => 'Rabbia', 'color' => '#ff0000'],
            ['tag' => 'Adulti', 'color' => '#1d00fa'],
            ['tag' => 'DCA', 'color' => '#e53edf'],
            ['tag' => 'Rimuginio/Ruminazione', 'color' => '#7d8b18'],
            ['tag' => 'Perfezionismo', 'color' => '#14eb4a'],
            ['tag' => 'Depressione', 'color' => '#927c7c'],
            ['tag' => 'DOC', 'color' => '#d73737'],
            ['tag' => 'Attaccamento', 'color' => '#f46d25'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}

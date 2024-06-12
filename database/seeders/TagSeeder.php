<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = array(
            array('tag' => 'Bambini', 'color' => '#08b6d9'),
            array('tag' => 'Ansia', 'color' => '#ff00ff'),
            array('tag' => 'Rabbia', 'color' => '#ff0000'),
            array('tag' => 'Adulti', 'color' => '#1d00fa'),
            array('tag' => 'DCA', 'color' => '#e53edf'),
            array('tag' => 'Rimuginio/Ruminazione', 'color' => '#7d8b18'),
            array('tag' => 'Perfezionismo', 'color' => '#14eb4a'),
            array('tag' => 'Depressione', 'color' => '#927c7c'),
            array('tag' => 'DOC', 'color' => '#d73737'),
            array('tag' => 'Attaccamento', 'color' => '#f46d25')
        );

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // Database/seeders/TagSeeder.php
public function run()
    {
        \App\Models\Tag::create(['name' => 'Vegan', 'slug' => 'vegan']);
        \App\Models\Tag::create(['name' => 'Protein', 'slug' => 'protein']);
        \App\Models\Tag::create(['name' => 'Bodybuilding', 'slug' => 'bodybuilding']);
        \App\Models\Tag::create(['name' => 'Diet', 'slug' => 'diet']);
    }
}

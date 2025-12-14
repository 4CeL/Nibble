<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class TestimonialSeeder extends Seeder
{
    public function run()
    {
        $testimonials = [
            [
                'text' => 'Website nibble ini sangat membantu saya dalam mengatur jadwal makanan saya. Tampilan dari website ini juga sangat menarik',
                'name' => 'Hendy Tandiono',
                'year' => '2025'
            ],
            [
                'text' => 'Resepnya sangat mudah diikuti dan rasanya luar biasa! Dapur saya jadi lebih hidup berkat Nibble.',
                'name' => 'Sarah Wijaya',
                'year' => '2024'
            ],
            [
                'text' => 'Aplikasi terbaik untuk mencari inspirasi memasak harian. Tampilan webnya juga sangat estetik!',
                'name' => 'Budi Santoso',
                'year' => '2025'
            ],
        ];

        DB::table('testimonials')->insert($testimonials);
    }
}
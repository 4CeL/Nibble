<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('recipes')->truncate();

        Schema::enableForeignKeyConstraints();

        $recipes = [
            // --- KATEGORI VEGAN ---
            [
                'title' => 'Guacamole', 
                'image' => 'food-4.png', 
                'desc' => 'Sajian alpukat segar khas Meksiko.',
                'type' => 'vegan',
                'ingredients' => '2 buah Alpukat,1 buah Jeruk Nipis,Garam secukupnya,Bawang Merah,Daun Ketumbar',
                'instructions' => 'Hancurkan alpukat, campur dengan perasan jeruk nipis, garam, dan potongan bawang. |Sajikan segera.'
            ],
            [
                'title' => 'Thai Basil Toast', 
                'image' => 'thai.png', 
                'desc' => 'Roti panggang dengan topping kemangi Thailand.',
                'type' => 'vegan',
                'ingredients' => '2 lembar Roti,Segenggam Daun Kemangi,Minyak Zaitun,Bawang Putih',
                'instructions' => 'Panggang roti. |Tumis sebentar daun kemangi dengan bawang putih dan minyak zaitun. |Taruh di atas roti.'
            ],
            [
                'title' => 'Loaded Crisps', 
                'image' => 'food-5.png', 
                'desc' => 'Keripik kentang dengan topping melimpah.',
                'type' => 'vegan',
                'ingredients' => 'Keripik Kentang,Salsa Tomat,Kacang Merah,Jagung Manis',
                'instructions' => 'Susun keripik di piring. |Taburi dengan salsa, kacang merah, dan jagung. |Siap dinikmati.'
            ],

            // --- KATEGORI PROTEIN ---
            [
                'title' => 'Stir Fried Beef Pasta', 
                'image' => 'food-2.png', 
                'desc' => 'Pasta tumis daging sapi yang gurih.',
                'type' => 'protein',
                'ingredients' => '200g Pasta Fusilli,100g Daging Sapi Cincang,Saus Tomat,Bawang Bombay,Paprika',
                'instructions' => 'Rebus pasta hingga al dente. |Tumis daging sapi dengan bawang dan paprika hingga matang. |Masukkan saus tomat dan pasta, aduk rata.'
            ],
            [
                'title' => 'Eggvocado Break', 
                'image' => 'eggvocado.png', 
                'desc' => 'Sarapan sehat perpaduan telur rebus dan alpukat segar di atas roti panggang.',
                'type' => 'protein',
                'ingredients' => '2 butir Telur Rebus,1 buah Alpukat Matang,2 lembar Roti Gandum,Lada Hitam secukupnya,Garam secukupnya,Minyak Zaitun',
                'instructions' => 'Pertama, panggang roti gandum hingga kecokelatan. |Sambil menunggu, potong alpukat tipis-tipis atau hancurkan kasar sesuai selera. |Susun alpukat di atas roti, lalu tambahkan irisan telur rebus di atasnya. |Taburi dengan garam, lada hitam, dan sedikit minyak zaitun untuk rasa yang lebih kaya. |Sajikan selagi hangat untuk memulai hari Anda dengan energi penuh.'
            ],
            [
                'title' => 'Salmon Salad', 
                'image' => 'food-3.png', 
                'desc' => 'Salad segar dengan potongan ikan salmon panggang kaya omega-3.',
                'type' => 'protein',
                'ingredients' => '200g Filet Salmon,Sayur Selada Segar,Tomat Ceri,Timun Jepang,Dressing Lemon,Minyak Wijen',
                'instructions' => 'Panggang salmon dengan sedikit minyak zaitun hingga matang sempurna. |Siapkan mangkuk besar, campurkan selada, tomat ceri, dan timun. Letakkan salmon di atas sayuran, lalu siram dengan dressing lemon dan minyak wijen. |Makanan sehat ini siap disantap dalam waktu kurang dari 15 menit.'
            ],
        ];

        DB::table('recipes')->insert($recipes);
    }
}
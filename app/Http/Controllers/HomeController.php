<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial; 
use App\Models\Recipe;

class HomeController extends Controller
{
    public function index()
    {
        // 1. DATA RESEP (KEMBALI KE MANUAL / ARRAY)
        $recipes = [
            [
                'title' => 'Beef Steak', 
                'image' => 'food-1.png', // Pastikan nama file sesuai yang ada di public/img
                'desc' => 'Daging sapi pilihan dengan bumbu rahasia.'
            ],
            [
                'title' => 'Stir Fried Beef Pasta', 
                'image' => 'food-2.png', 
                'desc' => 'Pasta tumis daging sapi yang gurih.'
            ],
            [
                'title' => 'Salmon Salad', 
                'image' => 'food-3.png', 
                'desc' => 'Salad salmon segar penuh nutrisi.'
            ],
            [
                'title' => 'Guacamole', 
                'image' => 'food-4.png', 
                'desc' => 'Sajian alpukat segar khas Meksiko.'
            ],
            [
                'title' => 'Loaded Crisps', 
                'image' => 'food-5.png', 
                'desc' => 'Keripik kentang dengan topping melimpah.'
            ],
        ];

        // 2. DATA TESTIMONI (TETAP PAKAI DATABASE)
        $testimonials = Testimonial::all(); 

        // Kirim keduanya ke View
        return view('home', compact('recipes', 'testimonials'));
    }
}
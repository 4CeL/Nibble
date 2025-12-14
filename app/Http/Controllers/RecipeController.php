<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        // Ambil data Vegan
        $vegans = Recipe::where('type', 'vegan')->take(3)->get();
        
        // Ambil data Protein
        $proteins = Recipe::where('type', 'protein')->take(3)->get();

        return view('recipes', compact('vegans', 'proteins'));
    }

    public function show($id)
    {
        // Cari resep berdasarkan ID
        $recipe = Recipe::findOrFail($id);

        return view('recipe-details', compact('recipe'));
    }
}
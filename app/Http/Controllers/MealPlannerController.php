<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\MealPlan;
use Illuminate\Support\Facades\Auth;

class MealPlannerController extends Controller
{
    public function index()
    {
        // 1. Ambil semua resep untuk ditampilkan di Popup Modal
        $allRecipes = Recipe::all();

        // 2. Ambil Meal Plan milik user yang sedang login
        $userPlans = MealPlan::where('user_id', Auth::id())
                    ->with('recipe') // Eager load resep biar ringan
                    ->get()
                    ->groupBy('day')
                    ->map(function ($items) {
                        return $items->keyBy('meal_type');
                    });

        return view('meal-planner', compact('allRecipes', 'userPlans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'recipe_id' => 'required|exists:recipes,id',
            'day' => 'required',
            'meal_type' => 'required',
        ]);

        // Simpan atau Update
        MealPlan::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'day' => $request->day,
                'meal_type' => $request->meal_type,
            ],
            [
                'recipe_id' => $request->recipe_id
            ]
        );

        return redirect()->back()->with('success', 'Menu updated!');
    }
    
    // Fitur Reset
    public function destroy(Request $request)
    {
        MealPlan::where('user_id', Auth::id())
            ->where('day', $request->day)
            ->where('meal_type', $request->meal_type)
            ->delete();
            
        return redirect()->back();
    }
}
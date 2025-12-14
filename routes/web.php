<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MealPlannerController;

/*1. PUBLIC ROUTES (Bisa diakses tanpa login)*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

/* 2. GUEST ROUTES (Hanya untuk yang BELUM Login)*/
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
    
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');

    Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
});


/* 3. AUTH ROUTES */
Route::middleware('auth')->group(function () {
    
    // --- User Management ---
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');

    // --- Meal Planner ---
    Route::get('/meal-planner', [MealPlannerController::class, 'index'])->name('meal-planner');
    Route::post('/meal-planner', [MealPlannerController::class, 'store'])->name('meal-planner.store');
    Route::delete('/meal-planner', [MealPlannerController::class, 'destroy'])->name('meal-planner.destroy');

    Route::get('/recipes', [RecipeController::class, 'index'])->name('recipe'); 
    Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');

    Route::get('/forum', [App\Http\Controllers\ForumController::class, 'index'])->name('forum.index');
    Route::post('/forum/store', [App\Http\Controllers\ForumController::class, 'store'])->name('forum.store');
    Route::post('/forum/{id}/like', [App\Http\Controllers\ForumController::class, 'like'])->name('forum.like');
    Route::post('/forum/{id}/comment', [App\Http\Controllers\ForumController::class, 'comment'])->name('forum.comment');

});


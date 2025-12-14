<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('meal_plans', function (Blueprint $table) {
            $table->id();
            
            // 1. Siapa yang merencanakan? (User)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // 2. Resep apa yang dipilih? (Recipe)
            $table->foreignId('recipe_id')->constrained()->onDelete('cascade');
            
            // 3. Untuk hari apa? (Sunday - Saturday)
            $table->enum('day', [
                'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'
            ]);
            
            // 4. Untuk jam makan apa? (Breakfast/Lunch/Dinner)
            $table->enum('meal_type', ['breakfast', 'lunch', 'dinner']);
            
            $table->timestamps();

            $table->unique(['user_id', 'day', 'meal_type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('meal_plans');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Tabel Tags (Kategori: Vegan, Protein, dll)
    Schema::create('tags', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('slug')->unique(); 
        $table->timestamps();
    });

    // 2. Tabel Forum Posts
    Schema::create('forum_posts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->text('content');
        $table->timestamps();
    });

    // 3. Tabel Pivot (Post_Tag) - Many to Many
    Schema::create('forum_post_tag', function (Blueprint $table) {
        $table->id();
        $table->foreignId('forum_post_id')->constrained()->onDelete('cascade');
        $table->foreignId('tag_id')->constrained()->onDelete('cascade');
    });

    // 4. Tabel Likes (User Like Post)
    Schema::create('forum_post_likes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('forum_post_id')->constrained()->onDelete('cascade');
        $table->unique(['user_id', 'forum_post_id']); 
    });

    // 5. Tabel Comments
    Schema::create('comments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('forum_post_id')->constrained()->onDelete('cascade');
        $table->text('body');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum_posts');
    }
};

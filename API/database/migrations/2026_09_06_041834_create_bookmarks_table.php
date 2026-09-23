<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->morphs('bookmarkable'); // Creates bookmarkable_id and bookmarkable_type
            $table->timestamps();
            
            // Ensure a user can only bookmark a specific item once
            $table->unique(['user_id', 'bookmarkable_id', 'bookmarkable_type'], 'user_bookmark_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookmarks');
    }
};

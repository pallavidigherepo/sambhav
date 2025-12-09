<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Livewire\on;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Menu label
            $table->string('slug')->nullable(); // For routing
            $table->string('url')->nullable(); // External or internal link
            $table->foreignId('parent_id')->nullable()->constrained('menus')->onDelete('cascade'); // Dropdown parent
            $table->unsignedInteger('order')->default(0); // Ordering in menu
            $table->string('icon')->nullable();
            $table->enum('type', ['custom', 'activity', 'competition'])->default('custom'); // link type
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};

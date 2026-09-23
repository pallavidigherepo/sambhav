<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->string('scope')->default('regional')->after('location')->comment('regional, national, international');
            $table->integer('grade_min')->nullable()->after('eligibility_criteria');
            $table->integer('grade_max')->nullable()->after('grade_min');
            $table->string('apply_url')->nullable()->after('registration_deadline');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->string('scope')->default('regional')->after('location')->comment('regional, national, international');
            $table->integer('grade_min')->nullable()->after('description');
            $table->integer('grade_max')->nullable()->after('grade_min');
            $table->string('apply_url')->nullable()->after('end_time');
        });
    }

    public function down(): void
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->dropColumn(['scope', 'grade_min', 'grade_max', 'apply_url']);
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['scope', 'grade_min', 'grade_max', 'apply_url']);
        });
    }
};

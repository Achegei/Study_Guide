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
        Schema::table('free_quizzes', function (Blueprint $table) {
            $table->string('type')->after('question')->nullable(); // Add the 'type' column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('free_quizzes', function (Blueprint $table) {
            $table->dropColumn('type'); // Drop the 'type' column if rolling back
        });
    }
};

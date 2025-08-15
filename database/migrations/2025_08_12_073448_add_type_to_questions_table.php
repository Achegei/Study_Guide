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
        // Check if the 'type' column already exists before adding it
        if (!Schema::hasColumn('questions', 'type')) {
            Schema::table('questions', function (Blueprint $table) {
                // Add the 'type' column as a string, after 'question' for logical grouping
                $table->string('type')->after('question');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Check if the 'type' column exists before dropping it
        if (Schema::hasColumn('questions', 'type')) {
            Schema::table('questions', function (Blueprint $table) {
                $table->dropColumn('type');
            });
        }
    }
};

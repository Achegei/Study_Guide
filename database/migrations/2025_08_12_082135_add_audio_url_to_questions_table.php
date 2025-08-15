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
        // Check if the column already exists to prevent errors on re-running
        if (!Schema::hasColumn('questions', 'audio_url')) {
            Schema::table('questions', function (Blueprint $table) {
                // Add the audio_url column as a string, allowing it to be null
                $table->string('audio_url')->nullable()->after('correct_answer');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the column if it exists when rolling back the migration
        if (Schema::hasColumn('questions', 'audio_url')) {
            Schema::table('questions', function (Blueprint $table) {
                $table->dropColumn('audio_url');
            });
        }
    }
};

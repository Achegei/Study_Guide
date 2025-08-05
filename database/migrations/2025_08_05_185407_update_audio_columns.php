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
        Schema::table('questions', function (Blueprint $table) {
            if (Schema::hasColumn('questions', 'audio_url')) {
                $table->dropColumn('audio_url');
            }
        });
        Schema::table('course_sections', function (Blueprint $table) {
            // Add summary_audio_url to course_sections table
            $table->string('summary_audio_url')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->string('audio_url')->nullable();
        });
        Schema::table('course_sections', function (Blueprint $table) {
            // Remove summary_audio_url from course_sections table if rolling back
            $table->dropColumn('summary_audio_url');
        });
    }
};

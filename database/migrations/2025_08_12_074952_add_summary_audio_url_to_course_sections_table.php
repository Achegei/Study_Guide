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
        if (!Schema::hasColumn('course_sections', 'summary_audio_url')) {
            Schema::table('course_sections', function (Blueprint $table) {
                $table->string('summary_audio_url')->nullable()->after('description');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('course_sections', 'summary_audio_url')) {
            Schema::table('course_sections', function (Blueprint $table) {
                $table->dropColumn('summary_audio_url');
            });
        }
    }
};

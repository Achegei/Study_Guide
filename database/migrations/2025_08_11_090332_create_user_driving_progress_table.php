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
        Schema::create('user_driving_progress', function (Blueprint $table) {
            $table->id();
            // Foreign key to the users table
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Foreign key to the driving_sections table (your new driving regions)
            // This is the crucial change from 'course_section_id'
            $table->foreignId('driving_section_id')->constrained('driving_sections')->onDelete('cascade');
            // The ID of the last question the user successfully answered within a driving section
            $table->unsignedBigInteger('last_question_id')->nullable();
            $table->timestamps();

            // This ensures a user can only have one progress record per driving section
            $table->unique(['user_id', 'driving_section_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_driving_progress');
    }
};

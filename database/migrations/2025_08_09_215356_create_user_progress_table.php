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
        Schema::create('user_progress', function (Blueprint $table) {
            $table->id();
            // Foreign key to the users table
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Foreign key to the course_sections table (your regions)
            $table->foreignId('course_section_id')->constrained()->onDelete('cascade');
            // The ID of the last question the user successfully answered
            $table->unsignedBigInteger('last_question_id')->nullable();
            $table->timestamps();

            // This ensures a user can only have one progress record per region
            $table->unique(['user_id', 'course_section_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_progress');
    }
};


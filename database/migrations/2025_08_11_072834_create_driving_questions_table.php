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
        Schema::create('driving_questions', function (Blueprint $table) {
            $table->id();
            // This is the crucial foreign key that links to your driving_sections table
            $table->foreignId('driving_section_id')->constrained('driving_sections')->onDelete('cascade');
            $table->text('question');
            $table->json('choices'); // Stores choices as a JSON array (e.g., ['Choice A', 'Choice B'])
            $table->string('correct_answer'); // Stores the correct answer text
            $table->string('audio_url')->nullable(); // optional audio file
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driving_questions');
    }
};

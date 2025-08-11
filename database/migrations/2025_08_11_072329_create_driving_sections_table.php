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
        Schema::create('driving_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., "Road Signs", "Rules of the Road"
            $table->string('type')->nullable(); // e.g., "theory", "practical"
            $table->string('capital')->nullable(); // If you want to keep a "capital" equivalent
            $table->string('flag')->nullable(); //
            $table->string('flag_path')->nullable(); //Path to an image for the section icon/flag
            $table->text('description')->nullable();
            $table->string('summary_audio_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driving_sections');
    }
};

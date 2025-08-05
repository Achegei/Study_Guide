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
        Schema::create('course_sections', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('type'); // 'province', 'territory', or 'national'
                $table->string('capital')->nullable(); // e.g., Toronto
                $table->string('flag_path')->nullable(); // e.g., flags/ontario.png
                $table->text('description')->nullable();
                $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_sections');
    }
};

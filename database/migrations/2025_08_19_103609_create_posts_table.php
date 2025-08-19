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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('title'); // Column for the post title
            $table->string('slug')->unique(); // Unique slug for SEO-friendly URLs
            $table->longText('content')->nullable(); // Content of the post, nullable if not always required
            $table->string('status')->default('DRAFT'); // E.g., 'PUBLISHED', 'DRAFT'. Default to 'DRAFT'.
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns automatically
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts'); // Drop the 'posts' table if rolling back
    }
};

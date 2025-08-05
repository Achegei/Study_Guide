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
            Schema::table('course_sections', function (Blueprint $table) {
                // Add the 'flag' column as a string, nullable if flags are optional
                $table->string('flag')->nullable()->after('capital'); // Adjust 'after' as needed
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::table('course_sections', function (Blueprint $table) {
                // Drop the 'flag' column if the migration is rolled back
                $table->dropColumn('flag');
            });
        }
    };
    
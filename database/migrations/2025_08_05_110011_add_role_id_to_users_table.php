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
            Schema::table('users', function (Blueprint $table) {
                // Add the role_id column
                // It's unsignedBigInteger to match typical foreign key types
                // default(1) means new users without a specified role will be role 1 (e.g., 'regular user')
                $table->unsignedBigInteger('role_id')->default(1)->after('password'); // Adjust 'after' as needed
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::table('users', function (Blueprint $table) {
                // Drop the role_id column if the migration is rolled back
                $table->dropColumn('role_id');
            });
        }
    };
    
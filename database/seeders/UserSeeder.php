<?php

    namespace Database\Seeders;

    use App\Models\User; // Make sure to import your User model
    use Illuminate\Database\Seeder;

    class UserSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            // Create an admin user with role_id = 2 for testing
            User::firstOrCreate(
                ['email' => 'admin@example.com'], // Check if email already exists
                [
                    'name' => 'Admin User',
                    'password' => bcrypt('password'), // Use a strong password in production
                    'role_id' => 2, // Important for testing protected routes
                    'email_verified_at' => now(), // Mark as verified for immediate use
                ]
            );

            // Create a regular user with role_id = 1 for testing
            User::firstOrCreate(
                ['email' => 'user@example.com'], // Check if email already exists
                [
                    'name' => 'Regular User',
                    'password' => bcrypt('password'),
                    'role_id' => 1, // Example: a regular user
                    'email_verified_at' => now(),
                ]
            );
        }
    }
    
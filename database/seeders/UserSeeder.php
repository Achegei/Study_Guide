<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // For hashing passwords

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin user with role_id = 1 and user_type 'both' for full access
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'role_id' => 1, // Admin role (as per your clarification)
                'email_verified_at' => now(),
                'user_type' => 'both', // Admin has access to both course types
            ]
        );

        // Create a regular user with role_id = 2 and user_type 'both' (can access both course types)
        User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Regular User',
                'password' => Hash::make('password'),
                'role_id' => 2, // Regular user role (as per your clarification)
                'email_verified_at' => now(),
                'user_type' => 'both',
            ]
        );

        // Create a user specifically for Citizenship Test access (regular role)
        User::firstOrCreate(
            ['email' => 'citizenship@example.com'],
            [
                'name' => 'Citizenship User',
                'password' => Hash::make('password'),
                'role_id' => 2, // Regular user role (as per your clarification)
                'email_verified_at' => now(),
                'user_type' => 'citizenship', // User type for Citizenship Test access
            ]
        );

        // Create a user specifically for Driving Test access (regular role)
        User::firstOrCreate(
            ['email' => 'driving@example.com'],
            [
                'name' => 'Driving User',
                'password' => Hash::make('password'),
                'role_id' => 2, // Regular user role (as per your clarification)
                'email_verified_at' => now(),
                'user_type' => 'driving', // User type for Driving Test access
            ]
        );

        // Create a user for both tests (if applicable and desired, distinct from admin/regular)
        User::firstOrCreate(
            ['email' => 'both@example.com'],
            [
                'name' => 'Both Tests User',
                'password' => Hash::make('password'),
                'role_id' => 2, // Regular user role (as per your clarification)
                'email_verified_at' => now(),
                'user_type' => 'both', // User type for both tests
            ]
        );

        // If you use factories to create other users, ensure they also get a 'user_type'
        // User::factory(10)->create();
    }
}

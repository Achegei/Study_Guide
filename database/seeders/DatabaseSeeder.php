<?php

namespace Database\Seeders;

use App\Models\User; // Make sure to import the User model if you use it below
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ✅ Only call other Seeder classes here
        $this->call([
            // Your existing seeders (e.g., for Canadian Citizenship)
            CourseSectionsTableSeeder::class,
            QuestionSeeder::class,
            UserSeeder::class, // This will now correctly create your users
            FreeQuizSeeder::class,

            // --- Introduced: Driving Course Seeders ---
            DrivingSectionsTableSeeder::class, // <-- New Seeder for Driving Sections
            DrivingQuestionsTableSeeder::class, // <-- New Seeder for Driving Questions
            // -----------------------------------------
        ]);

        // If you were using factories for users, you can keep them here.
        // \App\Models\User::factory(10)->create(); // Example of user factory if used

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

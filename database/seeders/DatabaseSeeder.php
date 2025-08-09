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
                CourseSectionsTableSeeder::class,
                QuestionSeeder::class,
                UserSeeder::class, // This will now correctly create your users
                FreeQuizSeeder::class,
            ]);
        }
    }
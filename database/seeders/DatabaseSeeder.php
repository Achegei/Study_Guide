<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Your existing seeders (e.g., for Canadian Citizenship)
            //CourseSectionsTableSeeder::class,
            QuestionSeeder::class, // <-- IMPORTANT: Comment this line out!
                                    // We are relying on specific province seeders for questions.
            UserSeeder::class,
            FreeQuizSeeder::class,

            // --- Driving Course Seeders ---
            DrivingSectionsTableSeeder::class,
            DrivingQuestionsTableSeeder::class,
            OntarioDrivingQuestionsTableSeeder::class,
            NovaScotiaDrivingQuestionsTableSeeder::class,
            BritishColumbiaDrivingQuestionsTableSeeder::class,
            NewfoundlandandLabradorDrivingQuestionsTableSeeder::class,
            NewbrunswickDrivingQuestionsTableSeeder::class,
            PrinceEdwardsIslandDrivingQuestionsTableSeeder::class,
            QuebecDrivingQuestionsTableSeeder::class,
            SaskatchewanDrivingQuestionsTableSeeder::class,
            ManitobaDrivingQuestionsTableSeeder::class,
            AlbertaDrivingQuestionsTableSeeder::class,
            // -----------------------------------------

            AlbertaQuestionsSeeder::class, // <-- Ensure this is present and uncommented!
            NewBrunswickQuestionsSeeder::class,
            PrinceEdwardIslandQuestionsSeeder::class,
            CanadaQuestionsSeeder::class,
            NunavutQuestionsSeeder::class,
            NewfoundlandandLabradorQuestionsSeeder::class,
            ManitobaQuestionsSeeder::class,
            NorthwestTerritoriesQuestionsSeeder::class,
            NovaScotiaQuestionsSeeder::class,
            QuebecQuestionsSeeder::class,
            YukonQuestionsSeeder::class,
            BritishColumbiaQuestionsSeeder::class,
            OntarioQuestionsSeeder::class,
            SaskatchewanQuestionsSeeder::class,
        ]);
    }
}

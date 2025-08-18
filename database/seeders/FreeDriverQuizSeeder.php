<?php

namespace Database\Seeders;

use App\Models\FreeQuiz;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\FreeQuizOption;

class FreeDriverQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // IMPORTANT:
        // The truncate() calls are REMOVED from this individual seeder.
        // This allows both Free Citizenship and Free Driving quizzes to coexist
        // in the 'free_quizzes' table.
        //
        // If you need to clear the entire 'free_quizzes' table before seeding,
        // it's best practice to do it ONCE in your main DatabaseSeeder.php,
        // or by running `php artisan migrate:fresh --seed`.

        // Example of how you might handle truncation in DatabaseSeeder.php:
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // FreeQuiz::truncate();
        // FreeQuizOption::truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Define the 5 general driving questions and their options.
        $drivingQuestions = [
            [
                'question' => 'When merging onto a highway, you should:',
                'options' => [
                    'Match the speed of traffic and merge safely',
                    'Stop at the end of the ramp',
                    'Merge at a slow speed',
                    'Use hazard lights to warn other drivers',
                ],
                'correct_answer' => 'Match the speed of traffic and merge safely',
                'type' => 'driving_general', // ✅ Assign a specific type for general driving questions
            ],
            [
                'question' => 'A yellow line separates traffic moving in the same direction.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'False', // Yellow lines separate traffic moving in opposite directions.
                'type' => 'driving_general',
            ],
            [
                'question' => 'Which of these actions could cause an immediate road test failure?',
                'options' => [
                    'Driving at the speed limit',
                    'Failing to yield to a pedestrian',
                    'Using turn signals',
                    'Checking mirrors',
                ],
                'correct_answer' => 'Failing to yield to a pedestrian',
                'type' => 'driving_general',
            ],
            [
                'question' => 'When approaching a stopped school bus with its upper red lights flashing, you must:',
                'options' => [
                    'Slow down and pass with caution',
                    'Stop at least 20 metres away',
                    'Stop at least 10 metres away',
                    'Honk to alert the driver',
                ],
                'correct_answer' => 'Stop at least 20 metres away',
                'type' => 'driving_general',
            ],
            [
                'question' => 'What should you do if your brakes fail?',
                'options' => [
                    'Shift to a lower gear and use the parking brake',
                    'Turn off the ignition immediately',
                    'Jump out of the vehicle',
                    'Honk continuously',
                ],
                'correct_answer' => 'Shift to a lower gear and use the parking brake',
                'type' => 'driving_general',
            ],
        ];

        // Define the 5 road sign questions.
        $roadSignQuestions = [
            [
                'question' => 'What does this road sign indicate? <img src="/images/signs/free/1.jpeg" alt="Road Sign 1" class="w-24 h-24 mx-auto my-2">',
                'options' => [
                    'Yield right of way to oncoming traffic (worksite, one lane, no flag person)',
                    'Road closed ahead',
                    'Hazardous intersection',
                    'Traffic light ahead',
                ],
                'correct_answer' => 'Yield right of way to oncoming traffic (worksite, one lane, no flag person)',
                'type' => 'driving_road_sign', // ✅ Assign a specific type for road sign questions
            ],
            [
                'question' => 'What does this road sign indicate? <img src="/images/signs/free/2.jpeg" alt="Road Sign 2" class="w-24 h-24 mx-auto my-2">',
                'options' => [
                    'Warning: Divided roadway ahead',
                    'Warning: End of divided roadway',
                    'Two-way traffic ahead',
                    'Construction zone ahead',
                ],
                'correct_answer' => 'Warning: End of divided roadway',
                'type' => 'driving_road_sign',
            ],
            [
                'question' => 'What does this road sign indicate? <img src="/images/signs/free/3.jpeg" alt="Road Sign 3" class="w-24 h-24 mx-auto my-2">',
                'options' => [
                    'Pass on the right side',
                    'Pass on the left side',
                    'No passing zone',
                    'Keep left',
                ],
                'correct_answer' => 'Pass on the left side',
                'type' => 'driving_road_sign',
            ],
            [
                'question' => 'What does this road sign indicate? <img src="/images/signs/free/4.jpeg" alt="Road Sign 4" class="w-24 h-24 mx-auto my-2">',
                'options' => [
                    'Warning: Divided roadway begins',
                    'Warning: Divided roadway ends',
                    'Traffic merging from left',
                    'One-way traffic ahead',
                ],
                'correct_answer' => 'Warning: Divided roadway begins',
                'type' => 'driving_road_sign',
            ],
            [
                'question' => 'What does this road sign indicate? <img src="/images/signs/free/5.jpeg" alt="Road Sign 5" class="w-24 h-24 mx-auto my-2">',
                'options' => [
                    'Pass on the left side',
                    'Pass on the right side',
                    'Lane ends ahead',
                    'Yield to oncoming traffic',
                ],
                'correct_answer' => 'Pass on the right side',
                'type' => 'driving_road_sign',
            ],
        ];

        // Combine all driving and road sign questions
        $allQuestions = array_merge($drivingQuestions, $roadSignQuestions);

        // Loop through each question and insert it into the database.
        foreach ($allQuestions as $questionData) {
            // Check if the question already exists (by question text AND type)
            // to prevent duplicates if the seeder is run multiple times without truncating.
            $existingQuiz = FreeQuiz::where('question', $questionData['question'])
                                    ->where('type', $questionData['type'])
                                    ->first();

            if (!$existingQuiz) {
                // Create a new FreeQuiz record and get the created instance.
                $quiz = FreeQuiz::create([
                    'question' => $questionData['question'],
                    'type' => $questionData['type'], // ✅ Now the 'type' column is correctly populated
                ]);

                // For each question, loop through the options and insert them.
                foreach ($questionData['options'] as $optionText) {
                    $isCorrect = ($optionText === $questionData['correct_answer']);

                    $quiz->options()->create([
                        'option_text' => $optionText,
                        'is_correct' => $isCorrect,
                    ]);
                }
            }
        }
    }
}

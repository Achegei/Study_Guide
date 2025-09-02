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
            [
                'question' => 'What is the minimum age to apply for an Alberta Class 7 learner’s licence?',
                'options' => [
                    '14 years',
                    '15 years',
                    '16 years',
                    '17 years',
                ],
                'correct_answer' => '14 years',
                'type' => 'driving_general',
            ],
            [
                'question' => 'A learner driver in Alberta must hold their licence for at least 2 years before they can take the road test for a Class 5 GDL.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'False', // (The minimum holding period is 1 year
                'type' => 'driving_general',
            ],
            [
                'question' => 'During the L Stage, what is the maximum speed limit you can drive, even if the posted limit is higher?',
                'options' => [
                    '50 km/h',
                    '70 km/h',
                    '80 km/h',
                    'The posted speed limit',
                ],
                'correct_answer' => '80 km/h',
                'type' => 'driving_general',
            ],
            [
                'question' => 'Learner drivers in BC are allowed to use hands-free devices while driving.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'False', // (All electronic device use is prohibited for L Stage drivers
                'type' => 'driving_general',
            ],
            [
                'question' => 'In Manitoba, a driver in the learner stage must always have a supervising driver beside them.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'True', // (All electronic device use is prohibited for L Stage drivers
                'type' => 'driving_general',
            ],
            [
                'question' => 'The maximum blood alcohol concentration allowed for learner drivers in Manitoba is:',
                'options' => [
                    '0.05%',
                    '0.02%',
                    '0.00%',
                    '0.08%',
                ],
                'correct_answer' => '0.00%',
                'type' => 'driving_general',
            ],
            [
                'question' => 'In most urban areas of New Brunswick, the maximum speed limit is:',
                'options' => [
                    '40 km/h',
                    '50 km/h',
                    '60 km/h',
                    '70 km/h',
                ],
                'correct_answer' => '50 km/h',
                'type' => 'driving_general',
            ],
            [
                'question' => 'In New Brunswick, you may legally turn right on a red light unless a sign prohibits it.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'True', 
                'type' => 'driving_general',
            ],
            [
                'question' => 'What is the minimum age to apply for a Class 5 Level I learner’s licence in Newfoundland and Labrador?',
                'options' => [
                    '15',
                    '16',
                    '17',
                    '18',
                ],
                'correct_answer' => '16',
                'type' => 'driving_general',
            ],
            [
                'question' => 'Learner drivers may cross into oncoming lanes to overtake if there is a dashed yellow line.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'True', 
                'type' => 'driving_general',
            ],
            [
                'question' => 'In Nova Scotia, a supervising driver must have at least 2 years of driving experience.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'True', 
                'type' => 'driving_general',
            ],
            [
                'question' => 'When approaching a school bus with flashing red lights, you must:',
                'options' => [
                    'Slow down but keep going',
                    'Stop at least 6 metres away',
                    'Pass quickly before children cross',
                    'Honk to warn children',
                ],
                'correct_answer' => 'Stop at least 6 metres away',
                'type' => 'driving_general',
            ],
            [
                'question' => 'It is legal to use a handheld phone while driving in Ontario as long as you are stopped at a red light.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'False', //You must be parked and off the roadway to use a handheld device legally
                'type' => 'driving_general',
            ],
            [
                'question' => 'At a four-way stop, who should go first?',
                'options' => [
                    'The largest vehicle',
                    'The vehicle that arrives first',
                    'The vehicle on the left',
                    'The fastest vehicle',
                ],
                'correct_answer' => 'The vehicle that arrives first',
                'type' => 'driving_general',
            ],
            [
                'question' => 'In PEI, a learner must always drive with a fully licensed driver seated beside them.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'True',
                'type' => 'driving_general',
            ],
            [
                'question' => 'The maximum speed limit in school zones during school hours is:',
                'options' => [
                    '30 km/h',
                    '40 km/h',
                    '50 km/h',
                    '60 km/h',
                ],
                'correct_answer' => '30 km/h',
                'type' => 'driving_general',
            ],
            [
                'question' => 'Cyclists in Quebec must follow the same traffic signals and signs as motor vehicles.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'True',
                'type' => 'driving_general',
            ],
            [
                'question' => 'A flashing green light at an intersection in Quebec means:',
                'options' => [
                    'Stop before proceeding',
                    'You may turn left, right, or go straight if safe',
                    'Only buses may go',
                    'Pedestrians have the right-of-way',
                ],
                'correct_answer' => 'You may turn left, right, or go straight if safe',
                'type' => 'driving_general',
            ],
            [
                'question' => 'In Saskatchewan, what is the minimum age to apply for a Class 7 learner’s licence?',
                'options' => [
                    '15',
                    '16',
                    '17',
                    '18',
                ],
                'correct_answer' => '16',
                'type' => 'driving_general',
            ],
            [
                'question' => 'Seat belts are optional for rear passengers in Saskatchewan.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'False',
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

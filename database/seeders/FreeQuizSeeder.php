<?php

namespace Database\Seeders;

use App\Models\FreeQuiz;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\FreeQuizOption;

class FreeQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // IMPORTANT:
        // These truncate() calls are commented out to allow both Free Citizenship
        // and Free Driving quizzes to coexist in the 'free_quizzes' table.
        // If you need to clear the table before seeding, it's best to do it ONCE
        // in your main DatabaseSeeder or when running `php artisan migrate:fresh --seed`.
        
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // FreeQuiz::truncate();
        // FreeQuizOption::truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Define the 10 citizenship questions and their options.
        $questions = [
            [
                'question' => 'What are the three parts of Parliament?',
                'options' => [
                    'House of Commons, Senate, and Prime Minister',
                    'Queen, House of Commons, and Prime Minister',
                    'Sovereign (King), Senate, and House of Commons',
                    'Governor General, Senate, and Prime Minister',
                ],
                'correct_answer' => 'Sovereign (King), Senate, and House of Commons',
            ],
            [
                'question' => 'The Governor General is elected by Canadian citizens.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'False', // Appointed by the King on advice of the PM
            ],
            [
                'question' => 'Which Canadian city is a major Pacific trade gateway?',
                'options' => [
                    'Halifax',
                    'Victoria',
                    'Vancouver',
                    'St. John’s',
                ],
                'correct_answer' => 'Vancouver',
            ],
            [
                'question' => 'Which province is the largest by land?',
                'options' => [
                    'Ontario',
                    'Alberta',
                    'Quebec',
                    'BC',
                ],
                'correct_answer' => 'Quebec',
            ],
            [
                'question' => 'Which province was last to join Canada?',
                'options' => [
                    'Alberta',
                    'BC',
                    'Saskatchewan',
                    'Newfoundland and Labrador (1949)',
                ],
                'correct_answer' => 'Newfoundland and Labrador (1949)',
            ],
            [
                'question' => 'Which of the following was a major factor in Alberta’s settlement by European immigrants?',
                'options' => [
                    'Fishing rights',
                    'Free farmland through homesteading',
                    'Gold rush',
                    'Military service',
                ],
                'correct_answer' => 'Free farmland through homesteading',
            ],
            [
                'question' => 'Which sector plays a major role in Ontario’s economy?',
                'options' => [
                    'Agriculture',
                    'Fishing',
                    'Manufacturing',
                    'Oil',
                ],
                'correct_answer' => 'Manufacturing',
            ],
            [
                'question' => 'Which of these industries contributes significantly to Saskatchewan’s economy?',
                'options' => [
                    'Film and TV',
                    'Aerospace',
                    'Agriculture',
                    'Automobile manufacturing',
                ],
                'correct_answer' => 'Agriculture',
            ],
            [
                'question' => 'Which BC city is known for its multiculturalism and large Asian communities?',
                'options' => [
                    'Prince George',
                    'Richmond',
                    'Victoria',
                    'Kamloops',
                ],
                'correct_answer' => 'Richmond',
            ],
            [
                'question' => 'Manitoba is one of the Atlantic provinces.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'False', // Manitoba is a Prairie province located in central Canada.
            ],
        ];

        // Loop through each question and insert it into the database.
        foreach ($questions as $questionData) {
            // Check if the question already exists to avoid duplicates on re-seed
            // We're checking by question text and type to ensure uniqueness.
            $existingQuiz = FreeQuiz::where('question', $questionData['question'])
                                    ->where('type', 'citizenship')
                                    ->first();

            if (!$existingQuiz) {
                // Create a new FreeQuiz record and get the created instance.
                $quiz = FreeQuiz::create([
                    'question' => $questionData['question'],
                    'type' => 'citizenship', // Assign 'citizenship' type to these questions
                ]);

                // For each question, loop through the options and insert them.
                // Using the `options()` relationship automatically sets the foreign key (free_quiz_id).
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

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
            [
                'question' => 'Calgary is the capital of Alberta.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'False', // Edmonton is the capital of Alberta, not Calgary
            ],
            [
                'question' => 'What is the largest national park in Alberta?',
                'options' => [
                    'Jasper National Park',
                    'Elk Island National Park',
                    'Waterton Lakes National Park',
                    'Banff National Park',
                ],
                'correct_answer' => 'Banff National park',
            ],
            [
                'question' => 'British Columbia has hosted international trade fairs such as Expo 86',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'True', // Vancouver hosted Expo 86, a world's fair that showcased transportation and technology
            ],
            [
                'question' => 'Which industry is a major contributor to British Columbia’s economy?',
                'options' => [
                    'Fishing',
                    'Oil drilling',
                    'Automotive',
                    'Technology',
                ],
                'correct_answer' => 'Technology',
            ],
            [
                'question' => 'Manitoba is one of the Atlantic provinces',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'False', // Explanation: Manitoba is a Prairie province located in central Canada
            ],
            [
                'question' => 'What is the main city of Manitoba?',
                'options' => [
                    'Brandon',
                    'Winnipeg',
                    'Churchill',
                    'Thompson',
                ],
                'correct_answer' => 'Winnipeg',
            ],
            [
                'question' => 'Who represents the Crown in New Brunswick?',
                'options' => [
                    'The Mayor of Moncton',
                    'The Premier',
                    'The Lieutenant Governor',
                    'The Chief Justice',
                ],
                'correct_answer' => 'The Lieutenant Governor',
            ],
            [
                'question' => 'New Brunswick is the officially bilingual province in Canada',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'True',
            ],
            [
                'question' => 'Which natural resource is important to Newfoundland and Labrador’s economy?',
                'options' => [
                    'Cotton',
                    'Natural gas',
                    'Diamonds',
                    'Oil',
                ],
                'correct_answer' => 'Oil',
            ],

            [
                'question' => 'Newfoundland and Labrador was one of the four original provinces that formed Confederation in 1867.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'False', // Newfoundland and Labrador joined Confederation in 1949
            ],
            [
                'question' => 'What is the name of Nova Scotia’s legislative building?',
                'options' => [
                    'Province House',
                    'Government Hall',
                    'Assembly Centre',
                    'Halifax House',
                ],
                'correct_answer' => 'Province House',
            ],
            [
                'question' => 'Nova Scotia is located in Western Canada.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'False', //Nova Scotia is in Eastern Canada, part of the Maritime region
            ],
            [
                'question' => 'Ontario is the largest province in Canada by land area.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'False', //Quebec is the largest province by land area, not Ontario.
            ],
            [
                'question' => 'Which lake borders southern Ontario?',
                'options' => [
                    'Lake Winnipeg',
                    'Lake Ontario',
                    'Great Bear Lake',
                    'Lake Michigan',
                ],
                'correct_answer' => 'Lake Ontario',
            ],
            [
                'question' => 'Charlottetown is the capital of Prince Edward Island',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'True',
            ],
            [
                'question' => 'Which of the following best describes PEI’s role in Confederation?',
                'options' => [
                    'It was the first province to join Confederation',
                    'It hosted the 1864 Charlottetown Conference',
                    'It joined Confederation in 1905',
                    'It was a territory before joining Confederation',
                ],
                'correct_answer' => 'It hosted the 1864 Charlottetown Conference',
            ],
            [
                'question' => 'Which river flows through Quebec and is vital for trade and transportation?',
                'options' => [
                    'Fraser River',
                    'Mackenzie River',
                    'St. Lawrence River',
                    'Red River',
                ],
                'correct_answer' => 'St. Lawrence River',
            ],
            [
                'question' => 'The Quebec Act of 1774 granted religious freedom to Protestants only.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'False',//The Quebec Act granted religious freedom primarily to Catholics
            ],
            [
                'question' => 'Saskatchewan is the smallest province in Canada.',
                'options' => [
                    'True',
                    'False',
                ],
                'correct_answer' => 'False',//Prince Edward Island is the smallest; Saskatchewan is larger in area and population
            ],
            [
                'question' => 'Which major agricultural crop is Saskatchewan especially known for?',
                'options' => [
                    'Coffee',
                    'Wheat',
                    'Rice',
                    'Cotton',
                ],
                'correct_answer' => 'Wheat',
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

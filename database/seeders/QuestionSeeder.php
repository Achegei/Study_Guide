<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CourseSection;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = CourseSection::all();

        $genericQuestions = [
            // Your existing generic questions, but remove the 'audio_url' key from them
            [
                'question' => 'What is the capital city of [REGION_NAME]?',
                'choices' => ['City A', 'City B', 'City C', 'City D'],
                'correct_answer' => 'City C',
            ],
            // ... (all other generic questions, ensure 'audio_url' key is removed) ...
            [
                'question' => 'What is the provincial bird of [REGION_NAME]?',
                'choices' => ['Blue Jay', 'Loon', 'Great Horned Owl', 'Chickadee'],
                'correct_answer' => 'Loon',
            ],
            [
                'question' => 'Which body of water borders [REGION_NAME]?',
                'choices' => ['Pacific Ocean', 'Atlantic Ocean', 'Hudson Bay', 'Great Lakes'],
                'correct_answer' => 'Pacific Ocean',
            ],
            [
                'question' => 'What is a common agricultural product from [REGION_NAME]?',
                'choices' => ['Wheat', 'Potatoes', 'Maple Syrup', 'Grapes'],
                'correct_answer' => 'Wheat',
            ],
            [
                'question' => 'What is the population of [REGION_NAME] (approx.)?',
                'choices' => ['1 million', '5 million', '10 million', '2 million'],
                'correct_answer' => '1 million',
            ],
            [
                'question' => 'Which sport is most popular in [REGION_NAME]?',
                'choices' => ['Hockey', 'Basketball', 'Soccer', 'Baseball'],
                'correct_answer' => 'Hockey',
            ],
            [
                'question' => 'What is the official tree of [REGION_NAME]?',
                'choices' => ['Maple', 'Pine', 'Oak', 'Spruce'],
                'correct_answer' => 'Maple',
            ],
            [
                'question' => 'Which historical event is significant to [REGION_NAME]?',
                'choices' => ['Gold Rush', 'Red River Rebellion', 'Battle of the Plains of Abraham', 'War of 1812'],
                'correct_answer' => 'Gold Rush',
            ],
            [
                'question' => 'What is the currency used in [REGION_NAME]?',
                'choices' => ['USD', 'CAD', 'Euro', 'GBP'],
                'correct_answer' => 'CAD',
            ],
        ];

        foreach ($sections as $section) {
            for ($i = 0; $i < 20; $i++) {
                $randomQuestionTemplate = $genericQuestions[array_rand($genericQuestions)];

                $questionText = str_replace('[REGION_NAME]', $section->title, $randomQuestionTemplate['question']);

                $choices = $randomQuestionTemplate['choices'];
                shuffle($choices);
                $correctAnswer = $choices[array_rand($choices)];

                Question::create([
                    'course_section_id' => $section->id,
                    'question' => $questionText,
                    'choices' => $choices,
                    'correct_answer' => $correctAnswer,
                    // 'audio_url' => '/audio/q' . (rand(1, 15)) . '.mp3', // ✅ Removed this line
                ]);
            }
        }
    }
}

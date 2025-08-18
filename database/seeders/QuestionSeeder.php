<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CourseSection;
use App\Models\Question;
use Illuminate\Support\Facades\DB; // Added to enable DB facade functions like statement and truncate

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks before truncating to avoid constraint issues
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Clear existing data from questions table (for CourseSection questions)
        // This truncate is specific to this seeder's domain (CourseSection questions)
        Question::where('type', 'citizenship_course')->delete(); // ✅ Delete only citizenship_course types
        // Or, if you want to clear ALL questions before seeding, use:
        // Question::truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $sections = CourseSection::all();

        $genericQuestions = [
            [
                'question' => 'What is the capital city of [REGION_NAME]?',
                'choices' => ['City A', 'City B', 'City C', 'City D'],
                'correct_answer' => 'City C',
            ],
            [
                'question' => 'What is the provincial bird of [REGION_NAME]?',
                'choices' => ['Blue Jay', 'Loon', 'Great Horned Owl', 'Chickadee'],
                'correct_answer' => 'Loon',
            ],
            [
                'question' => 'Which body of water borders [REGION_NAME]?',
                'choices' => ['Pacific Ocean', 'Atlantic Ocean', 'Hudson Bay', 'Great Lakes'],
                'correct_answer' => 'Pacific Ocean', // This answer would need to be dynamically adjusted based on region
            ],
            [
                'question' => 'What is a common agricultural product from [REGION_NAME]?',
                'choices' => ['Wheat', 'Potatoes', 'Maple Syrup', 'Grapes'],
                'correct_answer' => 'Wheat', // This answer would need to be dynamically adjusted based on region
            ],
            [
                'question' => 'What is the population of [REGION_NAME] (approx.)?',
                'choices' => ['1 million', '5 million', '10 million', '2 million'],
                'correct_answer' => '1 million', // This answer would need to be dynamically adjusted based on region
            ],
            [
                'question' => 'Which sport is most popular in [REGION_NAME]?',
                'choices' => ['Hockey', 'Basketball', 'Soccer', 'Baseball'],
                'correct_answer' => 'Hockey',
            ],
            [
                'question' => 'What is the official tree of [REGION_NAME]?',
                'choices' => ['Maple', 'Pine', 'Oak', 'Spruce'],
                'correct_answer' => 'Maple', // This answer would need to be dynamically adjusted based on region
            ],
            [
                'question' => 'Which historical event is significant to [REGION_NAME]?',
                'choices' => ['Gold Rush', 'Red River Rebellion', 'Battle of the Plains of Abraham', 'War of 1812'],
                'correct_answer' => 'Gold Rush', // This answer would need to be dynamically adjusted based on region
            ],
            [
                'question' => 'What is the currency used in [REGION_NAME]?',
                'choices' => ['USD', 'CAD', 'Euro', 'GBP'],
                'correct_answer' => 'CAD',
            ],
        ];

        foreach ($sections as $section) {
            // For each section, let's create 20 questions using the generic templates.
            for ($i = 0; $i < 20; $i++) {
                $randomQuestionTemplate = $genericQuestions[array_rand($genericQuestions)];

                // Replace the placeholder with the actual section title
                $questionText = str_replace('[REGION_NAME]', $section->title, $randomQuestionTemplate['question']);

                // Shuffle choices to randomize option order for each question instance
                $choices = $randomQuestionTemplate['choices'];
                shuffle($choices);

                // Find the correct answer text from the shuffled choices.
                // Note: For true dynamic correctness with generic templates,
                // you'd need a more sophisticated mapping or direct insertion.
                // For now, it picks a random choice as "correct" if not directly matched.
                // You might need to refine 'correct_answer' logic if answers are truly dynamic.
                $correctAnswer = $randomQuestionTemplate['correct_answer'];
                if (!in_array($correctAnswer, $choices)) {
                    $correctAnswer = $choices[array_rand($choices)]; // Fallback if original correct answer isn't in shuffled list
                }


                Question::create([
                    'course_section_id' => $section->id,
                    'question' => $questionText,
                    'choices' => json_encode($choices), // ✅ Ensure choices are JSON encoded before saving
                    'correct_answer' => $correctAnswer,
                    'type' => 'citizenship_course', // ✅ Assign the 'citizenship_course' type
                ]);
            }
        }
    }
}

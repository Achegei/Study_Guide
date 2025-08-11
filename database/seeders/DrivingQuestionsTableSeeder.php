<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DrivingSection;   // Import your DrivingSection model
use App\Models\DrivingQuestion;  // Import your DrivingQuestion model

class DrivingQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Get all driving sections that have been seeded
        $sections = DrivingSection::all();

        // Define a set of generic driving-related question templates
        $genericDrivingQuestions = [
            [
                'question' => 'What is the purpose of a traffic sign showing a red circle with a white bar, commonly found in [SECTION_NAME]?',
                'choices' => ['A. No entry', 'B. Stop ahead', 'C. One way traffic', 'D. Yield to oncoming traffic'],
                'correct_answer' => 'A. No entry',
            ],
            [
                'question' => 'In [SECTION_NAME], what is the standard speed limit in urban residential areas unless otherwise posted?',
                'choices' => ['A. 30 km/h', 'B. 40 km/h', 'C. 50 km/h', 'D. 60 km/h'],
                'correct_answer' => 'C. 50 km/h',
            ],
            [
                'question' => 'When should you use your headlights in [SECTION_NAME] during daylight hours?',
                'choices' => ['A. Only in tunnels', 'B. When visibility is reduced due to weather', 'C. Never in daylight', 'D. Only on highways'],
                'correct_answer' => 'B. When visibility is reduced due to weather',
            ],
            [
                'question' => 'What does a solid white line on the road in [SECTION_NAME] indicate?',
                'choices' => ['A. You may pass with caution', 'B. You should not change lanes', 'C. A turning lane ahead', 'D. Parking is permitted'],
                'correct_answer' => 'B. You should not change lanes',
            ],
            [
                'question' => 'In [SECTION_NAME], what is the legal blood alcohol content (BAC) limit for most drivers?',
                'choices' => ['A. 0.05%', 'B. 0.08%', 'C. 0.10%', 'D. 0.00%'],
                'correct_answer' => 'B. 0.08%', // Note: This varies by jurisdiction/driver type, adjust if needed
            ],
            [
                'question' => 'What is the correct way to merge onto a highway in [SECTION_NAME]?',
                'choices' => ['A. Stop at the end of the ramp and wait for a gap', 'B. Accelerate to highway speed and blend with traffic', 'C. Merge slowly into the nearest lane', 'D. Signal and immediately change lanes'],
                'correct_answer' => 'B. Accelerate to highway speed and blend with traffic',
            ],
            [
                'question' => 'In [SECTION_NAME], how far should you park from a fire hydrant?',
                'choices' => ['A. 1 meter', 'B. 3 meters', 'C. 5 meters', 'D. 10 meters'],
                'correct_answer' => 'B. 3 meters', // This also varies, commonly 3-5m (10-15 ft)
            ],
            [
                'question' => 'What does a flashing red traffic light at an intersection in [SECTION_NAME] mean?',
                'choices' => ['A. Yield to traffic', 'B. Stop and proceed when safe', 'C. Prepare to stop', 'D. Pedestrian crossing ahead'],
                'correct_answer' => 'B. Stop and proceed when safe',
            ],
            [
                'question' => 'When approaching a railway crossing in [SECTION_NAME] with flashing lights and bells, what must you do?',
                'choices' => ['A. Slow down and proceed carefully', 'B. Stop at least 5 meters from the nearest rail', 'C. Honk your horn to warn the train', 'D. Continue if no train is visible'],
                'correct_answer' => 'B. Stop at least 5 meters from the nearest rail',
            ],
            [
                'question' => 'In [SECTION_NAME], what is the "2-second rule" used for?',
                'choices' => ['A. Checking mirrors', 'B. Following distance', 'C. Signaling turns', 'D. Parking maneuvers'],
                'correct_answer' => 'B. Following distance',
            ],
            [
                'question' => 'What should you do if your vehicle begins to skid in [SECTION_NAME] due to slippery conditions?',
                'choices' => ['A. Brake hard and steer into the skid', 'B. Steer in the direction you want to go and ease off the accelerator', 'C. Turn the steering wheel sharply in the opposite direction', 'D. Close your eyes and wait'],
                'correct_answer' => 'B. Steer in the direction you want to go and ease off the accelerator',
            ],
            [
                'question' => 'In [SECTION_NAME], when driving at night, you should dim your high beams when an oncoming vehicle is within:',
                'choices' => ['A. 50 meters', 'B. 100 meters', 'C. 150 meters', 'D. 200 meters'],
                'correct_answer' => 'C. 150 meters', // Common distance, check local regulations
            ],
            [
                'question' => 'What does a yellow diamond-shaped sign with a curved arrow in [SECTION_NAME] typically indicate?',
                'choices' => ['A. Sharp curve ahead', 'B. Winding road ahead', 'C. Road closed', 'D. Detour ahead'],
                'correct_answer' => 'A. Sharp curve ahead',
            ],
            [
                'question' => 'In [SECTION_NAME], what is the purpose of ABS (Anti-lock Braking System)?',
                'choices' => ['A. To allow steering while braking hard', 'B. To stop the car faster', 'C. To prevent tire wear', 'D. To make the brakes softer'],
                'correct_answer' => 'A. To allow steering while braking hard',
            ],
            [
                'question' => 'When exiting a roundabout in [SECTION_NAME], you should:',
                'choices' => ['A. Signal left', 'B. Signal right', 'C. Not signal at all', 'D. Signal only if changing lanes'],
                'correct_answer' => 'B. Signal right',
            ],
            [
                'question' => 'In [SECTION_NAME], what is typically prohibited by a sign showing a red circle with a diagonal line through a car?',
                'choices' => ['A. No parking', 'B. No stopping', 'C. No passing', 'D. No vehicles allowed'],
                'correct_answer' => 'D. No vehicles allowed',
            ],
            [
                'question' => 'What should you do if a tire blows out while driving in [SECTION_NAME]?',
                'choices' => ['A. Slam on the brakes', 'B. Steer firmly, take your foot off the gas, and gently apply brakes', 'C. Accelerate to regain control', 'D. Immediately pull to the side of the road without braking'],
                'correct_answer' => 'B. Steer firmly, take your foot off the gas, and gently apply brakes',
            ],
            [
                'question' => 'In [SECTION_NAME], how often should you typically check your tire pressure?',
                'choices' => ['A. Once a year', 'B. Every six months', 'C. Monthly or before long trips', 'D. Only when tires look flat'],
                'correct_answer' => 'C. Monthly or before long trips',
            ],
            [
                'question' => 'What is the safe following distance from a large truck in [SECTION_NAME] compared to a passenger car?',
                'choices' => ['A. The same distance', 'B. Shorter distance', 'C. Longer distance', 'D. No specific rule'],
                'correct_answer' => 'C. Longer distance',
            ],
            [
                'question' => 'In [SECTION_NAME], what does a sign with a deer symbol typically indicate?',
                'choices' => ['A. Deer crossing area', 'B. Deer hunting zone', 'C. Wildlife preserve', 'D. Park entrance'],
                'correct_answer' => 'A. Deer crossing area',
            ],
        ];

        foreach ($sections as $section) {
            // Create 20 questions for each driving section
            for ($i = 0; $i < 20; $i++) {
                $randomQuestionTemplate = $genericDrivingQuestions[array_rand($genericDrivingQuestions)];

                // Replace placeholder with the actual section title
                $questionText = str_replace('[SECTION_NAME]', $section->title, $randomQuestionTemplate['question']);

                $choices = $randomQuestionTemplate['choices'];
                // It's good practice to shuffle choices to make it less predictable,
                // but ensure the 'correct_answer' still matches one of the shuffled choices.
                // For simplicity here, we'll assume the correct answer text is unique and present.
                // If choices are truly random, you'd need to re-assign correct_answer based on shuffled array.
                shuffle($choices);
                
                // For a dynamic correct answer that always exists in the shuffled choices,
                // you would find the original correct answer's position and get its new position.
                // For this generic seeder, we rely on the correct_answer string being directly present.
                $correctAnswer = $randomQuestionTemplate['correct_answer'];

                DrivingQuestion::create([
                    'driving_section_id' => $section->id, // Use the correct foreign key
                    'question' => $questionText,
                    'choices' => $choices, // Stored as JSON automatically by model cast
                    'correct_answer' => $correctAnswer,
                    'audio_url' => null, // Keeping this null as in your example
                ]);
            }
        }
    }
}

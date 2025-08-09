<?php

namespace Database\Seeders;

use App\Models\FreeQuiz;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\FreeQuizOption; // Ensure this model is also imported

class FreeQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // This is a good practice to prevent foreign key constraint issues
        // when clearing the tables before re-seeding.
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Clear existing data to prevent duplicates on each run
        FreeQuiz::truncate();
        FreeQuizOption::truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Define all 21 questions and their options in a single array.
        $questions = [
            [
                'question' => 'What are the three branches of government in Canada?',
                'options' => [
                    'The Monarchy, the Prime Minister, and the Supreme Court.',
                    'The Executive, Legislative, and Judicial.',
                    'The House of Commons, the Senate, and the Monarchy.',
                    'The Federal, Provincial, and Municipal.',
                ],
                'correct_answer' => 'The Executive, Legislative, and Judicial.',
            ],
            [
                'question' => 'What is the highest honor that Canadians can receive for bravery in the presence of an enemy?',
                'options' => [
                    'The Governor General\'s Medal.',
                    'The Victoria Cross (V.C.).',
                    'The Order of Canada.',
                    'The Stanley Cup.',
                ],
                'correct_answer' => 'The Victoria Cross (V.C.).',
            ],
            [
                'question' => 'What are the three levels of government in Canada?',
                'options' => [
                    'Sovereign, Prime Minister, and Governor General.',
                    'Executive, Legislative, and Judicial.',
                    'Urban, Rural, and Suburban.',
                    'Federal, Provincial/Territorial, and Municipal.',
                ],
                'correct_answer' => 'Federal, Provincial/Territorial, and Municipal.',
            ],
            [
                'question' => 'What does Confederation mean in a Canadian context?',
                'options' => [
                    'The process of uniting provinces to create a new, single country.',
                    'The separation of Canada from the British Empire.',
                    'The establishment of the Canadian Pacific Railway.',
                    'The agreement between France and Britain to share control of Canada.',
                ],
                'correct_answer' => 'The process of uniting provinces to create a new, single country.',
            ],
            [
                'question' => 'What is the meaning of the Remembrance Day poppy?',
                'options' => [
                    'To remember the sacrifice of Canadians who have served or died in wars.',
                    'To honor prime ministers who have died.',
                    'To celebrate Canada\'s independence from Britain.',
                    'To symbolize the beginning of the fall harvest.',
                ],
                'correct_answer' => 'To remember the sacrifice of Canadians who have served or died in wars.',
            ],
            [
                'question' => 'What is the role of the courts in Canada?',
                'options' => [
                    'To serve as a ceremonial body for the government.',
                    'To advise the Prime Minister on political matters.',
                    'To settle disputes and ensure laws are applied fairly.',
                    'To create new laws and government policies.',
                ],
                'correct_answer' => 'To settle disputes and ensure laws are applied fairly.',
            ],
            [
                'question' => 'What does it mean to say that Canada is a constitutional monarchy?',
                'options' => [
                    'The country is ruled by a dictator, but with a constitution.',
                    'The government\'s power is based on the military, led by the Sovereign.',
                    'The Prime Minister is the Head of State and the Queen is the Head of Government.',
                    'The Head of State is a hereditary Sovereign whose powers are defined by the Constitution.',
                ],
                'correct_answer' => 'The Head of State is a hereditary Sovereign whose powers are defined by the Constitution.',
            ],
            [
                'question' => 'Who were the three founding peoples of Canada?',
                'options' => [
                    'The English, Scottish, and Irish.',
                    'The Aboriginal peoples, the French, and the British.',
                    'The Vikings, the English, and the French.',
                    'The Americans, the French, and the British.',
                ],
                'correct_answer' => 'The Aboriginal peoples, the French, and the British.',
            ],
            [
                'question' => 'The beaver became a symbol of Canada primarily because of its role in which industry?',
                'options' => [
                    'The logging industry.',
                    'The fur trade.',
                    'The fishing industry.',
                    'The mining industry.',
                ],
                'correct_answer' => 'The fur trade',
            ],
            [
                'question' => 'In Canada, are you obliged to tell other people how you voted?',
                'options' => [
                    'No, voting is done by a secret ballot.',
                    'Yes, you must tell a government official if they ask.',
                    'Yes, you must tell your family and employer.',
                    'Only if you are voting in a provincial or municipal election.',
                ],
                'correct_answer' => 'No, voting is done by a secret ballot.',
            ],
            [
                'question' => 'What is the difference between the role of the King and that of the Prime Minister?',
                'options' => [
                    'The Queen is the Head of Government and the Prime Minister is the Head of State.',
                    'The Queen makes laws and the Prime Minister enforces them.',
                    'The Queen is responsible for foreign policy and the Prime Minister is responsible for domestic policy.',
                    'The King is the Head of State and the Prime Minister is the Head of Government.',
                ],
                'correct_answer' => 'The King is the Head of State and the Prime Minister is the Head of Government.',
            ],
            [
                'question' => 'Who is entitled to vote in Canadian federal elections?',
                'options' => [
                    'Any Canadian resident who is 18 or older.',
                    'Canadian citizens who are at least 18 years old on election day.',
                    'Anyone who has a valid driver\'s license.',
                    'Only Canadian citizens who are property owners.',
                ],
                'correct_answer' => 'Canadian citizens who are at least 18 years old on election day.',
            ],
            [
                'question' => 'What is the significance of the discovery of insulin by Sir Frederick Banting and Charles Best?',
                'options' => [
                    'It led to a cure for many types of cancer.',
                    'It allowed for the widespread use of anesthesia in surgery.',
                    'It was the first Canadian invention to be patented.',
                    'It has saved the lives of millions of people with diabetes worldwide.',
                ],
                'correct_answer' => 'It has saved the lives of millions of people with diabetes worldwide.',
            ],
            [
                'question' => 'After a federal election, which party usually forms the government?',
                'options' => [
                    'The party with the most seats in the House of Commons.',
                    'The party that wins the most votes nationwide, regardless of seats.',
                    'The party chosen by the Governor General.',
                    'A coalition of all opposition parties.',
                ],
                'correct_answer' => 'The party with the most seats in the House of Commons.',
            ],
            [
                'question' => 'Which of the following is an example of taking responsibility for yourself and your family?',
                'options' => [
                    'Learning about Canada\'s history.',
                    'Working to provide for your family\'s needs.',
                    'Serving on a jury.',
                    'Volunteering in your community.',
                ],
                'correct_answer' => 'Working to provide for your family\'s needs',
            ],
            [
                'question' => 'What does the word \'Inuit\' mean?',
                'options' => [
                    'The northern lights.',
                    'The Arctic.',
                    'The land.',
                    'The people.',
                ],
                'correct_answer' => 'The people.',
            ],
            [
                'question' => 'In a parliamentary democracy, what does it mean that the government must have the \'confidence of the House\'?',
                'options' => [
                    'The government must be supported by a majority of the elected representatives.',
                    'The Prime Minister must personally be trusted by the Head of State.',
                    'All new laws must be approved by the Senate first.',
                    'The Governor General must approve all government decisions.',
                ],
                'correct_answer' => 'The government must be supported by a majority of the elected representatives.',
            ],
            [
                'question' => 'What is the name of Canada\'s official summer sport, which was first played by Aboriginal peoples?',
                'options' => [
                    'Baseball.',
                    'Lacrosse.',
                    'Hockey.',
                    'Soccer.',
                ],
                'correct_answer' => 'Lacrosse.',
            ],
            [
                'question' => 'What does the Canadian Pacific Railway symbolize?',
                'options' => [
                    'A powerful symbol of national unity, connecting Canada from coast to coast.',
                    'The country\'s economic alliance with the United States.',
                    'The country\'s division into different provinces.',
                    'The development of Canada\'s mining industry.',
                ],
                'correct_answer' => 'A powerful symbol of national unity, connecting Canada from coast to coast',
            ],
            [
                'question' => 'Which provinces are referred to as the Atlantic Provinces?',
                'options' => [
                    'British Columbia, Alberta, and Manitoba..',
                    'Saskatchewan, Alberta, and British Columbia.',
                    'Newfoundland and Labrador, Prince Edward Island, Nova Scotia, and New Brunswick.',
                    'Ontario, Quebec, and Newfoundland and Labrador.',
                ],
                'correct_answer' => 'Newfoundland and Labrador, Prince Edward Island, Nova Scotia, and New Brunswick.',
            ],
            [
                'question' => 'Who is a Métis person?',
                'options' => [
                    'A person of mixed Aboriginal and European ancestry.',
                    'A person of Aboriginal ancestry who speaks only French.',
                    'A person who has French and Inuit heritage.',
                    'An Aboriginal person who lives in the northern territories.',
                ],
                'correct_answer' => 'A person of mixed Aboriginal and European ancestry.',
            ],
        ];

        // Loop through each question and insert it into the database.
        foreach ($questions as $questionData) {
            // Create a new FreeQuiz record and get the created instance.
            $quiz = FreeQuiz::create([
                'question' => $questionData['question'],
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

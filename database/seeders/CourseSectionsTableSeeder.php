<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CourseSection;

class CourseSectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            ['title' => 'National', 'type' => 'General', 'capital' => 'General', 'flag' => '/images/flags/logo.png', 'description' => 'Questions about Canada as a whole.', 'summary_audio_url' => '/audio/summary_canada.mp3'],
            ['title' => 'Alberta', 'type' => 'province', 'capital' => 'Edmonton', 'flag' => '/images/flags/alberta.png', 'description' => 'Questions specific to Alberta.', 'summary_audio_url' => '/audio/summary_alberta.mp3'],
            ['title' => 'Ontario', 'type' => 'province', 'capital' => 'Toronto', 'flag' => '/images/flags/ontario.png', 'description' => 'Questions specific to Ontario.', 'summary_audio_url' => '/audio/summary_ontario.mp3'],
            ['title' => 'Nunavut', 'type' => 'territory', 'capital' => 'Iqaluit', 'flag' => '/images/flags/nunavut.png', 'description' => 'Questions specific to Nunavut.', 'summary_audio_url' => '/audio/summary_nunavut.mp3'],
            ['title' => 'Northwest Territories', 'type' => 'territory', 'capital' => 'Yellowknife', 'flag' => '/images/flags/northwest-territories.png', 'description' => 'Questions specific to Northwest Territories.', 'summary_audio_url' => '/audio/summary_northwest_territories.mp3'],
            ['title' => 'Quebec', 'type' => 'province', 'capital' => 'Quebec City', 'flag' => '/images/flags/quebec.png', 'description' => 'Questions specific to Quebec.', 'summary_audio_url' => '/audio/summary_quebec.mp3'],
            ['title' => 'British Columbia', 'type' => 'province', 'capital' => 'Victoria', 'flag' => '/images/flags/british-columbia.png', 'description' => 'Questions specific to British Columbia.', 'summary_audio_url' => '/audio/summary_british_columbia.mp3'],
            ['title' => 'Prince Edward Island', 'type' => 'province', 'capital' => 'Charlottetown', 'flag' => '/images/flags/prince-edward-island.png', 'description' => 'Questions specific to Prince Edward Island.', 'summary_audio_url' => '/audio/summary_prince_edward_island.mp3'],
            ['title' => 'Manitoba', 'type' => 'province', 'capital' => 'Winnipeg', 'flag' => '/images/flags/manitoba.png', 'description' => 'Questions specific to Manitoba.', 'summary_audio_url' => '/audio/summary_manitoba.mp3'],
            ['title' => 'New Brunswick', 'type' => 'province', 'capital' => 'Fredericton', 'flag' => '/images/flags/new-brunswick.png', 'description' => 'Questions specific to New Brunswick.', 'summary_audio_url' => '/audio/summary_new_brunswick.mp3'],
            ['title' => 'Newfoundland and Labrador', 'type' => 'province', 'capital' => 'St. John\'s', 'flag' => '/images/flags/newfoundland-and-labrador.png', 'description' => 'Questions specific to Newfoundland and Labrador.', 'summary_audio_url' => '/audio/summary_newfoundland_labrador.mp3'],
            ['title' => 'Saskatchewan', 'type' => 'province', 'capital' => 'Regina', 'flag' => '/images/flags/saskatchewan.png', 'description' => 'Questions specific to Saskatchewan.', 'summary_audio_url' => '/audio/summary_saskatchewan.mp3'],
            ['title' => 'Yukon', 'type' => 'territory', 'capital' => 'Whitehorse', 'flag' => '/images/flags/yukon.png', 'description' => 'Questions specific to Yukon.', 'summary_audio_url' => '/audio/summary_yukon.mp3'],
            ['title' => 'Nova Scotia', 'type' => 'province', 'capital' => 'Halifax', 'flag' => '/images/flags/nova-scotia.png', 'description' => 'Questions specific to Nova Scotia.', 'summary_audio_url' => '/audio/summary_nova_scotia.mp3'],
        ];

        foreach ($regions as $regionData) {
            CourseSection::firstOrCreate(
                ['title' => $regionData['title']],
                $regionData
            );
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DrivingSection; // IMPORTANT: Use your DrivingSection model

class DrivingSectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $drivingSections = [
            [
                'title' => 'Ontario',
                'type' => 'province',
                'capital' => 'Toronto', // Or remove if not relevant for driving sections
                'flag' => '/images/flags/ontario.png', // Example path
                'description' => 'Ontario Driving Test Prep Questions',
                'summary_audio_url' => '/audio/driving/summary_road_signs.mp3',
            ],
            [
                'title' => 'Nova Scotia',
                'type' => 'province',
                'capital' => 'Halifax',
                'flag' => '/images/flags/nova-scotia.png',
                'description' => 'Nova Scotia Driving Test Prep Questions',
                'summary_audio_url' => '/audio/driving/summary_rules_road.mp3',
            ],
            [
                'title' => 'British Columbia',
                'type' => 'province',
                'capital' => 'Victoria',
                'flag' => '/images/flags/british-columbia.png',
                'description' => 'British Columbia Driving Test Prep Questions',
                'summary_audio_url' => '/audio/driving/summary_safe_driving.mp3',
            ],
            [
                'title' => 'Newfoundland and Labrador',
                'type' => 'province',
                'capital' => 'St. John\'s',
                'flag' => '/images/flags/newfoundland-and-labrador.png',
                'description' => 'Newfoundland and Labrador Driving Test Prep Questions',
                'summary_audio_url' => '/audio/driving/summary_vehicle_control.mp3',
            ],
            [
                'title' => 'New brunswick',
                'type' => 'province',
                'capital' => 'Fredericton',
                'flag' => '/images/flags/new-brunswick.png',
                'description' => 'New brunswick Driving Test Prep Questions',
                'summary_audio_url' => '/audio/driving/summary_parking.mp3',
            ],
            // Added 9 more sections to match the CourseSectionsTableSeeder (total 14)
            [
                'title' => 'Prince Edwards Island',
                'type' => 'province',
                'capital' => 'Charlottetown',
                'flag' => '/images/flags/prince-edward-island.png',
                'description' => 'Prince Edwards Island Driving Test Prep Questions',
                'summary_audio_url' => '/audio/driving/summary_intersections.mp3',
            ],
            [
                'title' => 'Quebec',
                'type' => 'province',
                'capital' => 'Quebec City',
                'flag' => '/images/flags/quebec.png',
                'description' => 'Quebec Driving Test Prep Questions',
                'summary_audio_url' => '/audio/driving/summary_highway_driving.mp3',
            ],
            [
                'title' => 'Saskatchewan',
                'type' => 'province',
                'capital' => 'Regina',
                'flag' => '/images/flags/saskatchewan.png',
                'description' => 'Saskatchewan Driving Test Prep Questions',
                'summary_audio_url' => '/audio/driving/summary_adverse_conditions.mp3',
            ],
            [
                'title' => 'Alberta',
                'type' => 'province',
                'capital' => 'Edmonton',
                'flag' => '/images/flags/alberta.png',
                'description' => 'Alberta Driving Test Prep Questions',
                'summary_audio_url' => '/audio/driving/summary_distracted_driving.mp3',
            ],
            [
                'title' => 'Manitoba',
                'type' => 'province',
                'capital' => 'Winnipeg',
                'flag' => '/images/flags/manitoba.png',
                'description' => 'Manitoba Driving Test Prep Questions',
                'summary_audio_url' => '/audio/driving/summary_sharing_road.mp3',
            ],
        ];

        foreach ($drivingSections as $sectionData) {
            DrivingSection::firstOrCreate(
                ['title' => $sectionData['title']], // Find by title
                $sectionData
            );
        }
    }
}

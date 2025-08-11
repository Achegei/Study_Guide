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
                'title' => 'Road Signs',
                'type' => 'Theory',
                'capital' => 'N/A', // Or remove if not relevant for driving sections
                'flag' => '/images/driving_icons/road_signs.png', // Example path
                'description' => 'Learn the meaning of common road signs and traffic signals.',
                'summary_audio_url' => '/audio/driving/summary_road_signs.mp3',
            ],
            [
                'title' => 'Rules of the Road',
                'type' => 'Theory',
                'capital' => 'N/A',
                'flag' => '/images/driving_icons/rules_road.png',
                'description' => 'Understand fundamental traffic laws and regulations.',
                'summary_audio_url' => '/audio/driving/summary_rules_road.mp3',
            ],
            [
                'title' => 'Safe Driving Practices',
                'type' => 'Practical',
                'capital' => 'N/A',
                'flag' => '/images/driving_icons/safe_driving.png',
                'description' => 'Techniques for defensive driving and hazard perception.',
                'summary_audio_url' => '/audio/driving/summary_safe_driving.mp3',
            ],
            [
                'title' => 'Vehicle Control',
                'type' => 'Practical',
                'capital' => 'N/A',
                'flag' => '/images/driving_icons/vehicle_control.png',
                'description' => 'Mastering steering, braking, and acceleration.',
                'summary_audio_url' => '/audio/driving/summary_vehicle_control.mp3',
            ],
            [
                'title' => 'Parking Maneuvers',
                'type' => 'Practical',
                'capital' => 'N/A',
                'flag' => '/images/driving_icons/parking.png',
                'description' => 'Techniques for parallel, perpendicular, and angle parking.',
                'summary_audio_url' => '/audio/driving/summary_parking.mp3',
            ],
            // Added 9 more sections to match the CourseSectionsTableSeeder (total 14)
            [
                'title' => 'Intersections',
                'type' => 'Theory',
                'capital' => 'N/A',
                'flag' => '/images/driving_icons/intersections.png',
                'description' => 'Navigating different types of intersections safely.',
                'summary_audio_url' => '/audio/driving/summary_intersections.mp3',
            ],
            [
                'title' => 'Highway Driving',
                'type' => 'Practical',
                'capital' => 'N/A',
                'flag' => '/images/driving_icons/highway_driving.png',
                'description' => 'Skills for driving on multi-lane highways and freeways.',
                'summary_audio_url' => '/audio/driving/summary_highway_driving.mp3',
            ],
            [
                'title' => 'Adverse Conditions',
                'type' => 'Theory',
                'capital' => 'N/A',
                'flag' => '/images/driving_icons/adverse_conditions.png',
                'description' => 'Driving safely in rain, snow, fog, and other challenging conditions.',
                'summary_audio_url' => '/audio/driving/summary_adverse_conditions.mp3',
            ],
            [
                'title' => 'Distracted Driving',
                'type' => 'Theory',
                'capital' => 'N/A',
                'flag' => '/images/driving_icons/distracted_driving.png',
                'description' => 'Understanding the dangers and avoiding distracted driving behaviors.',
                'summary_audio_url' => '/audio/driving/summary_distracted_driving.mp3',
            ],
            [
                'title' => 'Sharing the Road',
                'type' => 'Theory',
                'capital' => 'N/A',
                'flag' => '/images/driving_icons/sharing_road.png',
                'description' => 'Interacting safely with pedestrians, cyclists, and large vehicles.',
                'summary_audio_url' => '/audio/driving/summary_sharing_road.mp3',
            ],
            [
                'title' => 'Emergency Maneuvers',
                'type' => 'Practical',
                'capital' => 'N/A',
                'flag' => '/images/driving_icons/emergency.png',
                'description' => 'How to react to blowouts, skids, and other unexpected events.',
                'summary_audio_url' => '/audio/driving/summary_emergency.mp3',
            ],
            [
                'title' => 'Vehicle Maintenance',
                'type' => 'Theory',
                'capital' => 'N/A',
                'flag' => '/images/driving_icons/maintenance.png',
                'description' => 'Basic vehicle checks and routine maintenance for safety.',
                'summary_audio_url' => '/audio/driving/summary_maintenance.mp3',
            ],
            [
                'title' => 'Licensing & Regulations',
                'type' => 'Theory',
                'capital' => 'N/A',
                'flag' => '/images/driving_icons/licensing.png',
                'description' => 'Understanding provincial licensing requirements and traffic laws.',
                'summary_audio_url' => '/audio/driving/summary_licensing.mp3',
            ],
            [
                'title' => 'Road Test Preparation',
                'type' => 'Practical',
                'capital' => 'N/A',
                'flag' => '/images/driving_icons/road_test.png',
                'description' => 'Tips and practice for passing your practical driving test.',
                'summary_audio_url' => '/audio/driving/summary_road_test.mp3',
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

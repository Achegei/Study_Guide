<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post; // Import your Post model
use Illuminate\Support\Str; // For generating slugs

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing posts to prevent duplicates if you run the seeder multiple times
        Post::truncate();

        // Create some sample posts
        $posts = [
            [
                'title' => 'Understanding Canadian Citizenship',
                'content' => 'This article covers the basics of Canadian citizenship, rights, and responsibilities.',
                'status' => 'PUBLISHED',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Preparing for Your Driving Test',
                'content' => 'Tips and tricks to help you pass your provincial driving knowledge test.',
                'status' => 'PUBLISHED',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(2),
            ],
            [
                'title' => 'A Guide to Canadian Provinces',
                'content' => 'Explore the unique characteristics of each Canadian province and territory.',
                'status' => 'PUBLISHED',
                'created_at' => now()->subMonth(),
                'updated_at' => now()->subWeek(),
            ],
            [
                'title' => 'Draft Blog Post',
                'content' => 'This is a draft that should not appear in the sitemap.',
                'status' => 'DRAFT',
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(10),
            ],
        ];

        foreach ($posts as $postData) {
            Post::create([
                'title' => $postData['title'],
                'slug' => Str::slug($postData['title']), // Generate a slug from the title
                'content' => $postData['content'],
                'status' => $postData['status'],
                'created_at' => $postData['created_at'],
                'updated_at' => $postData['updated_at'],
            ]);
        }
    }
}

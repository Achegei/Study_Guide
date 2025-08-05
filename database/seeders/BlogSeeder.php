<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Prevent duplicate test user
        if (!User::where('email', 'test@example.com')->exists()) {
            User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'role_id' => 2,
            ]);
        }

        // Prevent duplicate blog post
        if (!Blog::where('slug', 'canadian-citizenship-test-guide')->exists()) {
            Blog::create([
                'title' => 'Canadian Citizenship Test – What to Expect',
                'slug' => 'canadian-citizenship-test-guide',
                'excerpt' => 'Here’s what you need to know before sitting the Canadian Citizenship Test...',
                'content' => <<<EOT
You are required to pass a Canadian citizenship test in order to become a citizen. You will have to take the test if you are between 18 and 54 years old...
[You can paste the full blog content here or link to a separate file to keep it tidy]
EOT,
            ]);
        }
    }
}
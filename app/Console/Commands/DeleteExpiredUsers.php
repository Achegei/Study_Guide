<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User; // Import the User model
use Carbon\Carbon; // Import Carbon for date comparisons
use Illuminate\Support\Facades\Log; // For logging

class DeleteExpiredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:delete-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes user accounts whose access has expired.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Starting to check for expired user accounts...');

        // Get current time
        $now = Carbon::now();

        // Find users whose access_expires_at is in the past and is not null
        $expiredUsers = User::whereNotNull('access_expires_at')
                            ->where('access_expires_at', '<=', $now)
                            ->get();

        if ($expiredUsers->isEmpty()) {
            $this->info('No expired user accounts found.');
            Log::info('No expired user accounts found during scheduled check.');
            return;
        }

        $deletedCount = 0;
        foreach ($expiredUsers as $user) {
            try {
                $user->delete();
                $deletedCount++;
                $this->info("Deleted user: {$user->email} (Expired on: {$user->access_expires_at})");
                Log::info("Deleted expired user: {$user->email} (ID: {$user->id}, Expired on: {$user->access_expires_at})");
            } catch (\Exception $e) {
                $this->error("Failed to delete user: {$user->email}. Error: {$e->getMessage()}");
                Log::error("Failed to delete expired user: {$user->email} (ID: {$user->id}). Error: {$e->getMessage()}");
            }
        }

        $this->info("Finished. Total expired users deleted: {$deletedCount}");
        Log::info("Finished deleting expired users. Total deleted: {$deletedCount}");
    }
}

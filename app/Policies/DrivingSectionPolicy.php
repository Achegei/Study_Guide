<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DrivingSection;
use Illuminate\Auth\Access\Response;

class DrivingSectionPolicy
{
    /**
     * Determine whether the user can view any models.
     * This method could be used to control if a user can even see the list of driving courses.
     */
    public function viewAny(User $user): bool
    {
        // For now, allow any logged-in user to see the list of driving courses.
        // Access to individual sections will be controlled by 'view'.
        return $user !== null; // User must be logged in to see any course list
    }

    /**
     * Determine whether the user can view the DrivingSection.
     */
    public function view(User $user, DrivingSection $drivingSection): bool
    {
        // Admins can view any driving section
        if ($user->isAdmin()) {
            return true;
        }

        // Check if the user has access to this specific driving course section
        return $user->drivingSections->contains($drivingSection->id);
    }

    // You might also define other methods like create, update, delete if applicable
}

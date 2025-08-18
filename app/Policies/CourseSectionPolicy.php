<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CourseSection;
use Illuminate\Auth\Access\Response;

class CourseSectionPolicy
{
    /**
     * Determine whether the user can view any models.
     * This method could be used to control if a user can even see the list of citizenship courses.
     */
    public function viewAny(User $user): bool
    {
        // For now, allow any logged-in user to see the list of citizenship courses.
        // Access to individual sections will be controlled by 'view'.
        return $user !== null; // User must be logged in to see any course list
    }

    /**
     * Determine whether the user can view the CourseSection.
     */
    public function view(User $user, CourseSection $courseSection): bool
    {
        // Admins can view any course section
        if ($user->isAdmin()) {
            return true;
        }

        // Check if the user has access to this specific citizenship course section
        return $user->citizenshipSections->contains($courseSection->id);
    }

    // You might also define other methods like create, update, delete if applicable
}

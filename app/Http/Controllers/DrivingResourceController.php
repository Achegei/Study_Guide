<?php

namespace App\Http\Controllers;

use App\Models\DrivingSection; // Ensure this is imported
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth; // ✅ Added Auth facade
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DrivingResourceController extends Controller
{
     use AuthorizesRequests;
/**
     * Display the driving resources for a specific section (region).
     *
     * @param  \App\Models\DrivingSection  $section // Updated: Type hint is now DrivingSection
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show(DrivingSection $section) // Updated: Parameter type is now DrivingSection
    {
        // ✅ Apply policy check for viewing this specific DrivingSection.
        // This ensures the authenticated user has access to THIS particular driving section.
        // If not authorized, it will abort with a 403 Forbidden.
        $this->authorize('view', $section);

        // Get all driving sections for the sidebar navigation
        $allSections = DrivingSection::orderBy('title')->get(); // Updated: Use DrivingSection here

        // Derive the view name from the section title (e.g., "Ontario" -> "ontario")
        // This will now point to 'frontend.driving-resources.your-section-slug'
        $viewName = 'frontend.driving-resources.' . Str::slug($section->title);

        // Check if the specific driving resource view exists
        if (!View::exists($viewName)) {
            // If the view doesn't exist, redirect to the main driving courses list
            // or a more generic error page, as the specific resource content is missing.
            // Changed from 'driving_sections.show' to 'driving.index' (main driving course list)
            return redirect()->route('driving-courses.index') // Assuming 'driving-courses.index' is the route for your main list of driving sections
                             ->with('error', 'Driving resources for ' . $section->title . ' are not yet available.');
        }

        // Pass the current section and all sections to the view for sidebar and content display
        return view($viewName, [
            'currentSection' => $section, // $section is now an instance of DrivingSection
            'allSections' => $allSections,
        ]);
    }
}

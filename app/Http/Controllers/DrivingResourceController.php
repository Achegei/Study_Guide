<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DrivingSection; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;

class DrivingResourceController extends Controller
{
/**
     * Display the driving resources for a specific section (region).
     *
     * @param  \App\Models\DrivingSection  $section // Updated: Type hint is now DrivingSection
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show(DrivingSection $section) // Updated: Parameter type is now DrivingSection
    {
        // Get all driving sections for the sidebar navigation
        $allSections = DrivingSection::orderBy('title')->get(); // Updated: Use DrivingSection here

        // Derive the view name from the section title (e.g., "Ontario" -> "ontario")
        // This will now point to 'frontend.driving-resources.your-section-slug'
        $viewName = 'frontend.driving-resources.' . Str::slug($section->title);

        // Check if the specific driving resource view exists
        if (!View::exists($viewName)) {
            // If the view doesn't exist, redirect or show an error
            return redirect()->route('driving_sections.show', $section->id) // Adjust route name if different
                             ->with('error', 'Driving resources for ' . $section->title . ' are not yet available.');
        }

        // Pass the current section and all sections to the view for sidebar and content display
        return view($viewName, [
            'currentSection' => $section, // $section is now an instance of DrivingSection
            'allSections' => $allSections,
        ]);
    }
}

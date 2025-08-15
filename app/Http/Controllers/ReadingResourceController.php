<?php

namespace App\Http\Controllers;

use App\Models\CourseSection; // ✅ Updated: Use your actual model name 'CourseSection'
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ReadingResourceController extends Controller
{
    /**
     * Display the reading resources for a specific section (region).
     *
     * @param  \App\Models\CourseSection  $section // ✅ Updated: Type hint is now CourseSection
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show(CourseSection $section) // ✅ Updated: Parameter type is now CourseSection
    {
        // Get all sections for the sidebar navigation
        $allSections = CourseSection::orderBy('title')->get(); // ✅ Updated: Use CourseSection here too

        // Derive the view name from the section title (e.g., "Alberta" -> "alberta")
        $viewName = 'frontend.reading-resources.' . Str::slug($section->title);

        // Check if the specific reading resource view exists
        if (!View::exists($viewName)) {
            // If the view doesn't exist, redirect or show an error
            return redirect()->route('courses.show', $section->id)
                             ->with('error', 'Reading resources for ' . $section->title . ' are not yet available.');
        }

        // Pass the current section and all sections to the view for sidebar and content display
        return view($viewName, [
            'currentSection' => $section, // $section is now an instance of CourseSection
            'allSections' => $allSections,
        ]);
    }
}
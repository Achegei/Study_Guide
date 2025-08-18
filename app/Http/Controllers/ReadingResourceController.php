<?php

namespace App\Http\Controllers; // Check if this namespace is correct, or if it should be under CanadianCitizenship like CourseController. If it's the latter, adjust.

use App\Models\CourseSection; // Updated: Use your actual model name 'CourseSection'
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth; // ✅ Added Auth facade for policy checks
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; 

class ReadingResourceController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display the reading resources for a specific section (region).
     *
     * @param  \App\Models\CourseSection  $section // Updated: Type hint is now CourseSection
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show(CourseSection $section) // Updated: Parameter type is now CourseSection
    {
        // ✅ Apply policy check for viewing this specific CourseSection.
        // This ensures the authenticated user has access to THIS particular citizenship reading section.
        // If not authorized, it will abort with a 403 Forbidden.
        $this->authorize('view', $section);

        // Get all sections for the sidebar navigation
        $allSections = CourseSection::orderBy('title')->get(); // Updated: Use CourseSection here too

        // Derive the view name from the section title (e.g., "Alberta" -> "alberta")
        $viewName = 'frontend.reading-resources.' . Str::slug($section->title);

        // Check if the specific reading resource view exists
        if (!View::exists($viewName)) {
            // If the view doesn't exist, redirect to the main citizenship courses list
            // or a more generic error page, as the specific resource content is missing.
            return redirect()->route('courses.index') // Assuming 'courses.index' is the route for your main list of citizenship sections
                             ->with('error', 'Reading resources for ' . $section->title . ' are not yet available.');
        }

        // Pass the current section and all sections to the view for sidebar and content display
        return view($viewName, [
            'currentSection' => $section, // $section is now an instance of CourseSection
            'allSections' => $allSections,
        ]);
    }
}

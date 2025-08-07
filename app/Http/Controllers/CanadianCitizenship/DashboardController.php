<?php

namespace App\Http\Controllers\CanadianCitizenship;

// ✅ Add this line to import the CourseSection model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\CourseSection; 
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the user's dashboard with a list of all courses.
     */
    public function index(): View
    {
        // Fetch all courses from the database.
        $courses = CourseSection::all();

        // Return the 'dashboard' view, passing the courses data.
        return view('dashboard', compact('courses'));
    }
}

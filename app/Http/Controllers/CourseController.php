<?php

namespace App\Http\Controllers;

use App\Models\CourseSection;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Show all cards
    public function index()
    {
        $sections = CourseSection::all();
        return view('frontend.courses', compact('sections'));
    }

    // Show questions for a specific region
    public function show($id)
    {
        $section = CourseSection::findOrFail($id);
        $questions = $section->questions()->paginate(10);
        // ✅ Fetch all course sections to populate the sidebar navigation
        $allSections = CourseSection::all()->sortBy('title'); // Sort alphabetically for cleaner navigation
        return view('frontend.questions', compact('section', 'questions', 'allSections'));
    }
}

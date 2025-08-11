<?php

namespace App\Http\Controllers\CanadianCitizenship;

use App\Http\Controllers\Controller;
// Use your new DrivingSection model
use App\Models\DrivingSection;
// Use your new DrivingQuestion model (needed if you directly query it, or for clarity)
use App\Models\DrivingQuestion;
// Use your new UserDrivingProgress model
use App\Models\UserDrivingProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DrivingController extends Controller
{
    /**
     * Show all driving course sections (regions/cards).
     */
    public function index()
    {
        $sections = DrivingSection::all();
        // Ensure this view exists: resources/views/frontend/driving-courses.blade.php
        return view('frontend.driving-courses', compact('sections'));
    }

    /**
     * Show questions for a specific driving section, resuming from the correct spot.
     */
    public function show($id, Request $request)
    {
        $section = DrivingSection::findOrFail($id);
        $allSections = DrivingSection::all()->sortBy('title'); // Fetch all sections for navigation, sorted by title

        $user = Auth::user();

        // Get the progress for the current user and the specific driving section
        // Uses the new UserDrivingProgress model and driving_section_id
        $progress = $user ? UserDrivingProgress::where('user_id', $user->id)
                                        ->where('driving_section_id', $id) // IMPORTANT: Changed to driving_section_id
                                        ->first() : null;

        $lastQuestionId = $progress ? $progress->last_question_id : 0;

        // Determine the starting page for the quiz based on user's last progress
        $questionsCount = $section->questions()->count(); // Uses DrivingSection's hasMany(DrivingQuestion::class)
        $questionsPerPage = 10;

        $startPage = 1;
        if ($lastQuestionId > 0) {
            // Find the last answered question within this section
            $lastQuestion = $section->questions()->find($lastQuestionId);
            if ($lastQuestion) {
                // Calculate how many questions come before or at the last answered question's ID
                $questionsBefore = $section->questions()->where('id', '<=', $lastQuestionId)->count();
                // Determine the page number to resume from
                $startPage = (int) ceil($questionsBefore / $questionsPerPage);
                // Ensure startPage is at least 1
                if ($startPage < 1) {
                    $startPage = 1;
                }
            }
        }

        // Use the page number from the URL request (e.g., from pagination links)
        // If no page is in the URL, use our calculated startPage
        $currentPage = $request->input('page', $startPage);

        // Fetch the questions for the current page using pagination
        // Uses DrivingSection's hasMany(DrivingQuestion::class)
        $questions = $section->questions()->paginate($questionsPerPage, ['*'], 'page', $currentPage);

        // Pass all necessary data to the view
        // Ensure this view exists: resources/views/frontend/driving-questions.blade.php
        return view('frontend.driving-questions', compact('section', 'questions', 'allSections', 'progress'));
    }

    /**
     * Handle the user saving their progress for a driving quiz question.
     */
    public function saveProgress(Request $request)
    {
        $request->validate([
            // Validate 'section_id' against the 'driving_sections' table
            'section_id' => 'required|exists:driving_sections,id',
            // Validate 'question_id' against the 'driving_questions' table
            'question_id' => 'required|exists:driving_questions,id',
        ]);

        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'User not authenticated.'], 401);
        }

        // Use the new UserDrivingProgress model to update or create progress
        UserDrivingProgress::updateOrCreate(
            ['user_id' => $user->id, 'driving_section_id' => $request->section_id], // IMPORTANT: Changed to driving_section_id
            ['last_question_id' => $request->question_id]
        );

        return response()->json(['success' => 'Progress saved successfully!']);
    }

    /**
     * Handle the user resetting their progress for a specific driving section.
     */
    public function resetProgress($id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to reset your progress.');
        }

        // Use the new UserDrivingProgress model to delete progress
        UserDrivingProgress::where('user_id', $user->id)
                    ->where('driving_section_id', $id) // IMPORTANT: Changed to driving_section_id
                    ->delete();

        // Redirect back to the specific driving section's show page after resetting
        // Ensure 'driving.show' is the correct route name for your driving course sections
        return redirect()->route('driving.show', $id)->with('success', 'Your progress has been reset.');
    }
}

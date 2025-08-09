<?php

namespace App\Http\Controllers\CanadianCitizenship;

use App\Http\Controllers\Controller;
use App\Models\CourseSection;
use App\Models\UserProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    // Show all cards (regions)
    public function index()
    {
        $sections = CourseSection::all();
        return view('frontend.courses', compact('sections'));
    }

    // Show questions for a specific region, starting at the correct spot
    public function show($id, Request $request)
    {
        $section = CourseSection::findOrFail($id);
        $allSections = CourseSection::all()->sortBy('title');

        $user = Auth::user();

        // Get the progress for the current user and section
        $progress = $user ? UserProgress::where('user_id', $user->id)
                                        ->where('course_section_id', $id)
                                        ->first() : null;

        $lastQuestionId = $progress ? $progress->last_question_id : 0;
        
        // Find the index of the last question answered to determine the page number
        $questionsCount = $section->questions()->count();
        $questionsPerPage = 10;
        
        $startPage = 1;
        if ($lastQuestionId > 0) {
            $lastQuestion = $section->questions()->find($lastQuestionId);
            if ($lastQuestion) {
                // Determine the correct page to resume from
                $questionsBefore = $section->questions()->where('id', '<=', $lastQuestionId)->count();
                $startPage = (int) ceil($questionsBefore / $questionsPerPage);
            }
        }
        
        // If a page number is explicitly passed in the URL (e.g., from the paginator), use it.
        // Otherwise, use our calculated startPage.
        $currentPage = $request->input('page', $startPage);

        // Fetch the questions for the correct page
        $questions = $section->questions()->paginate($questionsPerPage, ['*'], 'page', $currentPage);
        
        // Pass the user progress data to the view
        return view('frontend.questions', compact('section', 'questions', 'allSections', 'progress'));
    }

    /**
     * Handle the user saving their progress for a quiz question.
     */
    public function saveProgress(Request $request)
    {
        $request->validate([
            'section_id' => 'required|exists:course_sections,id',
            'question_id' => 'required|exists:questions,id',
        ]);

        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'User not authenticated.'], 401);
        }

        UserProgress::updateOrCreate(
            ['user_id' => $user->id, 'course_section_id' => $request->section_id],
            ['last_question_id' => $request->question_id]
        );

        return response()->json(['success' => 'Progress saved successfully!']);
    }

    /**
     * Handle the user resetting their progress for a region.
     */
    public function resetProgress($id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to reset your progress.');
        }

        UserProgress::where('user_id', $user->id)
                    ->where('course_section_id', $id)
                    ->delete();

        return redirect()->route('courses.show', $id)->with('success', 'Your progress has been reset.');
    }
}

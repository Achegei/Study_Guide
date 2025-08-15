<?php

namespace App\Http\Controllers\CanadianCitizenship;

use App\Http\Controllers\Controller;
use App\Models\CourseSection;
use App\Models\Question; // Assuming this is your Citizenship Question model
use App\Models\UserProgress; // Corrected: Using UserProgress for citizenship progress
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class CourseController extends Controller
{
    /**
     * Display a listing of the course sections (regions).
     */
    public function index()
    {
        $sections = CourseSection::all();
        $user = Auth::user();
        // Fetch user course progress specific to course sections using the correct model
        $userCourseProgress = $user ? UserProgress::where('user_id', $user->id)->get()->keyBy('course_section_id') : collect();

        return view('frontend.canadian-citizenship.courses', compact('sections', 'userCourseProgress'));
    }

    /**
     * Display the questions for a specific course section.
     *
     * @param int $id The ID of the CourseSection.
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show($id, Request $request)
    {
        $section = CourseSection::findOrFail($id);
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to view quizzes and track progress.');
        }

        // Fetch user's progress for this specific section using UserProgress
        $progress = UserProgress::firstOrNew([
            'user_id' => $user->id,
            'course_section_id' => $section->id,
        ]);

        if (!$progress->exists) {
            $progress->last_question_id = 0;
            $progress->save();
        }

        $allQuestions = Question::where('course_section_id', $section->id)->get();
        $questionsCount = $allQuestions->count();

        $lastQuestionId = $progress->last_question_id ?? 0;
        $startQuestionIndex = 0;

        if ($lastQuestionId > 0) {
            $lastAnsweredQuestion = $allQuestions->firstWhere('id', $lastQuestionId);
            if ($lastAnsweredQuestion) {
                $index = $allQuestions->search(function ($q) use ($lastQuestionId) {
                    return $q->id == $lastQuestionId;
                });
                if ($index !== false && ($index + 1) < $questionsCount) {
                    $startQuestionIndex = $index + 1;
                } else if ($index !== false && ($index + 1) === $questionsCount) {
                    $startQuestionIndex = $index;
                }
            }
        }
        
        $questionsPerPage = 1;
        $currentPage = (int) ($request->query('page', 1));

        $targetPage = (int) floor($startQuestionIndex / $questionsPerPage) + 1;
        if ($currentPage < $targetPage) {
             return redirect()->route('courses.show', ['id' => $id, 'page' => $targetPage]);
        }

        $currentQuestions = $allQuestions->slice(($currentPage - 1) * $questionsPerPage, $questionsPerPage);

        $questions = new LengthAwarePaginator(
            $currentQuestions,
            $questionsCount,
            $questionsPerPage,
            $currentPage,
            ['path' => $request->url()]
        );

        $allSections = CourseSection::all();

        return view('frontend.questions', compact('section', 'questions', 'allSections', 'progress'));
    }

    /**
     * Save user progress for a citizenship question.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveProgress(Request $request)
    {
        $request->validate([
            'section_id' => 'required|exists:course_sections,id',
            'question_id' => 'required|exists:questions,id',
        ]);

        $user = Auth::user();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $progress = UserProgress::firstOrNew([ // Corrected: Using UserProgress
            'user_id' => $user->id,
            'course_section_id' => $request->section_id,
        ]);

        if ($progress->last_question_id < $request->question_id) {
            $progress->last_question_id = $request->question_id;
            $progress->save();
            return response()->json(['success' => true, 'message' => 'Progress saved.']);
        }

        return response()->json(['success' => true, 'message' => 'Progress is already at or beyond this question.']);
    }

    /**
     * Reset user progress for a specific course section.
     *
     * @param int $id The ID of the CourseSection to reset.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetProgress($id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to reset progress.');
        }

        $progress = UserProgress::where('user_id', $user->id) // Corrected: Using UserProgress
                                       ->where('course_section_id', $id)
                                       ->first();

        if ($progress) {
            $progress->delete();
            return redirect()->route('courses.show', $id)->with('success', 'Your progress for this region has been reset! You can now start from question 1.');
        }

        return redirect()->route('courses.show', $id)->with('error', 'No progress found to reset for this region.');
    }
}

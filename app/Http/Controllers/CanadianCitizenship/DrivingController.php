<?php

namespace App\Http\Controllers\CanadianCitizenship;

use App\Http\Controllers\Controller;
use App\Models\DrivingSection;
use App\Models\DrivingQuestion;
use App\Models\UserDrivingProgress; // Make sure this model exists
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DrivingController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the driving sections (regions).
     */
    public function index()
    {
        // ✅ Apply policy check for viewing any DrivingSection.
        // This ensures only authorized users (e.g., logged-in) can see the list.
        $this->authorize('viewAny', DrivingSection::class);

        $sections = DrivingSection::all();
        $user = Auth::user();
        $userDrivingProgress = $user ? UserDrivingProgress::where('user_id', $user->id)->get()->keyBy('driving_section_id') : collect();

        return view('frontend.driving-courses', compact('sections', 'userDrivingProgress'));
    }

    /**
     * Display the questions for a specific driving section.
     *
     * @param int $id The ID of the DrivingSection.
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show($id, Request $request)
    {
        $section = DrivingSection::findOrFail($id);
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to view quizzes and track progress.');
        }

        // ✅ Apply policy check for viewing this specific DrivingSection.
        // This ensures the authenticated user has access to THIS particular driving section.
        $this->authorize('view', $section);

        $progress = UserDrivingProgress::firstOrNew([
            'user_id' => $user->id,
            'driving_section_id' => $section->id,
        ]);

        if (!$progress->exists) {
            $progress->last_question_id = 0;
            $progress->save();
        }

        $allQuestions = DrivingQuestion::where('driving_section_id', $section->id)->get();
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
             return redirect()->route('driving.show', ['id' => $id, 'page' => $targetPage]);
        }

        $currentQuestions = $allQuestions->slice(($currentPage - 1) * $questionsPerPage, $questionsPerPage);

        $questions = new LengthAwarePaginator(
            $currentQuestions,
            $questionsCount,
            $questionsPerPage,
            $currentPage,
            ['path' => $request->url()]
        );


        $allSections = DrivingSection::all();

        return view('frontend.driving-questions', compact('section', 'questions', 'allSections', 'progress'));
    }

    /**
     * Save user progress for a driving question.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveProgress(Request $request)
    {
        $request->validate([
            'section_id' => 'required|exists:driving_sections,id',
            'question_id' => 'required|exists:driving_questions,id',
        ]);

        $user = Auth::user();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $progress = UserDrivingProgress::firstOrNew([
            'user_id' => $user->id,
            'driving_section_id' => $request->section_id,
        ]);

        if ($progress->last_question_id < $request->question_id) {
            $progress->last_question_id = $request->question_id;
            $progress->save();
            return response()->json(['success' => true, 'message' => 'Progress saved.']);
        }
        return response()->json(['success' => true, 'message' => 'Progress is already at or beyond this question.']);
    }

    /**
     * Reset user progress for a specific driving section.
     *
     * @param int $id The ID of the DrivingSection to reset.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetProgress($id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to reset progress.');
        }

        $progress = UserDrivingProgress::where('user_id', $user->id)
                                       ->where('driving_section_id', $id)
                                       ->first();

        if ($progress) {
            $progress->delete();
            return redirect()->route('driving.show', $id)->with('success', 'Your progress for this driving region has been reset! You can now start from question 1.');
        }

        return redirect()->route('driving.show', $id)->with('error', 'No progress found to reset for this driving region.');
    }
}

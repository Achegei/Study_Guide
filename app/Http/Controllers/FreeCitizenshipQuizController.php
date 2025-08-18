<?php

namespace App\Http\Controllers;

use App\Models\FreeQuiz; // Import the FreeQuiz model
use Illuminate\Http\Request;

class FreeCitizenshipQuizController extends Controller // Make sure this is the correct class name for citizenship
{
    /**
     * Display the free citizenship quiz questions.
     *
     * @return \Illuminate\View\View
     */
    public function showQuiz()
    {
        // ✅ Fetch only questions with 'citizenship' type
        $freeQuizzes = FreeQuiz::where('type', 'citizenship')
                               ->with('options')
                               ->get();

        return view('frontend.free-quiz', compact('freeQuizzes')); // Ensure this view name is correct for citizenship
    }

    /**
     * Handle the submission of a free citizenship quiz question.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submitQuiz(Request $request)
    {
        return response()->json(['message' => 'Citizenship quiz answer processed (client-side feedback).', 'success' => true]);
    }
}

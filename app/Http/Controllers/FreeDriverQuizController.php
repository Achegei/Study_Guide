<?php

namespace App\Http\Controllers;

use App\Models\FreeQuiz; // Import the FreeQuiz model
use Illuminate\Http\Request;

class FreeDriverQuizController extends Controller
{
    /**
     * Display the free driving quiz questions.
     *
     * @return \Illuminate\View\View
     */
    public function showQuiz()
    {
        // ✅ Fetch only questions with 'driving_general' or 'driving_road_sign' type
        $freeQuizzes = FreeQuiz::whereIn('type', ['driving_general', 'driving_road_sign'])
                               ->with('options')
                               ->get();

        return view('frontend.free-driver-quiz', compact('freeQuizzes'));
    }

    /**
     * Handle the submission of a free driving quiz question.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submitQuiz(Request $request)
    {
        return response()->json(['message' => 'Driving quiz answer processed (client-side feedback).', 'success' => true]);
    }
}

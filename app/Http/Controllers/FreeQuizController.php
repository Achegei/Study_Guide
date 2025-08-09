<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FreeQuiz; // Make sure to import your FreeQuiz model

class FreeQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showQuiz()
    {
        // This is the important part!
        // We fetch all quizzes and eager-load their options.
        $freeQuizzes = FreeQuiz::with('options')->get();

        // We then pass the fetched data to the 'frontend.free-quiz' view.
        return view('frontend.free-quiz', compact('freeQuizzes'));
    }

    // You can add other methods for submitting the quiz here later
    // public function submitQuiz(Request $request)
    // {
    //     // Logic for handling submitted answers
    // }
}


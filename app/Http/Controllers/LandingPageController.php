<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class LandingPageController extends Controller
{
    public function home()
    {
        $testimonials = Testimonial::where('approved', true)->latest()->take(10)->get();
        return view('welcome', compact('testimonials'));
    }
}

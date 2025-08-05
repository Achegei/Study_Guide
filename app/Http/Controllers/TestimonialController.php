<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        Testimonial::create([
            'name' => $validated['name'],
            'location' => $validated['location'] ?? null,
            'content' => $validated['content'],
            'approved' => false, // moderation
        ]);

        return back()->with('success', 'Thank you for your feedback! We’ll review it shortly.');
    }
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10); // or ->get() if you don’t want pagination
        return view('pages.testimonials', compact('testimonials'));
    }



}

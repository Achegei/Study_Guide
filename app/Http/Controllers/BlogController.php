<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(5);
        return view('pages.citizenship-info', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->with(['comments' => function ($q) {
            $q->whereNull('parent_id')->with('replies')->orderBy('created_at');
            }])
            ->firstOrFail();

        return view('pages.blog-single', compact('blog'));
    }


   public function storeComment(Request $request, Blog $blog)
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'comment' => 'required|string',
                'parent_id' => 'nullable|exists:comments,id',
            ]);

            $blog->comments()->create($validated);

            return back()->with('success', 'Comment submitted successfully!');
        }


}

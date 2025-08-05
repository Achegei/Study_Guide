<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Store a new comment or reply.
     */
    public function store(Request $request, Blog $blog)
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

    /**
     * Show edit form for a comment (optional if only admin can do it).
     */
    public function edit(Comment $comment)
    {
        // return view('comments.edit', compact('comment'));
    }

    /**
     * Update a comment.
     */
    public function update(Request $request, Comment $comment)
    {
        // Validation and update logic here
    }

    /**
     * Delete a comment (or mark it as soft-deleted).
     */
    public function destroy(Comment $comment)
    {
        // $comment->delete();
        // return back()->with('success', 'Comment deleted.');
    }

    /**
     * Approve a comment (optional for admin panel).
     */
    public function approve(Comment $comment)
    {
        $comment->update(['approved' => true]);
        return back()->with('success', 'Comment approved.');
    }
}

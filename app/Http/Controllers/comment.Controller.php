<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Show the comment form (optional if using route/view directly)
     */
    public function create()
    {
        return view('submit.comment'); // Replace with your actual Blade file
    }

    /**
     * Store the submitted comment
     */
    

    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'category' => 'required|in:1,2', // 1 = general, 2 = integrity
            'comment' => 'required|string|max:1000',
        ]);

        // Save to database
        Comment::create([
            'category' => $validated['category'],
            'comment' => $validated['comment'],
        ]);

        // Redirect back with success message
        return back()->with('success', 'Your comment has been submitted successfully.');
    }
}

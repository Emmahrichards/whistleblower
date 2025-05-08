<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Exports\CommentsExport;
use Maatwebsite\Excel\Facades\Excel;

class CommentController extends Controller
{
    /**
     * Show the comment form (optional if using route/view directly)
     */
    public function create()
    {
        return view('comment'); // Replace with your actual Blade file
    }

    /**
     * Store the submitted comment
     */public function downloadExcel()
{
    return Excel::download(new CommentsExport, 'comments.xlsx');
}
    

     public function store(Request $request)
     {
         try {
             $validated = $request->validate([
                 'category' => 'required|in:1,2',
                 'comment' => 'required|string|max:1000',
             ]);
     
             \App\Models\Comment::create($validated);
     
             return response()->json(['success' => true]);
     
         } catch (\Illuminate\Validation\ValidationException $e) {
             return response()->json([
                 'success' => false,
                 'errors' => $e->errors(),
             ], 422);
         } catch (\Exception $e) {
             return response()->json([
                 'success' => false,
                 'message' => 'Unexpected error: ' . $e->getMessage(),
             ], 500);
         }
     }
    }
     
<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CommentsExport;
use PDF;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    // Show the list of comments (issues)
    public function index()
    {
        $comments = Comment::all(); // Fetch all comments from the database
        return view('issue', compact('comments')); // Return view with comments
    }

    // Download the comments as Excel
    public function downloadExcel()
    {
        return Excel::download(new CommentsExport, 'comments.xlsx'); // Use the CommentsExport class to export data
    }

    // Download the comments as PDF
    public function downloadPDF()
    {
        $comments = Comment::all(); // Fetch all comments from the database
        $pdf = PDF::loadView('pdf.comments', compact('comments')); // Load the PDF view with the comments data
        return $pdf->download('comments.pdf'); // Return the generated PDF for download
    }
}

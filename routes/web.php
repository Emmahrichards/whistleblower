<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\UserController;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home page or comment form for anonymous users
//Route::get('/submit-comment', [CommentController::class, 'create'])->name('submit.comment');
//Route::get('/user/dashboard', [UserController::class, 'index'])->name('admin.dashboard');
//Public Routes
Route::get('/', [CommentController::class, 'create'])->name('comment.form');
Route::post('/submit-comment', [CommentController::class, 'store'])->name('submit.comment');

// ✅ Login route (this fixes the Route [login] not defined error)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// ✅ Optional: POST login route (if you're handling login logic)
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/issue', [IssueController::class, 'index'])->name('issue');
// Protected Routes (require authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/issue', [IssueController::class, 'index'])->name('issue');
    Route::get('/download/excel', [IssueController::class, 'downloadExcel'])->name('download.excel');
    Route::get('/download/pdf', [IssueController::class, 'downloadPDF'])->name('download.pdf');
    Route::get('/export-comments', function () {
        return Excel::download(new CommentsExport, 'comments.xlsx');
    });
});
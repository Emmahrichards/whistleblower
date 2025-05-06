<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home page or comment form for anonymous users
Route::get('/comment', [CommentController::class, 'create'])->name('comment.form');
Route::post('/submit-comment', [CommentController::class, 'store'])->name('submit.comment');

// ------------------------
// Admin Authentication
// ------------------------

// Show admin login form
Route::get('/login', [LoginController::class, 'login'])->name('user.submit');


// Handle admin login
Route::post('/user/login', [LoginController::class, 'login'])->name('login');

// Admin logout
Route::post('/user/logout', [LoginController::class, 'logout'])->name('logout');

// ------------------------
// Admin Panel (Protected)
// ------------------------

Route::middleware(['auth'])->group(function () {
    
    // Admin dashboard (only for is_admin = true)
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    // Delete comment
    //Route::delete('/admin/comments/{id}', [AdminController::class, 'destroy'])->name('admin.comments.destroy');
});


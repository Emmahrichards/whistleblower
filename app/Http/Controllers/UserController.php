<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    // Admin dashboard view
    public function index()
    {
        return view('comment'); // Replace 'dashboard' with your actual Blade view
    }
}

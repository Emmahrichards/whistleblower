<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form
     */
    public function showLoginForm()
    {
        return view('user.login'); // Your login blade goes here
    }

    /**
     * Handle login form submission
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Check if user is admin
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.dashboard');
            }

            Auth::logout();
            return redirect()->route('login.form')->withErrors([
                'email' => 'Access denied. You are not an admin.',
            ]);
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    /**
     * Logout user
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}

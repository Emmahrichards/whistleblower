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
        return view('login'); // Your login blade goes here
    }

    /**
     * Handle login form submission
     */
    protected function authenticated(Request $request, $user)
{
    return redirect()->route('login'); // Redirect to the 'issue' route after login
}
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Regenerate the session to prevent session fixation
            $request->session()->regenerate();
    
            // Redirect to the intended page or default to 'home'
            return redirect()->intended(route('home'));
        }
    
        // If login fails, return with an error message
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('login.form');
    }
}

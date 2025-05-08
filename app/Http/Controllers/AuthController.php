<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Redirect to the issue page after login
            return redirect()->route('issue'); // Ensure 'issue' route exists
        }
    
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'))) {
            // Regenerate session
            $request->session()->regenerate();
            
            // Redirect to intended location or homepage;  
            // so 👉 “Redirect the user **to the page they originally 
            // wanted to visit**,  _or_  (if that’s not available) **fallback to / (the homepage)**.”
            return redirect()->intended('/');
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
        
		// Show the error in the blade!
		// @if ($errors->has('email'))
		//    <div class="alert alert-danger">
		//        {{ $errors->first('email') }}
		//    </div>
		// @endif
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate user input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to home page with success message
        return redirect('/register')->with('success', 'Registration successful!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // Redirect to the login page
        // with a success message   
        return redirect('/login')->with('success', 'Logged out successfully!');
    }
}
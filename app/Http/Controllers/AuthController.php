<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function userLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('registrasi.index'); // Redirect to registration page
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate(); // Corrected typo here

        if (Auth::user()->is_admin) {
            return redirect()->route('admin.login'); // Use named route for admin dashboard
        }

        return redirect()->route('user.login');

    }

    public function adminLoginPage()
    {
        return view('admin.login'); // Return the admin login view
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('penulis.index'); // Use named route for admin dashboard
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out
        return redirect('/'); // Redirect to the welcome page
    }
}

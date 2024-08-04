<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthenticationController extends Controller
{
    public function authenticate(Request $request)
    {
        Log::info('Login attempt:', $request->only('email'));

        $credentials = $request->only('email', 'password');

        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        Log::info('Credentials:', $credentials);

        if (Auth::attempt($credentials)) {
            Log::info('Login successful for:', ['email' => $request->input('email')]);
            // return redirect()->intended('dashboard');
            dd("success");
        } else {
            Log::warning('Login failed for:', ['email' => $request->input('email')]);
            return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
        }
    }

}

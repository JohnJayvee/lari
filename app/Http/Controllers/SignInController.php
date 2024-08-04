<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class SignInController extends Controller
{
    public function signin(Request $request)
    {
        return view('user.login');
    }

    public function signup(Request $request)
    {
        return view('user.signup');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'full_name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'beneficiary_name' => 'required',
            'address' => 'required',
            'primary_contact' => 'required',
            'secondary_contact' => 'nullable',
        ]);

        // Create a new user
        $user = new Personal();
        $user->full_name = $request->input('full_name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->beneficiary_name = $request->input('beneficiary_name');
        $user->address = $request->input('address');
        $user->primary_contact = $request->input('primary_contact');
        $user->secondary_contact = $request->input('secondary_contact');
        $user->save();

        // Redirect to a success page or login page
        return redirect()->route('userLogin')->with('success', 'Registration successful!');
    }
}

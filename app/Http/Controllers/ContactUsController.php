<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function show(Request $request)
    {
        return view('website.pages.contact-us');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Create a new user
        $user = new Message();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->subject = $request->input('subject');
        $user->message = $request->input('message');

        $user->save();

        // Redirect to a success page or login page
        return redirect()->route('contact-us')->with('success', 'Registration successful!');
    }
}

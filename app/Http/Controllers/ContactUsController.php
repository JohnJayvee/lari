<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function show(Request $request) {
        return view('website.templates.master');
    }
}

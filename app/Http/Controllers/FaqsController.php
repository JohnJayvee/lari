<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function show(Request $request) {
        return view('website.pages.faqs');
    }
}

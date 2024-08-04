<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsAndConditionController extends Controller
{
    public function show(Request $request) {
        return view('website.pages.terms-and-condition.terms-and-conditions');
    }

}


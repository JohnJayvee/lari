<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function show(Request $request) {
        $data['plans'] = DB::table('usersplantable')->get();
        
        return view('website.pages.home',$data);
    }

}

<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;

class UserController extends Controller
{

    protected $moduleId;

    public function __construct() {
        $this->moduleId = 4;
    }


    public function authenticate(Request $request) {
        $username = strtolower($request->username);
        $password = strtolower($request->password);

        $authenticated = DB::table('userstable')->where('username', '=', $username)->where('unhashedpassword', '=', $password)->first();
        $user_blocked =  DB::table('userstable')->where('username', '=', $username)->where('unhashedpassword', '=', $password)->where('blocked',1)->first();
        
        if ($authenticated) {
            if($user_blocked) {
                return redirect()->back()->with(['login_warning' => 1, 'title' => 'Authentication', 'message' => 'Account Blocked.']);
            }else {
                Auth::loginUsingId($authenticated->UserID);
                return redirect('dashboard')->with(['login_success' => 1, 'title' => 'Authentication', 'message' => 'Login Success!']);
            }
        }

        return redirect()->back()->with(['login_failed' => 1, 'title' => 'Authentication', 'message' => 'Invalid username or password!']);
    }


    
    public function login(Request $request) {
        return view('admin.login');
    }

    public function show(Request $request) {
        $data['mid'] = $this->moduleId;

        $data['users'] = DB::table('userstable')
            ->join('userleveltable', 'userstable.userlevel', '=', 'userleveltable.userlevelid')
            ->select(
                'userstable.userid',
                'userstable.name',
                'userstable.username',
                'userleveltable.uleveldescription',
                'userstable.blocked'
                )
            ->orderBy('userstable.name','ASC')
            ->paginate(10);

        return view('lari_maintenance.user.user', $data);
    }


    
    public function delete(Request $request) {
        $data['confirm'] =  DB::table('userstable')
            ->where('userstable.unhashedpassword', '=', $request->unhashedpassword)
            ->first();

        if( $data['confirm']) {         
            $data['delete'] =  DB::table('userstable')
            ->where('userstable.userid', '=', $request->id)
            ->delete();

            return redirect()->back()->with(['success' => 1, 'title' => 'Done', 'message' => 'Successfully Deleted!']);
        }else
            return redirect()->back()->with(['warning' => 1,'title' => 'Access denied!', 'message' => 'Incorrect security code!']);

    }

    

    public function update(Request $request) {
        $data['confirm'] =  DB::table('userstable')
            ->where('userstable.userlevel', 1)
            ->where('userstable.unhashedpassword',$request->unhashedpassword)
            ->first();

        $existing_user =  DB::table('userstable')
            ->where('unhashedpassword','=',$request->unhashedpassword)
            ->where('Username','=',$request->Username)
            ->first();

        if($data['confirm'] && !$existing_user) {  
            $data['update'] =  DB::table('userstable')
            ->where('userstable.userid', '=', $request->id)
            ->update([
                'FirstName' => $request->firstname,
                'MiddleName' => $request->middlename,
                'LastName' => $request->lastname,
                'Name' => $request->lastname.", ".$request->firstname." ".$request->middlename,
                'username' => $request->username,
                'password' => $request->password,
                'unhashedpassword' => $request->password,
                'userlevel' => $request->userlevel,
                'dateadded' => Now(),
            ]);

            return redirect()->back()->with(['success' => 1, 'title' => 'Done', 'message' => 'Successfully Updated!']);

        }else if($existing_user){
            return redirect()->back()->with(['warning' => 1, 'title' => 'Warning', 'message' => 'User already exists!']);
        }
            return redirect()->back()->with(['warning' => 1,'title' => 'Access denied!', 'message' => 'Incorrect admin code!']);

    }


    public function create(Request $request) {
        $data['confirm'] =  DB::table('userstable')
            ->where('userstable.userlevel',1)
            ->where('userstable.unhashedpassword',$request->unhashedpassword)
            ->first();

        $existing_user =  DB::table('userstable')
            ->where('unhashedpassword',$request->unhashedpassword)
            ->where('username',$request->username)
            ->first();

        if($data['confirm'] && !$existing_user) {  
            $data['create'] =  DB::table('userstable')
            ->insert([
                'FirstName' => $request->firstname,
                'MiddleName' => $request->middlename,
                'LastName' => $request->lastname,
                'Name' => $request->lastname.", ".$request->firstname." ".$request->middlename,
                'username' => $request->username,
                'password' => $request->password,
                'unhashedpassword' => $request->password,
                'userlevel' => $request->userlevel,
                'dateadded' => Now(),
            ]);

            return redirect()->back()->with(['success' => 1, 'title' => 'Done', 'message' => 'Successfully Created!']);

        }else if($existing_user){
            return redirect()->back()->with(['warning' => 1, 'title' => 'Warning', 'message' => 'User already exists!']);
        }
            return redirect()->back()->with(['warning' => 1,'title' => 'Access denied!', 'message' => 'Incorrect admin code!']);

    }


    
    public function add(Request $request) {
        $data['level'] =  DB::table('userleveltable')
            ->select([
                'userleveltable.userlevelid',
                'userleveltable.userlevel',
                'userleveltable.uleveldescription'
                ])
            ->get();

        return view('lari_maintenance.user.add_modal', $data);
    }



    public function confirm(Request $request) {
        $data['id'] = $request->id;
        $data['action'] = route('user.delete');
        $data['message'] = 'Do you want to delete?';
        return view('modals.modal_security_code',$data);
    }


    public function blocking(Request $request) {
        $data['id'] = $request->id;
        $check = DB::table('userstable')
        ->join('userleveltable', 'userstable.userlevel', '=', 'userleveltable.userlevelid')
        ->select(
            'userstable.userid',
            'userstable.blocked',
            'userstable.name',
            )
        ->where('userstable.userid', '=', $request->id)
        ->first();

        if($check->blocked == 1) {
            $data['action'] = route('user.unblock');
            $data['message'] = 'Do you want to unblock '.$check->name.'?';
        }else {
            $data['action'] = route('user.block');
            $data['message'] = 'Do you want to  block '.$check->name.'?';
        }

        return view('modals.modal_security_code',$data);
    }
    


    public function block(Request $request) {
        $data['confirm'] =  DB::table('userstable')
        ->where('userstable.userlevel',1)
        ->where('userstable.unhashedpassword', '=', $request->unhashedpassword)
        ->first();

        if($data['confirm']) {  
            $data['update'] =  DB::table('userstable')
            ->where('userstable.userid', $request->id)
            ->update(['userstable.blocked' => 1]);

            return redirect()->back()->with(['success' => 1, 'title' => 'Done', 'message' => 'User blocked!']);   
        }
            return redirect()->back()->with(['warning' => 1,'title' => 'Access denied!', 'message' => 'Incorrect security code!']);

    }


    public function unblock(Request $request) {
        $data['confirm'] =  DB::table('userstable')
        ->where('userstable.userlevel',1)
        ->where('userstable.unhashedpassword', '=', $request->unhashedpassword)
        ->first();

        if($data['confirm']) {  
            $data['update'] =  DB::table('userstable')
            ->where('userstable.userid', $request->id)
            ->update(['userstable.blocked' => 0]);

            return redirect()->back()->with(['success' => 1, 'title' => 'Done', 'message' => 'User unblock!']); 
        }
            return redirect()->back()->with(['warning' => 1,'title' => 'Access denied!', 'message' => 'Incorrect security code!']);

    }



    public function edit(Request $request) {
        $data['users'] = DB::table('userstable')
            ->join('userleveltable', 'userstable.userlevel', '=', 'userleveltable.userlevel')
            ->select(
                'userstable.userid',
                'userstable.firstname',
                'userstable.middlename',
                'userstable.lastname',
                'userstable.username',
                'userstable.userlevel',
                'userstable.password',
                'userstable.unhashedpassword',
                'userleveltable.userlevel',
                'userleveltable.uleveldescription',
                )
            ->where('userstable.userid', '=', $request->id)
            ->first();
            

        $data['level'] =  DB::table('userleveltable')
            ->select([
                'userleveltable.userlevelid',
                'userleveltable.userlevel',
                'userleveltable.uleveldescription',
                ])
            ->get();

        if($data['users'] ) {
            return view('lari_maintenance.user.edit_modal', $data);
        }
            return response()->json(['failed' => 1,'message' => 'Failed to fetch.'],500);
    }

    

    
    public function search(Request $request) {
        $search = $request->query('query');
        $data['users'] = DB::table('userstable')
            ->join('userleveltable', 'userstable.userlevel', '=', 'userleveltable.userlevel')
            ->select(
                'userstable.userid',
                'userstable.name',
                'userstable.username',
                'userleveltable.uleveldescription',
                'userstable.blocked'
                )
            ->where('userstable.name', 'like', '%' . $search . '%')
            ->orderBy('userstable.name','ASC')
            ->paginate(10);

        return view('lari_maintenance.user.user', $data);
    }


    public function logout(Request $request) {
        Auth::logout();
        if(!Auth::check()){
            return redirect('/');
        }
    }

}

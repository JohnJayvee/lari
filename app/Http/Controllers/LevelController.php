<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;

class LevelController extends Controller
{
    protected $moduleId;

    public function __construct() {
        $this->moduleId = 5;
    }

    public function show(Request $request) {
        $data['mid'] = $this->moduleId;

        $data['level'] = DB::table('userleveltable')
            ->select(
                'userleveltable.userlevelid',
                'userleveltable.userlevel',
                'userleveltable.uleveldescription',
                )
            ->orderBy('userleveltable.userlevelid','ASC')
            ->paginate(10);

        return view('lari_maintenance.level.level', $data);
    }


    public function delete(Request $request) {
        $data['confirm'] =  DB::table('userstable')
            ->where('userstable.unhashedpassword', '=', $request->unhashedpassword)
            ->first();

        if($data['confirm']) {         

            $data['delete'] =  DB::table('userleveltable')
            ->where('userleveltable.userlevelid', '=', $request->id)
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

        $existing_level =  DB::table('userleveltable')
            ->where('uleveldescription','=',$request->level)
            ->first();

        if($data['confirm'] && !$existing_level) {  
            $data['update'] =  DB::table('userleveltable')
            ->where('userleveltable.userlevelid', '=', $request->id)
            ->update([
                'uleveldescription' => $request->level,
            ]);

            return redirect()->back()->with(['success' => 1, 'title' => 'Done', 'message' => 'Successfully Updated!']);

        }else if($existing_level){
            return redirect()->back()->with(['warning' => 1, 'title' => 'Warning', 'message' => 'level already exists!']);
        }
            return redirect()->back()->with(['warning' => 1,'title' => 'Access denied!', 'message' => 'Incorrect security code!']);
    }


    public function create(Request $request) {
        $data['confirm'] =  DB::table('userstable')
            ->where('userstable.userlevel',1)
            ->where('userstable.unhashedpassword',$request->unhashedpassword)
            ->first();

        $new_level_id =  DB::table('userleveltable')->max('userleveltable.userlevel') + 1;

        $existing_level =  DB::table('userleveltable')
            ->where('userleveltable.uleveldescription','=',$request->level)
            ->first();


        if($data['confirm'] && !$existing_level) {  
            $data['update'] =  DB::table('userleveltable')
            ->insert([
                'userleveltable.userlevel' =>  $new_level_id,
                'userleveltable.uleveldescription' => $request->level,
            ]);

            return redirect()->back()->with(['success' => 1, 'title' => 'Done', 'message' => 'Successfully Created!']);

        }else if($existing_level){
            return redirect()->back()->with(['warning' => 1, 'title' => 'Warning', 'message' => 'level already exists!']);
        }
        return redirect()->back()->with(['warning' => 1,'title' => 'Access denied!', 'message' => 'Incorrect security code!']);


    }


    
    public function add(Request $request) {
        return view('lari_maintenance.level.add_modal');
    }



    public function confirm(Request $request) {
        $data['id'] = $request->id;
        $data['action'] = route('level.delete');
        $data['message'] = 'Do you want to delete?';
        return view('modals.modal_security_code',$data);
    }

    public function edit(Request $request) {
        $data['level'] = DB::table('userleveltable')
            ->select(
                'userleveltable.userlevel',
                'userleveltable.userlevelid',
                'userleveltable.uleveldescription',
                )
            ->where('userleveltable.userlevelid', '=', $request->id)
            ->first();
            

        if($data['level'] ) {
            return view('lari_maintenance.level.edit_modal', $data);
        }
            return response()->json(['failed' => 1,'message' => 'Failed to fetch.'],500);
    }

    

    
    public function search(Request $request) {
        $search = $request->query('query');
        $data['level'] = DB::table('userleveltable')
            ->select(
                'userleveltable.userlevelid',
                'userleveltable.userlevel',
                'userleveltable.uleveldescription',
                )
            ->where('userleveltable.uleveldescription', 'like', '%' . $search . '%')
            ->orderBy('userleveltable.userlevel','ASC')
            ->paginate(10);

        return view('lari_maintenance.level.level', $data);
    }



}

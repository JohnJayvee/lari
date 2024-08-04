<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;

class PermissionsController extends Controller
{
    protected $moduleId;

    public function __construct() {
        $this->moduleId = 7;
    }

    public function show(Request $request) {
        $data['mid'] = $this->moduleId;

        $data['permissions'] = DB::table('permissiontable')
            ->leftjoin('moduletable', 'permissiontable.moduleid', '=', 'moduletable.moduleid')
            ->select(
                'permissiontable.permissionid',
                'moduletable.moduleid',
                'moduletable.modulename',
                'permissiontable.canview',
                'permissiontable.canedit',
                'permissiontable.canadd',
                'permissiontable.candelete',
                'permissiontable.canprint',
                )
            ->where('permissiontable.userlevelid','=',1)
            ->orderBy('permissiontable.moduleid','ASC')
            ->paginate(10);

            
        $data['access_level'] = DB::table('userleveltable')
            ->select(
                'userleveltable.userlevelid',
                'userleveltable.userlevel',
                'userleveltable.uleveldescription',
                )
            ->orderBy('userleveltable.userlevelid','ASC')
            ->get();


        return view('lari_maintenance.permissions.permissions', $data);
    }


    public function delete(Request $request) {
        $data['confirm'] =  DB::table('userstable')
            ->where('userstable.unhashedpassword', '=', $request->unhashedpassword)
            ->first();

        if($data['confirm']) {         
            $data['delete'] =  DB::table('permissiontable')
            ->where('permissiontable.planid', '=', $request->id)
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


        if($data['confirm']) {  
            $data['update'] =  DB::table('permissiontable')
            ->where('permissiontable.planid', '=', $request->id)
            ->update([
                'plantitle' => $request->plantitle,
                'planprice' => $request->planprice,
            ]);

            return redirect()->back()->with(['success' => 1, 'title' => 'Done', 'message' => 'Successfully Updated!']);

        }
            return redirect()->back()->with(['warning' => 1,'title' => 'Access denied!', 'message' => 'Incorrect security code!']);
    }


    public function create(Request $request) {
        $data['confirm'] =  DB::table('userstable')
        ->where('userstable.userlevel', 1)
        ->where('userstable.unhashedpassword',$request->unhashedpassword)
        ->first();


    if($data['confirm']) {  
        $data['update'] =  DB::table('permissiontable')
        ->insert([
            'plantitle' => $request->plantitle,
            'planprice' => $request->planprice,
        ]);

        return redirect()->back()->with(['success' => 1, 'title' => 'Done', 'message' => 'Successfully Created!']);

    }
        return redirect()->back()->with(['warning' => 1,'title' => 'Access denied!', 'message' => 'Incorrect security code!']);


    }


    
    public function add(Request $request) {
        return view('lari_maintenance.permissions.add_modal');
    }



    public function confirm(Request $request) {
        $data['id'] = $request->id;
        $data['action'] = route('permissions.delete');
        $data['message'] = 'Do you want to delete?';
        return view('modals.modal_security_code',$data);
    }



    public function edit(Request $request) {
        $data['permissions'] = DB::table('permissiontable')
            ->select(
                'permissiontable.planid',
                'permissiontable.plantitle',
                'permissiontable.planprice',
                )
            ->where('permissiontable.planid', '=', $request->id)
            ->first();


        if($data['permissions'] ) {
            return view('lari_maintenance.permissions.edit_modal', $data);
        }
            return response()->json(['failed' => 1,'message' => 'Failed to fetch.'],500);
    }

    

    
    public function search(Request $request) {
        $search = $request->query('query');
        $levelid = $request->query('levelid');

        $data['permissions'] = DB::table('permissiontable')
            ->leftjoin('moduletable', 'permissiontable.moduleid', '=', 'moduletable.moduleid')
            ->select(
                'permissiontable.permissionid',
                'moduletable.moduleid',
                'moduletable.modulename',
                'permissiontable.canview',
                'permissiontable.canedit',
                'permissiontable.canadd',
                'permissiontable.candelete',
                'permissiontable.canprint',
                )
            ->where('moduletable.modulename', 'like', '%' . $search . '%')
            ->where('permissiontable.userlevelid', 'like', '%' . $levelid . '%')
            ->orderBy('permissiontable.moduleid','ASC')
            ->paginate(10);

                        
        $data['access_level'] = DB::table('userleveltable')
            ->select(
                'userleveltable.userlevelid',
                'userleveltable.userlevel',
                'userleveltable.uleveldescription',
                )
            ->orderBy('userleveltable.userlevelid','ASC')
            ->get();
            
        return view('lari_maintenance.permissions.permissions', $data);
    }



}

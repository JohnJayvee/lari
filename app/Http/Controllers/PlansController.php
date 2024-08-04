<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;

class PlansController extends Controller
{
    protected $moduleId;

    public function __construct() {
        $this->moduleId = 6;
    }

    public function show(Request $request) {
        $data['mid'] = $this->moduleId;

        $data['plans'] = DB::table('usersplantable')
            ->select(
                'usersplantable.planid',
                'usersplantable.plantitle',
                'usersplantable.planprice',
                )
            ->orderBy('usersplantable.planid','ASC')
            ->paginate(10);

        return view('lari_maintenance.plans.plans', $data);
    }


    public function delete(Request $request) {
        $data['confirm'] =  DB::table('userstable')
            ->where('userstable.unhashedpassword', '=', $request->unhashedpassword)
            ->first();

        if($data['confirm']) {         
            $data['delete'] =  DB::table('usersplantable')
            ->where('usersplantable.planid', '=', $request->id)
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
            $data['update'] =  DB::table('usersplantable')
            ->where('usersplantable.planid', '=', $request->id)
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
        $data['update'] =  DB::table('usersplantable')
        ->insert([
            'plantitle' => $request->plantitle,
            'planprice' => $request->planprice,
        ]);

        return redirect()->back()->with(['success' => 1, 'title' => 'Done', 'message' => 'Successfully Created!']);

    }
        return redirect()->back()->with(['warning' => 1,'title' => 'Access denied!', 'message' => 'Incorrect security code!']);


    }


    
    public function add(Request $request) {
        return view('lari_maintenance.plans.add_modal');
    }



    public function confirm(Request $request) {
        $data['id'] = $request->id;
        $data['action'] = route('plans.delete');
        $data['message'] = 'Do you want to delete?';
        return view('modals.modal_security_code',$data);
    }



    public function edit(Request $request) {
        $data['plans'] = DB::table('usersplantable')
            ->select(
                'usersplantable.planid',
                'usersplantable.plantitle',
                'usersplantable.planprice',
                )
            ->where('usersplantable.planid', '=', $request->id)
            ->first();

        if($data['plans'] ) {
            return view('lari_maintenance.plans.edit_modal', $data);
        }
            return response()->json(['failed' => 1,'message' => 'Failed to fetch.'],500);
    }

    

    
    public function search(Request $request) {
        $search = $request->query('query');
        $data['plans'] = DB::table('usersplantable')
            ->select(
                'usersplantable.planid',
                'usersplantable.plantitle',
                'usersplantable.planprice',
                )
            ->where('usersplantable.plantitle', 'like', '%' . $search . '%')
            ->orderBy('usersplantable.planid','ASC')
            ->paginate(10);

        return view('lari_maintenance.plans.plans', $data);
    }



}

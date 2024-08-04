<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;

class CustomersController extends Controller
{
    protected $moduleId;

    public function __construct() {
        $this->moduleId = 2;
    }

    public function show(Request $request) {
        $data['mid'] = $this->moduleId;

        $data['customer_category'] = DB::table('customercategorytable')
        ->select(
            'customercategorytable.categoryid',
            'customercategorytable.categoryname',
            )
        ->get();

        $data['customers'] = DB::table('customerstable')
            ->leftjoin('usersplantable', 'customerstable.currentplan', '=', 'usersplantable.planid')
            ->leftjoin('customercategorytable', 'customerstable.customertype', '=', 'customercategorytable.categoryid')
            ->select(
                'customerstable.customerid',
                'customerstable.name',
                'customerstable.firstname',
                'customerstable.middlename',
                'customerstable.lastname',
                'customerstable.username',
                'customerstable.unhashedpassword',
                'customerstable.address',
                'customerstable.email',
                'customerstable.contactno',
                'customerstable.birthdate',
                'customerstable.gender',
                'customerstable.civilstatus',
                'customerstable.currentplan',
                'usersplantable.planid',
                'usersplantable.plantitle',
                'usersplantable.planprice',
                'customerstable.active',
                'customerstable.paid',
                'customerstable.dateadded',
                'customerstable.managerid',
                'customercategorytable.categoryid',
                'customercategorytable.categoryname',
                )
            ->orderBy('customerstable.customerid','ASC')
            ->paginate(10);


        $data['customer_with_intallment'] = DB::table('customersinstallmenttable')
            ->orderBy('customersinstallmenttable.payment','DESC')
            ->orderBy('customersinstallmenttable.date','DESC')
            ->get();


        $data['installment_total'] = DB::table('customersinstallmenttable')
            ->select('customerid', DB::raw('SUM(payment) as total_payment'))
            ->where('paid','=',1)
            ->groupBy('customerid')
            ->get();

        return view('customers.customers', $data);
    }


    public function delete(Request $request) {
        $data['confirm'] =  DB::table('userstable')
            ->where('userstable.unhashedpassword', '=', $request->unhashedpassword)
            ->first();

        if($data['confirm']) {         
            $data['delete'] =  DB::table('customerstable')
            ->where('customerstable.customerid', '=', $request->id)
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
            $data['update'] =  DB::table('customerstable')
            ->where('customerstable.customerid', '=', $request->id)
            ->update([
                'customerstable.name'=>   $request->lastname.', '.$request->firstname.' '. $request->middlename,
                'customerstable.firstname'=> $request->firstname,
                'customerstable.middlename'=> $request->middlename,
                'customerstable.lastname'=> $request->lastname,
                'customerstable.username'=> $request->username,
                'customerstable.unhashedpassword'=> $request->unhashedpassword,
                'customerstable.address'=> $request->address,
                'customerstable.email'=> $request->email,
                'customerstable.contactno'=> $request->contactno,
                'customerstable.birthdate'=> $request->birthdate,
                'customerstable.gender'=> $request->gender,
                'customerstable.civilstatus'=> $request->civilstatus,
                'customerstable.currentplan'=> $request->planid,
                'customerstable.customertype'=> $request->categoryid,
                'customerstable.dateadded'=> now(),
            ]);

            DB::table('customersinstallmenttable')
                ->where('customerid', $request->id)
                ->update(['paid' => 0,'date' => null]);


            DB::table('customersinstallmenttable')
                ->where('customersinstallmenttable.customerid', '=', $request->id)
                ->whereIn('installmentid', $request->installmentid)
                ->update([
                    'paid' => 1,
                    'date' => now()->format('Y-m-d'),
                ]);

            $installment_sum = DB::table('customersinstallmenttable')
                ->where('customersinstallmenttable.customerid', '=', $request->id)
                ->where('paid',1)
                ->sum('payment');

            $current_plan_price =  DB::table('customerstable')
                ->leftjoin('usersplantable', 'customerstable.currentplan', '=', 'usersplantable.planid')
                ->where('customerstable.customerid', '=', $request->id)
                ->first();
                

            if($installment_sum == $current_plan_price->PlanPrice){
                DB::table('customerstable')
                    ->where('customerstable.customerid', '=', $request->id)
                    ->update(['paid' => 1]);
            }else {
                DB::table('customerstable')
                ->where('customerstable.customerid', '=', $request->id)
                ->update(['paid' => 0]);
            }

            return redirect()->back()->with(['success' => 1, 'title' => 'Done', 'message' => 'Successfully Updated!']);
        }
            return redirect()->back()->with(['warning' => 1,'title' => 'Access denied!', 'message' => 'Incorrect security code!']);
    }


    public function create(Request $request) {

        $data['confirm'] =  DB::table('userstable')
            ->where('userstable.userlevel',1)
            ->where('userstable.unhashedpassword',$request->unhashedpassword)
            ->first();

        if($data['confirm'] ) {  
        $data['create']['customerid'] =  DB::table('customerstable')
            ->insertGetId([
                'customerstable.name'=>   $request->lastname.', '.$request->firstname.' '. $request->middlename,
                'customerstable.firstname'=> $request->firstname,
                'customerstable.middlename'=> $request->middlename,
                'customerstable.lastname'=> $request->lastname,
                'customerstable.username'=> $request->username,
                'customerstable.unhashedpassword'=> $request->unhashedpassword,
                'customerstable.address'=> $request->address,
                'customerstable.email'=> $request->email,
                'customerstable.contactno'=> $request->contactno,
                'customerstable.birthdate'=> $request->birthdate,
                'customerstable.gender'=> $request->gender,
                'customerstable.civilstatus'=> $request->civilstatus,
                'customerstable.currentplan'=> $request->planid,
                'customerstable.customertype'=> $request->categoryid,
                'customerstable.managerid'=> 0,
                'customerstable.dateadded'=> now(),
            ]);

        $payment = 0;
        $datenow = null;
        
        for ($i = 0; $i <= 7; $i++) {
            $payment = ($i == 0) ? 750 : 150;
            $paid = in_array($i, $request->installmentid) ? 1 : 0;
            $datenow = ($paid == 1) ? now()->format('Y-m-d') : null;
        
            DB::table('customersinstallmenttable')->insert([
                'customerid' => $data['create']['customerid'],
                'payment' => $payment,
                'paid' => $paid,
                'date' => $datenow,
            ]);
        }


        $installment_sum = DB::table('customersinstallmenttable')
            ->where('customersinstallmenttable.customerid', '=', $data['create']['customerid'])
            ->where('paid',1)
            ->sum('payment');

        $current_plan_price =  DB::table('customerstable')
            ->leftjoin('usersplantable', 'customerstable.currentplan', '=', 'usersplantable.planid')
            ->where('customerstable.customerid', '=', $data['create']['customerid'])
            ->first();
            

        if($installment_sum == $current_plan_price->PlanPrice){
            DB::table('customerstable')
                ->where('customerstable.customerid', '=', $data['create']['customerid'])
                ->update(['paid' => 1]);
        }else {
            DB::table('customerstable')
            ->where('customerstable.customerid', '=', $data['create']['customerid'])
            ->update(['paid' => 0]);
        }

            return redirect()->back()->with(['success' => 1, 'title' => 'Done', 'message' => 'Successfully Created!']);
        }
        return redirect()->back()->with(['warning' => 1,'title' => 'Access denied!', 'message' => 'Incorrect security code!']);


    }


    
    public function add(Request $request) {
        $data['plans'] = DB::table('usersplantable')
            ->select(
                'usersplantable.planid',
                'usersplantable.plantitle',
                'usersplantable.planprice',
                )
            ->get();

        $data['role'] = DB::table('customercategorytable')
        ->select(
            'customercategorytable.categoryid',
            'customercategorytable.categoryname',
            )
        ->get();

        return view('customers.add_modal',$data);
    }



    public function confirm(Request $request) {
        $data['id'] = $request->id;
        $data['action'] = route('customers.delete');
        $data['message'] = 'Do you want to delete?';
        return view('modals.modal_security_code',$data);
    }


    public function edit(Request $request) {
        $data['customers'] = DB::table('customerstable')
            ->leftjoin('usersplantable', 'customerstable.currentplan', '=', 'usersplantable.planid')
            ->leftjoin('customercategorytable', 'customerstable.customertype', '=', 'customercategorytable.categoryid')
            ->select(
                'customerstable.customerid',
                'customerstable.name',
                'customerstable.firstname',
                'customerstable.middlename',
                'customerstable.lastname',
                'customerstable.username',
                'customerstable.unhashedpassword',
                'customerstable.address',
                'customerstable.email',
                'customerstable.contactno',
                'customerstable.birthdate',
                'customerstable.gender',
                'customerstable.civilstatus',
                'customerstable.currentplan',
                'usersplantable.planid',
                'usersplantable.plantitle',
                'usersplantable.planprice',
                'customerstable.active',
                'customerstable.paid',
                'customerstable.dateadded',
                'customerstable.managerid',
                'customerstable.customertype',
                'customercategorytable.categoryid',
                'customercategorytable.categoryname',
            )
            ->where('customerstable.customerid', '=', $request->id)
            ->first();
            
        $data['plans'] = DB::table('usersplantable')
            ->select(
                'usersplantable.planid',
                'usersplantable.plantitle',
                'usersplantable.planprice',
                )
            ->get();

        $data['role'] = DB::table('customercategorytable')
            ->select(
                'customercategorytable.categoryid',
                'customercategorytable.categoryname',
                )
            ->get();


        $data['customer_with_intallment'] = DB::table('customersinstallmenttable')
            ->where('customersinstallmenttable.customerid', '=', $request->id)
            ->orderBy('customersinstallmenttable.payment','DESC')
            ->orderBy('customersinstallmenttable.date','DESC')
            ->get();


        if($data['customers'] ) {
            return view('customers.edit_modal', $data);
        }
            return response()->json(['failed' => 1,'message' => 'Failed to fetch.'],500);
    }

    

    
    public function search(Request $request) {
        $search = $request->query('query');
        $customer_category = $request->query('categoryid');

        $data['customer_category'] = DB::table('customercategorytable')
        ->select(
            'customercategorytable.categoryid',
            'customercategorytable.categoryname',
            )
        ->get();

        $data['customers'] = DB::table('customerstable')
            ->join('usersplantable', 'customerstable.currentplan', '=', 'usersplantable.planid')
            ->join('customercategorytable', 'customerstable.customertype', '=', 'customercategorytable.categoryid')
            ->select(
                'customerstable.customerid',
                'customerstable.name',
                'customerstable.firstname',
                'customerstable.middlename',
                'customerstable.lastname',
                'customerstable.username',
                'customerstable.unhashedpassword',
                'customerstable.address',
                'customerstable.email',
                'customerstable.contactno',
                'customerstable.birthdate',
                'customerstable.gender',
                'customerstable.civilstatus',
                'customerstable.currentplan',
                'usersplantable.planid',
                'usersplantable.plantitle',
                'usersplantable.planprice',
                'customerstable.active',
                'customerstable.paid',
                'customerstable.dateadded',
                'customerstable.managerid',
                'customercategorytable.categoryid',
                'customercategorytable.categoryname',
                )
            ->where('customerstable.name', 'like', '%' . $search . '%')
            ->where('customercategorytable.categoryid', 'like', '%' . $customer_category . '%')
            ->orderBy('customerstable.customerid','ASC')
            ->paginate(10);

        $data['customer_with_intallment'] = DB::table('customersinstallmenttable')
            ->orderBy('customersinstallmenttable.payment','DESC')
            ->orderBy('customersinstallmenttable.date','DESC')
            ->get();

        $data['installment_total'] = DB::table('customersinstallmenttable')
            ->select('customerid', DB::raw('SUM(payment) as total_payment'))
            ->where('paid','=',1)
            ->groupBy('customerid')
            ->get();

        return view('customers.customers', $data);
    }



    public function deleteMember(Request $request) {
        $data['confirm'] =  DB::table('userstable')
            ->where('userstable.unhashedpassword', '=', $request->unhashedpassword)
            ->first();

        if($data['confirm']) {         
            $data['delete'] =  DB::table('customerstable')
            ->where('customerstable.customerid', '=', $request->id)
            ->delete();

            return redirect()->back()->with(['success' => 1, 'title' => 'Done', 'message' => 'Successfully Deleted!']);
        }else
            return redirect()->back()->with(['warning' => 1,'title' => 'Access denied!', 'message' => 'Incorrect security code!']);

    }

    

    public function updateMember(Request $request) {
        $data['confirm'] =  DB::table('userstable')
            ->where('userstable.userlevel', 1)
            ->where('userstable.unhashedpassword',$request->unhashedpassword)
            ->first();

        if($data['confirm']) {  
            $data['update'] =  DB::table('customerstable')
            ->where('customerstable.customerid', '=', $request->id)
            ->update([
                'customerstable.name'=>   $request->lastname.', '.$request->firstname.' '. $request->middlename,
                'customerstable.firstname'=> $request->firstname,
                'customerstable.middlename'=> $request->middlename,
                'customerstable.lastname'=> $request->lastname,
                'customerstable.username'=> $request->username,
                'customerstable.unhashedpassword'=> $request->unhashedpassword,
                'customerstable.address'=> $request->address,
                'customerstable.email'=> $request->email,
                'customerstable.contactno'=> $request->contactno,
                'customerstable.birthdate'=> $request->birthdate,
                'customerstable.gender'=> $request->gender,
                'customerstable.civilstatus'=> $request->civilstatus,
                'customerstable.currentplan'=> $request->planid,
                'customerstable.dateadded'=> now(),
            ]);

            DB::table('customersinstallmenttable')
            ->where('customerid', $request->id)
            ->update(['paid' => 0,'date' => null]);


            DB::table('customersinstallmenttable')
                ->where('customersinstallmenttable.customerid', '=', $request->id)
                ->whereIn('installmentid', $request->installmentid)
                ->update([
                    'paid' => 1,
                    'date' => now()->format('Y-m-d'),
                ]);

            $installment_sum = DB::table('customersinstallmenttable')
                ->where('customersinstallmenttable.customerid', '=', $request->id)
                ->where('paid',1)
                ->sum('payment');

            $current_plan_price =  DB::table('customerstable')
                ->leftjoin('usersplantable', 'customerstable.currentplan', '=', 'usersplantable.planid')
                ->where('customerstable.customerid', '=', $request->id)
                ->first();
                

            if($installment_sum == $current_plan_price->PlanPrice){
                DB::table('customerstable')
                    ->where('customerstable.customerid', '=', $request->id)
                    ->update(['paid' => 1]);
            }else {
                DB::table('customerstable')
                    ->where('customerstable.customerid', '=', $request->id)
                    ->update(['paid' => 0]);
            }

            return redirect()->back()->with(['success' => 1, 'title' => 'Done', 'message' => 'Successfully Updated!']);
        }
            return redirect()->back()->with(['warning' => 1,'title' => 'Access denied!', 'message' => 'Incorrect security code!']);
    }


    public function createMember(Request $request) {
        $data['confirm'] =  DB::table('userstable')
            ->where('userstable.userlevel',1)
            ->where('userstable.unhashedpassword',$request->unhashedpassword)
            ->first();

        if($data['confirm'] ) {  
            $data['create']['customerid'] =  DB::table('customerstable')
            ->insertGetId([
                'customerstable.name'=>   $request->lastname.', '.$request->firstname.' '. $request->middlename,
                'customerstable.firstname'=> $request->firstname,
                'customerstable.middlename'=> $request->middlename,
                'customerstable.lastname'=> $request->lastname,
                'customerstable.username'=> $request->username,
                'customerstable.unhashedpassword'=> $request->unhashedpassword,
                'customerstable.address'=> $request->address,
                'customerstable.email'=> $request->email,
                'customerstable.contactno'=> $request->contactno,
                'customerstable.birthdate'=> $request->birthdate,
                'customerstable.gender'=> $request->gender,
                'customerstable.civilstatus'=> $request->civilstatus,
                'customerstable.currentplan'=> $request->planid,
                'customerstable.customertype'=> 2,
                'customerstable.managerid'=> $request->managerid,
                'customerstable.dateadded'=> now(),
            ]);

        
            $payment = 0;
            $datenow = null;
            
        for ($i = 0; $i <= 7; $i++) {
            $payment = ($i == 0) ? 750 : 150;
            $paid = in_array($i, $request->installmentid) ? 1 : 0;
            $datenow = ($paid == 1) ? now()->format('Y-m-d') : null;
        
            DB::table('customersinstallmenttable')->insert([
                'customerid' => $data['create']['customerid'],
                'payment' => $payment,
                'paid' => $paid,
                'date' => $datenow,
            ]);
        }


        $installment_sum = DB::table('customersinstallmenttable')
            ->where('customersinstallmenttable.customerid', '=', $data['create']['customerid'])
            ->where('paid',1)
            ->sum('payment');

        $current_plan_price =  DB::table('customerstable')
            ->leftjoin('usersplantable', 'customerstable.currentplan', '=', 'usersplantable.planid')
            ->where('customerstable.customerid', '=', $data['create']['customerid'])
            ->first();
            

        if($installment_sum == $current_plan_price->PlanPrice){
            DB::table('customerstable')
                ->where('customerstable.customerid', '=', $data['create']['customerid'])
                ->update(['paid' => 1]);
        }else {
            DB::table('customerstable')
            ->where('customerstable.customerid', '=', $data['create']['customerid'])
            ->update(['paid' => 0]);
        }
            return redirect()->back()->with(['success' => 1, 'title' => 'Done', 'message' => 'Successfully Created!']);
        }


        return redirect()->back()->with(['warning' => 1,'title' => 'Access denied!', 'message' => 'Incorrect security code!']);


    }


    
    public function addMember(Request $request) {
        $data['customerid'] = $request->customerid;

        $data['plans'] = DB::table('usersplantable')
            ->select(
                'usersplantable.planid',
                'usersplantable.plantitle',
                'usersplantable.planprice',
                )
            ->get();

        $data['role'] = DB::table('customercategorytable')
            ->select(
                'customercategorytable.categoryid',
                'customercategorytable.categoryname',
                )
            ->get();

        return view('profile.add_modal',$data);
    }



    public function confirmMember(Request $request) {
        $data['id'] = $request->id;
        $data['action'] = route('customers.delete');
        $data['message'] = 'Do you want to delete?';
        return view('modals.modal_security_code',$data);
    }


    public function showMember(Request $request) {
        $data['customerid']  = $request->customerid;

        $data['me'] = DB::table('customerstable')
        ->leftjoin('usersplantable', 'customerstable.currentplan', '=', 'usersplantable.planid')
        ->leftjoin('customercategorytable', 'customerstable.customertype', '=', 'customercategorytable.categoryid')
        ->select(
            'customerstable.customerid',
            'customerstable.name',
            'customerstable.firstname',
            'customerstable.middlename',
            'customerstable.lastname',
            'customerstable.username',
            'customerstable.unhashedpassword',
            'customerstable.address',
            'customerstable.email',
            'customerstable.contactno',
            'customerstable.birthdate',
            'customerstable.gender',
            'customerstable.civilstatus',
            'customerstable.currentplan',
            'usersplantable.planid',
            'usersplantable.plantitle',
            'usersplantable.planprice',
            'customerstable.active',
            'customerstable.paid',
            'customerstable.managerid',
            'customerstable.dateadded',
            'customerstable.insularlifecode',
            'customercategorytable.categoryid',
            'customercategorytable.categoryname',
            )
        ->where('customerstable.customerid', '=',  $request->customerid)
        ->first();

        $data['customer_insularlifecode'] = $this->hideCharacters($data['me']->insularlifecode);


        $data['members_count'] = DB::table('customerstable')
            ->select('customerstable.managerid')
            ->where('customerstable.managerid', '=',  $request->customerid)
            ->count();


        $data['customers'] = DB::table('customerstable')
            ->join('usersplantable', 'customerstable.currentplan', '=', 'usersplantable.planid')
            ->join('customercategorytable', 'customerstable.customertype', '=', 'customercategorytable.categoryid')
            ->select(
                'customerstable.customerid',
                'customerstable.name',
                'customerstable.firstname',
                'customerstable.middlename',
                'customerstable.lastname',
                'customerstable.username',
                'customerstable.unhashedpassword',
                'customerstable.address',
                'customerstable.email',
                'customerstable.contactno',
                'customerstable.birthdate',
                'customerstable.gender',
                'customerstable.civilstatus',
                'customerstable.currentplan',
                'usersplantable.planid',
                'usersplantable.plantitle',
                'usersplantable.planprice',
                'customerstable.active',
                'customerstable.paid',
                'customerstable.dateadded',
                'customerstable.managerid',
                'customercategorytable.categoryid',
                'customercategorytable.categoryname',
                )
            ->where('customerstable.managerid', '=',  $request->customerid)
            ->orderBy('customerstable.customerid','ASC')
            ->paginate(10);


        $data['customer_with_intallment'] = DB::table('customersinstallmenttable')
            ->orderBy('customersinstallmenttable.payment','DESC')
            ->orderBy('customersinstallmenttable.date','DESC')
            ->get();


        $data['installment_total'] = DB::table('customersinstallmenttable')
            ->select('customerid', DB::raw('SUM(payment) as total_payment'))
            ->where('paid','=',1)
            ->groupBy('customerid')
            ->get();


        return view('profile.profile',$data);
    }



    public function editMember(Request $request) {
        $data['customers'] = DB::table('customerstable')
            ->leftjoin('usersplantable', 'customerstable.currentplan', '=', 'usersplantable.planid')
            ->leftjoin('customercategorytable', 'customerstable.customertype', '=', 'customercategorytable.categoryid')
            ->select(
                'customerstable.customerid',
                'customerstable.name',
                'customerstable.firstname',
                'customerstable.middlename',
                'customerstable.lastname',
                'customerstable.username',
                'customerstable.unhashedpassword',
                'customerstable.address',
                'customerstable.email',
                'customerstable.contactno',
                'customerstable.birthdate',
                'customerstable.gender',
                'customerstable.civilstatus',
                'customerstable.currentplan',
                'usersplantable.planid',
                'usersplantable.plantitle',
                'usersplantable.planprice',
                'customerstable.active',
                'customerstable.paid',
                'customerstable.dateadded',
                'customerstable.managerid',
                'customerstable.customertype',
                'customercategorytable.categoryid',
                'customercategorytable.categoryname',
            )
            ->where('customerstable.customerid', '=', $request->id)
            ->first();
            
        $data['plans'] = DB::table('usersplantable')
            ->select(
                'usersplantable.planid',
                'usersplantable.plantitle',
                'usersplantable.planprice',
                )
            ->get();

        $data['role'] = DB::table('customercategorytable')
            ->select(
                'customercategorytable.categoryid',
                'customercategorytable.categoryname',
                )
            ->get();

        $data['customer_with_intallment'] = DB::table('customersinstallmenttable')
            ->where('customersinstallmenttable.customerid', '=', $request->id)
            ->orderBy('customersinstallmenttable.payment','DESC')
            ->orderBy('customersinstallmenttable.date','DESC')
            ->get();


        if($data['customers'] ) {
            return view('profile.edit_modal', $data);
        }
            return response()->json(['failed' => 1,'message' => 'Failed to fetch.'],500);
    }

    

    
    public function searchMember(Request $request) {
        $search = $request->query('query');
        $customer_category = $request->query('categoryid');

        $data['customer_category'] = DB::table('customercategorytable')
        ->select(
            'customercategorytable.categoryid',
            'customercategorytable.categoryname',
            )
        ->get();

        
        $data['me'] = DB::table('customerstable')
        ->leftjoin('usersplantable', 'customerstable.currentplan', '=', 'usersplantable.planid')
        ->leftjoin('customercategorytable', 'customerstable.customertype', '=', 'customercategorytable.categoryid')
        ->select(
            'customerstable.customerid',
            'customerstable.name',
            'customerstable.firstname',
            'customerstable.middlename',
            'customerstable.lastname',
            'customerstable.username',
            'customerstable.unhashedpassword',
            'customerstable.address',
            'customerstable.email',
            'customerstable.contactno',
            'customerstable.birthdate',
            'customerstable.gender',
            'customerstable.civilstatus',
            'customerstable.currentplan',
            'usersplantable.planid',
            'usersplantable.plantitle',
            'usersplantable.planprice',
            'customerstable.active',
            'customerstable.paid',
            'customerstable.managerid',
            'customerstable.dateadded',
            'customercategorytable.categoryid',
            'customercategorytable.categoryname',
            )
        ->where('customerstable.customerid', '=',  $request->customerid)
        ->first();

        
        $data['members_count'] = DB::table('customerstable')
            ->select('customerstable.managerid')
            ->where('customerstable.managerid', '=',  $request->customerid)
            ->count();

        $data['customers'] = DB::table('customerstable')
            ->leftjoin('usersplantable', 'customerstable.currentplan', '=', 'usersplantable.planid')
            ->leftjoin('customercategorytable', 'customerstable.customertype', '=', 'customercategorytable.categoryid')
            ->select(
                'customerstable.customerid',
                'customerstable.name',
                'customerstable.firstname',
                'customerstable.middlename',
                'customerstable.lastname',
                'customerstable.username',
                'customerstable.unhashedpassword',
                'customerstable.address',
                'customerstable.email',
                'customerstable.contactno',
                'customerstable.birthdate',
                'customerstable.gender',
                'customerstable.civilstatus',
                'customerstable.currentplan',
                'usersplantable.planid',
                'usersplantable.plantitle',
                'usersplantable.planprice',
                'customerstable.active',
                'customerstable.paid',
                'customerstable.dateadded',
                'customerstable.managerid',
                'customercategorytable.categoryid',
                'customercategorytable.categoryname',
                )
            ->where('customerstable.customerid', '!=',  $request->customerid)
            ->where('customerstable.name', 'like', '%' . $search . '%')
            ->where('customercategorytable.categoryid', 'like', '%' . $customer_category . '%')
            ->orderBy('customerstable.customerid','ASC')
            ->paginate(10);

        $data['customer_with_intallment'] = DB::table('customersinstallmenttable')
            ->orderBy('customersinstallmenttable.payment','DESC')
            ->orderBy('customersinstallmenttable.date','DESC')
            ->get();


        $data['installment_total'] = DB::table('customersinstallmenttable')
            ->select('customerid', DB::raw('SUM(payment) as total_payment'))
            ->where('paid','=',1)
            ->groupBy('customerid')
            ->get();

        return view('profile.profile', $data);
    }



    // Function to hide characters in the string at random positions
    private function hideCharacters($inputString) {
        // If the input string is empty, return an empty string
        if (empty($inputString)) {
            return '';
        }
        // Define the number of visible characters
        $visibleCount = 4; // You can adjust this number as needed
        // Calculate the number of hidden characters
        $hiddenCount = max(strlen($inputString) - $visibleCount, 0);
        // If there are no hidden characters to replace, return the input string
        if ($hiddenCount <= 0) {
            return $inputString;
        }
        // Generate an array of asterisks "*" for hidden characters
        $hiddenCharacters = array_fill(0, $hiddenCount, '*');
        // Generate random positions for visible characters
        $visiblePositions = array_rand($hiddenCharacters, min($visibleCount, $hiddenCount));
        // Replace the asterisks with visible characters at random positions
        foreach ((array)$visiblePositions as $position) {
            $hiddenCharacters[$position] = $inputString[$position];
        }
        // Combine the visible and shuffled hidden parts
        $finalString = implode('', $hiddenCharacters);

        return $finalString;
    }
}

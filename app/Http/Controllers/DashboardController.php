<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    protected $moduleId;

    public function __construct() {
        $this->moduleId = 1;
    }

    public function show(Request $request) {
        $data['mid'] = $this->moduleId;

        $data['total_customers'] = DB::table('customerstable')
            ->leftjoin('usersplantable', 'customerstable.currentplan', '=', 'usersplantable.planid')
            ->leftjoin('customercategorytable', 'customerstable.customertype', '=', 'customercategorytable.categoryid')
            ->count();

        $data['total_managers'] = DB::table('customerstable')
            ->leftjoin('usersplantable', 'customerstable.currentplan', '=', 'usersplantable.planid')
            ->leftjoin('customercategorytable', 'customerstable.customertype', '=', 'customercategorytable.categoryid')
            ->where('customerstable.customertype','=',1)
            ->count();

        $data['total_paid_sales'] = DB::table('customerstable')
            ->leftjoin('usersplantable', 'customerstable.currentplan', '=', 'usersplantable.planid')
            ->where('customerstable.currentplan','!=',5)
            ->sum('usersplantable.planprice');

        $data['total_installment'] = DB::table('customerstable')
            ->leftjoin('usersplantable', 'customerstable.currentplan', '=', 'usersplantable.planid')
            ->leftjoin('customersinstallmenttable', 'customerstable.customerid', '=', 'customersinstallmenttable.customerid')
            ->where('customerstable.currentplan','=',5)
            ->where('customersinstallmenttable.paid','=',1)
            ->sum('customersinstallmenttable.payment');


        $data['total_sales'] =  ($data['total_paid_sales'] + $data['total_installment']);
        

        return view('dashboard.dashboard',$data);
    }
}

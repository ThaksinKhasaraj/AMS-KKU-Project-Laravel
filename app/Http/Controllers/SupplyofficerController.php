<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Department;
use App\Models\User;
use App\Models\Material;
use App\Models\Withdraw;
use App\Models\WithdrawDetail;
use Illuminate\Support\Facades\Auth;

class SupplyofficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard()
    {
        //
        return view('Supplyofficer.dashboard');
    }

    public function index()
    {
        //
        $withdraws = Withdraw::orderby('created_at','DESC')->where('approve_success', 1)->get();
        $check = Withdraw::orderby('created_at','DESC')->where('approve_spo', 0)->get();
        $check_pay = Withdraw::orderby('created_at','DESC')->where('approve_dir', 1)->where('approve_success', 0)->get();
        $withdrawTotal = Withdraw::where('approve_success', 1)->count('id');
        $NoAp = Withdraw::where('withdraw_status', 1)->get();
        $NoApprove = Withdraw::where('withdraw_status', 1)->count('id');
        $withdrawdetails = WithdrawDetail::get();
        $materials = Material::get();
        $TotalPriceStock = Material::where('mate_status', 1)->count('id');
        $categories = Category::get();
        $users = User::where('department_id', Auth::user()->department->id)->get();
        $departments = Department::get();
        $TotalempDept = Department::get()->count('id');
        $department_id = User::where('department_id','id')->select('id')->get();
        $TotalPriceWithdraw = Withdraw::where('approve_success', 1)->whereIn('user_id',$department_id)->count('user_id');
        
        $cateGroupByMate = Material::groupBy('category_id')
        ->selectRaw('count(*) as total, category_id')
        ->get();
        $cateGroupByMateCount = array();
        foreach ($cateGroupByMate as $value) {
            $cateGroupByMateCount[$value->category_id] = $value->total;
        }

        $send = Withdraw::where('status', 1)->where('withdraw_status', 0)->where('approve_success', 0)->get();
        $wait = Withdraw::where('approve_mng', 1)->where('approve_spo', 0)->get();
        $wait_pay = Withdraw::where('withdraw_status', 0)->where('approve_dir', 1)->where('approve_success', 0)->get();
        $pay = Withdraw::where('withdraw_status', 0)->where('approve_success', 1)->get();

        return view('Supplyofficer.index', compact('users', 'withdraws' , 'withdrawdetails' , 
        'materials','categories' , 'departments','withdrawTotal','TotalempDept','NoApprove', 
        'TotalPriceStock','TotalPriceWithdraw','cateGroupByMateCount','send' ,'wait' ,
        'wait_pay' ,'pay' ,'check','check_pay','NoAp' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

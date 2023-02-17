<?php

namespace App\Http\Controllers;

use App\Models\mngHistory;
use App\Models\empHistory;
use Illuminate\Http\Request;
use App\Models\mngWithdraw;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Department;
use App\Models\User;
use App\Models\Material;
use App\Models\Withdraw;
use App\Models\WithdrawDetail;
use Illuminate\Support\Facades\Auth;

class mngHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        //แยกใบเบิกตามหน่วยงาน
    $departments = Department::get();
    $department_id = Auth::user()->department_id;
    $users = User::where('department_id',$department_id)->select('id')->get();
    $userIdArray = array();

    for($i = 0; $i < count($users) ;$i++){
        array_push($userIdArray,$users[$i]->id);
    }

    $withdraws = Withdraw::orderby('created_at','DESC')->where('approve_mng', 1)->whereIn('user_id',$userIdArray)->get();
    $withdrawdetails = WithdrawDetail::get();
    $TotalPrice = WithdrawDetail::where('withdraw_id', 'id')->sum('amount');
    $materials = Material::get();
    $categories = Category::get();
     
    return view('mngHistory.index', compact('users', 'withdraws' , 'withdrawdetails' , 'materials' , 'departments' ));
    

       
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
       
        $withdraw = Withdraw::where('id', $id)->where('status', 1)->get();
        $withdrawdetail = WithdrawDetail::where('withdraw_id', $id)->get();
        $material = Material::get();
        $department = Department::get();
        $category = Category::get();
        return view('mngHistory.show', compact( 'withdrawdetail' , 'withdraw','material','category' , 'department'));
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

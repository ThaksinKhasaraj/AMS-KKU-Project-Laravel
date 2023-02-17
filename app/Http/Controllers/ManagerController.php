<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\User;
use App\Models\Department;
use App\Models\Withdraw;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::get();
        $departments = Department::get();
    
         //แยกใบเบิกตามหน่วยงาน
    $department_id = Auth::user()->department_id;
    $users = User::where('department_id',$department_id)->select('id')->get();
    $userIdArray = array();

    for($i = 0; $i < count($users) ;$i++){
        array_push($userIdArray,$users[$i]->id);
    }

    $withdraws = Withdraw::orderby('created_at','DESC')->where('approve_mng', 1)->whereIn('user_id',$userIdArray)->get();
        $approve = Withdraw::whereIn('user_id',$userIdArray)->where('approve_mng', 1)->get();
        $no_approve = Withdraw::whereIn('user_id',$userIdArray)->where('withdraw_status', 1)->get();
        $pay = Withdraw::whereIn('user_id',$userIdArray)->where('withdraw_status', 0)->where('approve_success', 1)->get();
        $wait = Withdraw::where('status', 1)->where('approve_mng', 0)->get();

        return view('manager.index', compact('users','departments','withdraws','approve' ,'no_approve','pay','wait' ));
        
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

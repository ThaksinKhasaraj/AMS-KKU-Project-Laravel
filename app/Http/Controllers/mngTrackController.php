<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Department;
use App\Models\User;
use App\Models\Material;
use App\Models\Withdraw;
use App\Models\WithdrawDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class mngTrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $withdrawdetails = WithdrawDetail::get();
    $materials = Material::get();
    $categories = Category::get();
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
     
    return view('mngTrack.index', compact('users', 'withdraws' , 'withdrawdetails' , 'materials' , 'departments' ));
    
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

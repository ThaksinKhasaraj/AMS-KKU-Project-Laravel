<?php

namespace App\Http\Controllers;

use App\Models\spoWithdraw;
 
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Withdraw;
use App\Models\WithdrawDetail;
use App\Models\Category;
use App\Models\Department;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;


class SpoWithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $withdraws = Withdraw::where('approve_dir', 1)->get();
        $withdrawdetails = WithdrawDetail::get();
        $materials = Material::get();
        $categories = Category::get();
        $users = User::get();
        $departments = Department::get();
        //$withdraws = Withdraw::where('department_id', $departments->id)->where('withdraw_status', 1)->get();
        return view('spoWithdraw.index', compact('users', 'withdraws' , 'withdrawdetails' , 'materials' , 'departments' ));
 
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
        //dd($request);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\spoWithdraw  $spoWithdraw
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $withdraw = Withdraw::where('user_id', Auth::id())->where('status', 1)->get();
        $withdrawdetail = WithdrawDetail::where('withdraw_id', $id)->get();
        $material = Material::get();
        $department = Department::get();
        $category = Category::get();
        return view('spoWithdraw.show',compact( 'withdrawdetail' , 'withdraw','material','category' , 'department'));
         
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\spoWithdraw  $spoWithdraw
     * @return \Illuminate\Http\Response
     */
    public function edit(Withdraw $Withdraw , $id)
    {
        //
        $withdraw = Withdraw::where('user_id', Auth::id())->where('status', 1)->get();
        $withdrawdetail = WithdrawDetail::where('withdraw_id', $id)->get();
        $material = Material::get();
        $department = Department::get();
        $category = Category::get();
        return view('spoWithdraw.index',compact( 'withdrawdetail' , 'withdraw','material','category' , 'department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\spoWithdraw  $spoWithdraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Withdraw $Withdraw)
    {
        //
        $withdraw = Withdraw::where('user_id', Auth::id())->where('status', 1)->get();
        $withdrawdetail = WithdrawDetail::get();
        $material = Material::get();
        $department = Department::get();
        $category = Category::get();
        return view('spoWithdraw.index',compact( 'withdrawdetail' , 'withdraw','material','category' , 'department'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\spoWithdraw  $spoWithdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Withdraw $Withdraw)
    {
        //
    }
}

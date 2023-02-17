<?php

namespace App\Http\Controllers;

use App\Models\dirWithdraw;
use App\Models\spoWithdraw;
use App\Models\mngWithdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Withdraw;
use App\Models\WithdrawDetail;
use App\Models\Category;
use App\Models\Department;
use App\Models\User;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;

class DirWithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $withdraws = Withdraw::where('approve_dir', 0)->get();
        $withdrawdetails = WithdrawDetail::get();
        $materials = Material::get();
        $categories = Category::get();
        $users = User::get();
        $departments = Department::get();
        
        return view('dirWithdraw.index', compact('users', 'withdraws' , 'withdrawdetails' , 'materials' , 'departments' ));

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
     * @param  \App\Models\dirWithdraw  $dirWithdraw
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $withdraw = Withdraw::where('id', Auth::id())->where('status', 1)->get();
        $withdrawdetail = WithdrawDetail::where('withdraw_id', $id)->get();
        $material = Material::get();
        $user = User::get();
        $department = Department::get();
        $category = Category::get();
        return view('dirWithdraw.show',compact( 'withdrawdetail' , 'withdraw','material','category' ,'user', 'department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dirWithdraw  $dirWithdraw
     * @return \Illuminate\Http\Response
     */
    public function edit(Withdraw $Withdraw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dirWithdraw  $dirWithdraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Withdraw $Withdraw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dirWithdraw  $dirWithdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Withdraw $rWithdraw)
    {
        //
    }
}

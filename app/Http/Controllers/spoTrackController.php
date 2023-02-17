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

class spoTrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $withdraws = Withdraw::orderby('created_at','DESC')->where('approve_mng', 1)->where('approve_spo', 0)->where('withdraw_status', 0)->get();
        $withdrawdetails = WithdrawDetail::get();
        $materials = Material::get();
        $categories = Category::get();
        $users = User::get();
        $departments = Department::get();
        return view('spoTrack.index', compact('users', 'withdraws' , 'withdrawdetails' , 'materials' , 'departments' ));
         
    }

    public function Track()
    {
        $withdraws = Withdraw::orderby('created_at','DESC')->where('status', 1)->get();
        $withdrawdetails = WithdrawDetail::get();
        $materials = Material::get();
        $categories = Category::get();
        $users = User::get();
        $departments = Department::get();
        return view('spoTrack.Track', compact('users', 'withdraws' , 'withdrawdetails' , 'materials' , 'departments' ));
         
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

        $withdraw = Withdraw::where('user_id', Auth::id())->where('withdraw_status', 1)->get();
        $withdrawdetail = WithdrawDetail::where('withdraw_id', $id)->get();
        $material = Material::get();
        $department = Department::get();
        $category = Category::get();
        return view('spoHistory.show',compact( 'withdrawdetail' , 'withdraw','material','category' , 'department'));
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdraw;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $withdraws = Withdraw::orderby('created_at','DESC')->where('approve_success', 1)->get();
        $check = Withdraw::orderby('created_at','DESC')->where('approve_spo', 1)->where('approve_dir', 0)->where('withdraw_status', 0)->get();
        $check_pay = Withdraw::orderby('created_at','DESC')->where('approve_dir', 1)->where('approve_success', 0)->get();
        $send = Withdraw::where('status', 1)->get();
        $wait = Withdraw::where('withdraw_status', 0)->where('approve_mng', 1)->where('approve_spo', 1)->where('approve_dir', 0)->get();
        $wait_pay = Withdraw::where('withdraw_status', 0)->where('approve_dir', 1)->where('approve_success', 0)->get();
        $pay = Withdraw::where('withdraw_status', 0)->where('approve_success', 1)->get();
        return view('Director.index' , compact('withdraws','check','check_pay','send','wait','wait_pay','pay'));
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

<?php

namespace App\Http\Controllers;

use App\Models\EmpReturn;
use App\Models\Withdraw;
use App\Models\WithdrawDetail;
use App\Models\Material;
use App\Models\User;
use App\Models\Department;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmpReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        //
      
        $withdraws = Withdraw::where('user_id', Auth::id())->where('approve_success', 1)->get();
        $withdrawdetails = Withdrawdetail::get();
        $materials = Material::get();
        $categories = Category::get();
        $users = User::get();
        $departments = Department::get();
        
        return view('empReturn.index' , compact('users', 'withdraws' , 'withdrawdetails' , 'materials' , 'departments' ));
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
     * @param  \App\Models\EmpReturn  $empReturn
     * @return \Illuminate\Http\Response
     */
    public function show(EmpReturn $empReturn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmpReturn  $empReturn
     * @return \Illuminate\Http\Response
     */
    public function edit(EmpReturn $empReturn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmpReturn  $empReturn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmpReturn $empReturn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmpReturn  $empReturn
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmpReturn $empReturn)
    {
        //
    }
}

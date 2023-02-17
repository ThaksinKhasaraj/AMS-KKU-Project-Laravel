<?php

namespace App\Http\Controllers;
use App\Models\spoApprove;
use Illuminate\Http\Request;
use App\Models\Withdraw;
use App\Models\WithdrawDetail;
use App\Models\Category;
use App\Models\Department;
use App\Models\User;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;

class spoApproveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('spoApprove.index');
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

<?php

namespace App\Http\Controllers;

use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\WithdrawDetail;
use App\Models\Category;
use App\Models\Department;
use App\Models\User;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;



class mngWithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $withdraws = Withdraw::get();
        $withdrawdetails = WithdrawDetail::get();
        $materials = Material::get();
        $categories = Category::get();
        $users = User::get();
        $departments = Department::get();
        return view('mngWithdraw.index', compact('users', 'withdraws' , 'withdrawdetails' , 'materials' , 'departments' ));
        
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Show($id)
    {
        //
        $withdraw = Withdraw::where('user_id', Auth::id())->where('status', 1)->get();
        $withdrawdetail = WithdrawDetail::where('withdraw_id', $id)->get();
        $material = Material::get();
        $department = Department::get();
        $category = Category::get();
        return view('mngWithdraw.show',compact( 'withdrawdetail' , 'withdraw','material','category' , 'department'));
       
         
         
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
        $withdraw = Withdraw::FindorFail($id)->where('approve_mng', 0)->get();
        return view('mngWithdraw.index',compact( 'withdrawdetail' , 'withdraw','material','category' , 'department'));
        
        //return view('mngWithdraw.index', compact('withdraw'));

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Withdraw $withdraw)
    {
        //
        //dd($request);
        $request->validate([
             
            'withdraw_id'.$withdraw->id,
            'approve_mng'
        ]);
        $withdraw->update([
            'withdraw_id',
            'approve_mng' => $request->approve_mng
            
        ]);
              
        return redirect()->back()->with('success','อนุมัติใบคำขอเบิกเรียบร้อยแล้ว');
        
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

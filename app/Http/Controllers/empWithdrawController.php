<?php

namespace App\Http\Controllers;

use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\empCart;
use App\Models\Category;
use App\Models\Department;
use App\Models\User;
use App\Models\Material;


class EmpWithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$withdraws = empWithdraw::orderby('created_at','DESC')->get();
        

        return view('Withdraw.index');
   
    }

}
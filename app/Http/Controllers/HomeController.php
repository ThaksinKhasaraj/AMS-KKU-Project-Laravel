<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        
        
    
        $role=Auth::user()->role;

        if($role=='บุคลากร/อาจารย์'){
            return view('Employee.dashboard');
        }
        if($role=='หัวหน้างาน/หัวหน้าสาขาวิชา'){
            return view('Manager.dashboard');
        }
        if($role=='เจ้าหน้าที่พัสดุ'){
            return view('SupplyOfficer.dashboard');
        }
        if($role=='ผู้อำนวยการกองบริหารงานคณะฯ'){
            return view('Director.dashboard');
        }
        if($role=='แอดมิน'){
            return view('Admin.dashboard');
        }
        else{
            return view('Employee.dashboard');
        }
        
   
}
}

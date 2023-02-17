<?php

namespace App\Http\Controllers;

use App\Models\mngReport;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Department;
use App\Models\User;
use App\Models\Material;
use App\Models\Withdraw;
use App\Models\WithdrawDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class mngReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //แยกใบเบิกตามหน่วยงาน
    $departments = Department::get();
    $department_id = Auth::user()->department_id;
    $users = User::where('department_id',$department_id)->select('id')->get();
    $userIdArray = array();

    for($i = 0; $i < count($users) ;$i++){
        array_push($userIdArray,$users[$i]->id);
    }

    $withdraws = Withdraw::orderby('created_at','DESC')->where('approve_mng', 1)->whereIn('user_id',$userIdArray)->get();
    $withUser = Withdraw::orderby('created_at','DESC')->where('approve_mng', 1)->whereIn('user_id',$userIdArray)->first();
    $Approve = Withdraw::where('approve_mng', 1)->whereIn('user_id',$userIdArray)->count('id');
    $NoApprove = Withdraw::where('withdraw_status', 1)->whereIn('user_id',$userIdArray)->count('id');
    $withdrawdetails = WithdrawDetail::get();
    $TotalPrice = WithdrawDetail::where('withdraw_id', 'id')->sum('amount');
    $materials = Material::get();
    $categories = Category::get();
    $pay = Withdraw::whereIn('user_id',$userIdArray)->where('withdraw_status', 0)->where('approve_success', 1)->get();
     

     //bar chart
     $withdraws = Withdraw::whereIn('user_id',$userIdArray)->select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
     ->whereYear('created_at', date('Y'))
     ->where('withdraw_status', 0)
     ->where('approve_success',1)
     ->groupBy(DB::raw("month_name"))
     ->orderBy('id','ASC')
     ->pluck('count', 'month_name');

$labels = $withdraws->keys();
$data = $withdraws->values();

      //pie chart
      $groups = DB::table('materials')
      ->select('category_id', DB::raw('count(*) as total'))
      ->groupBy('category_id')
      ->pluck('total', 'category_id')->all();
// Generate random colours for the groups
for ($i=0; $i<=count($groups); $i++) {
$colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0,6);
}
$chart = new Material();
        $chart->labels = (array_keys($groups));
        $chart->dataset = (array_values($groups));
        $chart->colours = $colours;
        $cateGroupByMate = Material::groupBy('category_id')
        ->selectRaw('count(*) as total, category_id')
        ->get();



    	
    return view('mngReport.index', compact('labels', 'data','chart','users', 'withdraws' , 'withdrawdetails' , 'materials' ,'categories', 'departments','Approve','NoApprove','withUser','pay'));
    

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

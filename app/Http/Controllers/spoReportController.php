<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Department;
use App\Models\User;
use App\Models\Material;
use App\Models\Withdraw;
use App\Models\WithdrawDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class spoReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $withdraws = Withdraw::orderby('created_at','DESC')->where('withdraw_status', 0)->where('approve_success', 1)->get();
        $withdrawTotal = Withdraw::where('approve_success', 1)->count('id');
        $NoApprove = Withdraw::where('withdraw_status', 1)->count('id');
        $withdrawdetails = WithdrawDetail::get();
        $materials = Material::get();
        $TotalMate = Material::sum('mate_amount');
        $categories = Category::get();
        $users = User::where('department_id', Auth::user()->department->id)->get();
        $departments = Department::get();
        $dept = Department::count();
        $department_id = User::where('department_id','id')->select('id')->get();
        $NoAp = Withdraw::where('withdraw_status', 1)->get();
        $pay = Withdraw::where('withdraw_status', 0)->where('approve_success', 1)->get();
        
        //bar chart
        $withdraws = Withdraw::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
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

// Prepare the data for returning with the view
$chart = new Material();
        $chart->labels = (array_keys($groups));
        $chart->dataset = (array_values($groups));
        $chart->colours = $colours;
        $cateGroupByMate = Material::groupBy('category_id')
        ->selectRaw('count(*) as total, category_id')
        ->get();

        
    
 
        return view('spoReport.index', compact('labels', 'data','chart','users', 
        'withdraws' , 'withdrawdetails' ,'materials','TotalMate','categories','dept', 
        'departments','withdrawTotal','NoApprove' ,'pay','NoAp' ));
    
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

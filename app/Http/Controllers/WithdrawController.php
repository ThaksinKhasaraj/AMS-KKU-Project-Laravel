<?php

namespace App\Http\Controllers;

use App\Models\Approve;
use App\Models\Withdraw;
use App\Models\WithdrawDetail;
use App\Models\Material;
use App\Models\User;
use App\Models\Department;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Phattarachai\LineNotify\Facade\Line;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Mockery\Matcher\Not;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //whereIn('id', $master_item_id)->get('price');
        
        $withdraws = Withdraw::orderby('created_at','DESC')->where('approve_mng', 1)->where('approve_spo', 0)->where('withdraw_status', 0)->get();
        $withdrawdetails = WithdrawDetail::get();
        $materials = Material::get();
        $categories = Category::get();
        $users = User::get();
        $departments = Department::get();
        return view('withdraw.index', compact('users', 'withdraws' , 'withdrawdetails' , 'materials' , 'departments' ));
    
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
    public function store(Request $request , Withdraw $withdraw )
    {

        //dd($request);
        #ปีงบประมาณหมายความว่า ระยะเวลาตั้งแต่วันที่ 1 ตุลาคมของปีหนึ่ง ถึงวันที่ 30 กันยายนของปีถัดไป และให้ใช้ปี พ.ศ. ที่ถัดไปนั้นเป็นชื่อสำหรับปีงบประมาณนั้น
        $year = date('Y');
        if($year = date('M') >= 10 ){
            #การเปลี่ยนแปลงปีงบประมาณให้มาเริ่มในวันที่ 1 ตุลาคม
            $year = date('Y')+543+1;
            }
            else{
            # 30 กันยายน สิ้นปีงบประมาณ
            $year = date('Y')+543;
          }

        $code = '9'.sprintf("%02d", Auth::user()->department->id );
        $unique_no = Withdraw::orderBy('id', 'DESC')->pluck('id')->first();
        if($unique_no == null or $unique_no == ""){
        #If Table is Empty
        $unique_no = 1;
        }
        else{
        #If Table has Already some Data
        $unique_no = $unique_no + 1;
      }
         
        $withdraw = Withdraw::create([
            'withdraw_num' => $request->$code =  $year.'-'.$code.'-'.sprintf("%03d", $unique_no ),
            'user_id' => $request->user()->id,
            #'department_id' => Auth::user()->department->id,
            'status' => 1,
            'withdraw_status',
            'approve_mng',
            'cencel_mng',
            'approve_spo',
            'cencel_spo',
            'approve_dir',
            'cencel_dir',
            'approve_success',
            
        ]);

        // yes
        $cart = session('cart') ?? array();       
        foreach ($cart as $item) {
        $material = Material::find($item['material_id']);
        $withdraw = Withdraw::where('user_id', Auth::id())->orderBy('id' , 'DESC')->first();
            $withdraw_detail = WithdrawDetail::create([
                'withdraw_id' => $withdraw->id,
                'material_id' => $material->id,
                'amount' => $item['amount']
            ]);
        }
    
          $request->session()->forget('cart');
          
          if('submit'){
            $user = $withdraw->user->name;
            $department = $withdraw->user->department->dept_name;
            $manager = $withdraw->user->department->manager_name;
            $withdarw_num = $withdraw->withdraw_num;

            Line::send('💁🏻‍♀️ มีใบคำขอเบิกวัสดุค่ะ 🔔📥'."\n".
                        'เลขใบคำขอเบิก : ' .$withdarw_num."\n".
                        'ผู้ขอเบิก : ' .$user."\n".
                        'หน่วยงาน/สาขาวิชา : ' .$department."\n".
                        'หัวหน้างาน/สาขาวิชา : ' .$manager. ' 🟡 รออนุมัติ' );
                       
          };

        return redirect()->route('empHistory.index')->with('success','ส่งใบคำขอเบิกเรียบร้อยแล้ว');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $withdraw = Withdraw::get();
        $withdrawdetail = WithdrawDetail::get();
        $material = Material::get();
        $user = User::get();
        $department = Department::get();
        $category = Category::get();
        return view('withdraw.show',compact( 'withdrawdetail' , 'withdraw','material','category' ,'user', 'department'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $withdraw = Withdraw::where('id', $id)->where('status', 1)->get();
        $withdrawdetail = WithdrawDetail::where('withdraw_id', $id)->get();
        $material = Material::get();
        $category = Category::get();
        $user = User::get();
        $department = Department::get();
        return view('withdraw.edit', compact('withdraw' , 'withdrawdetail' , 'material' , 'category', 'user' , 'department' ));      

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Withdraw $withdraw ,WithdrawDetail $withdrawdetail, Material $material )
    {
        //
        //dd($request);
        $request->validate([
             
            'withdraw_id'.$withdraw->id,
            'approve_mng',
            'approve_spo',
            'spo_user',
            'approve_dir',
            'dir_user',
            'withdraw_status',
            'approve_success',
            'pay_user',
            
            
        ]);
      
        $withdraw->update([
            'withdraw_id' => $withdraw,
            'approve_mng' => $request->approve_mng,
            'approve_spo' => $request->approve_spo,
            'spo_user' => $request->spo_user,
            'approve_dir' => $request->approve_dir,
            'dir_user' => $request->dir_user,
            'withdraw_status' => $request->withdraw_status,
            'approve_success' => $request->approve_success,
            'pay_user' => $request->pay_user,
            

            
        ]);
        //dd($request);
        if (Auth::user()->role=='เจ้าหน้าที่พัสดุ'){
         $request->validate([
            'withdraw_id'.$withdraw->id,
            'material_id'.$material->id,
            'amount',
            'checkout_amount',
            'note'
         ]);
         
        if($request->wd_id_detail != null){
         for($i = 0; $i < count($request->wd_id_detail); $i++){
            $withdrawdetail = WithdrawDetail::where("id",$request->wd_id_detail[$i])->first();
            
            $withdrawdetail->update([
                'checkout_amount' => $request->checkout_amount[$i],
                'note' => $request->note[$i]
            ]);
        
            $material = Material::where('id',$request->wd_materail_id[$i])->first();
            $material->update([
                'mate_amount' => $material->mate_amount - (int)$request->checkout_amount[$i],
            ]);
        
         }
        }

    }

           
        if (Auth::user()->role=='หัวหน้างาน/หัวหน้าสาขาวิชา'){
        if('submit'){
            $user = $withdraw->user->name;
            $department = $withdraw->user->department->dept_name;
            $manager = $withdraw->user->department->manager_name;
            $withdarw_num = $withdraw->withdraw_num;
            $mng_status = $withdraw->approve_mng ? 'อนุมัติ' : 'รออนุมัติ' ;

            Line::send('ใบคำขอเบิกวัสดุถูกอนุมัติ 🟠'."\n".
                        'เลขใบคำขอเบิก : ' .$withdarw_num."\n".
                        'ผู้ขอเบิก : ' .$user."\n".
                        'หน่วยงาน/สาขาวิชา : ' .$department."\n".
                        'หัวหน้างาน/สาขาวิชา : ' .$manager."\n".
                        ' ✅ ' .$mng_status);
        }};

        if (Auth::user()->role=='เจ้าหน้าที่พัสดุ'){
            if('submit'){
                $user =  $withdraw->user->name;
                $department =  $withdraw->user->department->dept_name;
                $manager =  $withdraw->user->department->manager_name;
                $withdarw_num = $withdraw->withdraw_num;
                $mng_status = $withdraw->approve_mng ? 'อนุมัติ' : 'รออนุมัติ' ;
                $spo_name = $withdraw->spo_user;
                $spo_status = $withdraw->approve_spo ? 'ตรวจสอบแล้ว' : 'รออนุมัติ' ;
                $cencel = $withdraw->withdraw_status ? 'ไม่อนุมัติ' : '' ;
                $dir_name = $withdraw->dir_user;
                $dir_status = $withdraw->approve_dir ? 'อนุมัติ' : 'รออนุมัติ' ;
                $pay_name = $withdraw->pay_user;
                $success = $withdraw->approve_success ? 'จ่ายวัสดุแล้ว' : '' ;
    
                Line::send('ใบคำขอเบิกวัสดุถูกอนุมัติ 🟢'."\n".
                            'เลขใบคำขอเบิก : ' .$withdarw_num."\n".
                            'ผู้ขอเบิก : ' .$user."\n".
                            'หน่วยงาน/สาขาวิชา : ' .$department."\n".
                            'หัวหน้างาน/สาขาวิชา : ' .$manager. ' ✅ ' .$mng_status."\n".
                            'เจ้าหน้าที่พัสดุ : ' .$spo_name. ' ✅ ' .$spo_status."\n" .$cencel."\n".
                            'ผู้อำนวยการกองบริหารงานคณะฯ : ' .$dir_name. $dir_status."\n".
                            'ผูู้จ่าย : ' .$pay_name. "\n" .$success);
                            
            }};

            if (Auth::user()->role=='ผู้อำนวยการกองบริหารงานคณะฯ'){
                if('submit'){
                    $user =  $withdraw->user->name;
                    $department =  $withdraw->user->department->dept_name;
                    $manager =  $withdraw->user->department->manager_name;
                    $withdarw_num = $withdraw->withdraw_num;
                    $mng_status = $withdraw->approve_mng ? 'อนุมัติ' : 'รออนุมัติ' ;
                    $spo_name = $withdraw->spo_user;
                    $spo_status = $withdraw->approve_spo ? 'ตรวจสอบแล้ว' : 'รออนุมัติ' ;
                    $dir_name = $withdraw->dir_user;
                    $dir_status = $withdraw->approve_dir ? 'อนุมัติ' : 'รออนุมัติ' ;
                     
        
                    Line::send('ใบคำขอเบิกวัสดุอนุมัติสำเร็จ ✅'."\n".
                                'เลขใบคำขอเบิก : ' .$withdarw_num."\n".
                                'ผู้ขอเบิก : ' .$user."\n".
                                'หน่วยงาน/สาขาวิชา : ' .$department."\n".
                                'หัวหน้างาน/สาขาวิชา : ' .$manager. ' ✅ ' .$mng_status."\n".
                                'เจ้าหน้าที่พัสดุ : ' .$spo_name. ' ✅ ' .$spo_status."\n".
                                'ผู้อำนวยการกองบริหารงานคณะฯ : ' .$dir_name. ' ✅ ' .$dir_status."\n".
                                'อนุมัติสำเร็จ ✅ 💁🏻‍♀️ จ่ายพัสดุได้เลยค่ะ 📦');
                }};
          
       
        return redirect()->back()->with('success','อนุมัติใบคำขอเบิกเรียบร้อยแล้ว');

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Withdraw $withdraw)
    {
        //
        $withdraw->delete('withdrawdetail_id');
        flash('ลบรายการวัสดุงานเรียบร้อยแล้ว')->success();
        return redirect()->route('withdraw.index', compact('user', 'withdraw' , 'withdrawdetail' , 'material' , 'department' ));
    }


public function  mngWithdrawIndex( Request $request )
{
   
    $withdrawdetails = WithdrawDetail::get();
    $materials = Material::get();
    $categories = Category::get();
    $users = User::get();
    $departments = Department::get();

    //แยกใบเบิกตามหน่วยงาน
    $department_id = Auth::user()->department_id;
    $users = User::where('department_id',$department_id)->select('id')->get();
    $userIdArray = array();

    for($i = 0; $i < count($users) ;$i++){
        array_push($userIdArray,$users[$i]->id);
    }

    $withdraws = Withdraw::orderby('created_at','DESC')->where('approve_mng', 0)->whereIn('user_id',$userIdArray)->get();
     
    return view('mngWithdraw.index', compact('users', 'withdraws' , 'withdrawdetails' , 'materials' , 'departments' ));
    
}

public function mngWithdrawShow($id)
{
    //
    $withdraw = Withdraw::where('user_id', Auth::id())->where('status', 1)->get();
    $withdrawdetail = WithdrawDetail::where('withdraw_id', $id)->get();
    $material = Material::get();
    $user = User::get();
    $department = Department::get();
    $category = Category::get();
    
    return view('mngWithdraw.show',compact( 'withdrawdetail' , 'withdraw','material','category' ,'user' , 'department'));
    return redirect()->back()->with('success','อนุมัติใบคำขอเบิกเรียบร้อยแล้ว');
}


public function  spoWithdrawCheckout(Request $request , Withdraw $withdraw_id )
{
     
    $withdraws = Withdraw::orderby('created_at','DESC')->where('approve_dir', 1)->where('approve_success', 0)->get();
    //$withdraws = Withdraw::where('user_id', Auth::id())->orderBy('id' , 'DESC')->first();
    $withdrawdetails = WithdrawDetail::get();
    $materials = Material::get();
    $categories = Category::get();
    $users = User::get();
    $departments = Department::get();
     
    return view('spoWithdraw.checkout', compact('users', 'withdraws' , 'withdrawdetails' , 'materials' , 'departments' ));
    
}


public function  spoWithdrawCheckoutEdit($id ,Request $request )
{
    //dd($request);
    $withdraw = Withdraw::where('id', $id)->where('status', 1)->get();
    $withdrawdetail = WithdrawDetail::where('withdraw_id', $id)->get();
    $material = Material::get();
    $user = User::get();
    $department = Department::get();
    $category = Category::get();
 
    return view('spoWithdraw.checkoutEdit', compact('user', 'withdraw' , 'withdrawdetail' , 'material' , 'department' ));
    
}


public function  spoWithdrawCheckoutShow( $id)
{
    $withdraw = Withdraw::where('id', $id)->where('status', 1)->get();
    $withdrawdetail = WithdrawDetail::where('withdraw_id', $id)->get();
    $material = Material::get();
    $user = User::get();
    $department = Department::get();
    $category = Category::get();
     
     
    return view('spoWithdraw.checkoutShow', compact('user', 'withdraw' , 'withdrawdetail' , 'material' , 'department' ));
    
}

public function spoWithdrawShow($id)
{
    //
    $withdraw = Withdraw::where('status', 1)->get();
    $withdrawdetail = WithdrawDetail::where('withdraw_id', $id)->get();
    $material = Material::get();
    $department = Department::get();
    $category = Category::get();
    return view('spoWithdraw.show',compact( 'withdrawdetail' , 'withdraw','material','category' , 'department'));
   
}

public function dirWithdrawShow($id)
{
    //
    $withdraw = Withdraw::where('status', 1)->get();
    $withdrawdetail = WithdrawDetail::where('withdraw_id', $id)->get();
    $material = Material::get();
    $department = Department::get();
    $category = Category::get();
    return view('dirWithdraw.show',compact( 'withdrawdetail' , 'withdraw','material','category' , 'department'));
   
}



 function notify_message($message){

   

    $LINE_API = "https://notify-api.line.me/api/notify";
    $LINE_TOKEN = "mT37KeIUYhzQIr7wsTOj87NBBTR7ZKNHy7wIQMsHbCk";
    
    $queryData = array('message' => $message);
    $queryData = http_build_query($queryData,'','&');
    $headerOptions = array(
        'http'=>array(
            'method'=>'POST',
            'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                    ."Authorization: Bearer ".$LINE_TOKEN."\r\n"
                    ."Content-Length: ".strlen($queryData)."\r\n",
            'content' => $queryData
        )
    );
    $context = stream_context_create($headerOptions);
    $result = file_get_contents($LINE_API,FALSE,$context);
    $res = json_decode($result);
    return $res;
}


}

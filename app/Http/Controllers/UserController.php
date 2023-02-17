<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderby('created_at','DESC')->get();
        $usersGroupByRole = User::groupBy('role')
        ->selectRaw('count(*) as total, role')
        ->get();
        $usersGroupByRoleCount = array();
        foreach ($usersGroupByRole as $value) {
            $usersGroupByRoleCount[$value->role] = $value->total;
        }

        $employee = User::orderby('created_at','DESC')->where('role','บุคลากร/อาจารย์')->get();
        $manager = User::orderby('created_at','DESC')->where('role','หัวหน้างาน/หัวหน้าสาขาวิชา')->get();
        $supOffice = User::orderby('created_at','DESC')->where('role','เจ้าหน้าที่พัสดุ')->get();
        $director = User::orderby('created_at','DESC')->where('role','ผู้อำนวยการกองบริหารงานคณะฯ')->get();
        $admin = User::orderby('created_at','DESC')->where('role','แอดมิน')->get();

        return view('users.index', compact('users', 'usersGroupByRoleCount','employee','manager','supOffice','director','admin'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $departments = Department::get();
        return view('users.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:255|confirmed',
            'department',
            'emp_position' ,
            'emp_type' ,
            'emp_phone' ,
            'line_id',
            'emp_note',
            'signatureImage' => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role'=> 'required'
        ]);


        $signatureImage = null;
        if($request->hasFile('signatureImage')){
            $signatureImage = date('YmdHis') . "." .$request->signatureImage->extension();
            $request->signatureImage->move(public_path('storage/signatureImage'), $signatureImage);
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'department_id' => $request->department,
            'emp_position' => $request->emp_position,
            'emp_type' => $request->emp_type,
            'emp_phone' => $request->emp_phone,
            'line_id' => $request->line_id,
            'emp_note' => $request->emp_note,
            'signatureImage' => $signatureImage,
            'role' => $request->role
       
        ]);

           return redirect()->route('users.index')
                        ->with('success','เพิ่มผู้ใช้งานเรียบร้อยแล้ว');
         
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
        $user = User::find($id);
        $department = Department::get();
        return view('users.edit', compact('user','department'));
        
        
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
        $user = User::findOrFail($id);
        $department = Department::get();
        return view('users.edit',compact('user','department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        $request->validate([
            'name',
            'email'.$user->id,
            'department',
            'emp_position' ,
            'emp_type' ,
            'emp_phone' ,
            'line_id',
            'emp_note',
            'role'
        ]);

        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'department_id' => $request->department,
            'emp_position' => $request->emp_position,
            'emp_type' => $request->emp_type,
            'emp_phone' => $request->emp_phone,
            'line_id' => $request->line_id,
            'emp_note' => $request->emp_note,
            'role' => $request->role
            
        ]);

            return redirect()->route('users.index')
                            ->with('success','แก้ไขผู้ใช้งานเรียบร้อยแล้ว');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
       
        $user->delete();
        flash('ลบผู้ใช้งานเรียบร้อยแล้ว')->success();
        return redirect()->route('users.index');

    }


    public function empSetting(Request $request, User $user ,$id)
    {
        
        
        $request->validate([
            'name',
            'email'.$user->id,
            'department',
            'emp_position' ,
            'emp_type' ,
            'emp_phone' ,
            'line_id',
            'emp_note',
            'role'
        ]);

        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'department' => $request->department,
            'emp_position' => $request->emp_position,
            'emp_type' => $request->emp_type,
            'emp_phone' => $request->emp_phone,
            'line_id' => $request->line_id,
            'emp_note' => $request->emp_note,
            'role' => $request->role
            
        ]);

       
      
            return redirect()->route('empSetting.edite' ,compact('user','department'))
                            ->with('success','แก้ไขผู้ใช้งานเรียบร้อยแล้ว');
        }

        public function mngSettingIndex() {

            $user = User::where('user_id', Auth::id())->get();
            $department = Department::get();

            return redirect()->route('mngSetting.index', compact('user' ,'department'));
            
        }

        public function nmgSetting(Request $request, User $user ,$id) {

        $user = User::findOrFail($id);
        $department = Department::get();
        
        
        $request->validate([
            'name',
            'email'.$user->id,
            'department',
            'emp_position' ,
            'emp_type' ,
            'emp_phone' ,
            'line_id',
            'emp_note',
            'role'
        ]);

        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'department' => $request->department,
            'emp_position' => $request->emp_position,
            'emp_type' => $request->emp_type,
            'emp_phone' => $request->emp_phone,
            'line_id' => $request->line_id,
            'emp_note' => $request->emp_note,
            'role' => $request->role
            
        ]);

       
            return redirect()->route('mngSetting.edit' ,compact('user','department'))
                            ->with('success','แก้ไขผู้ใช้งานเรียบร้อยแล้ว');
        }



   
}



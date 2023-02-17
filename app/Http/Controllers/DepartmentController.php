<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departments = Department::orderby('created_at','DESC')->get();
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $this->validate($request,[
            'dept_name' ,
            'manager_name' ,
            'dept_address' 
            ]);
    
            $department = new Department();
            $department->dept_name = $request->dept_name;
            $department->manager_name = $request->manager_name;
            $department->dept_address = $request->dept_address;
            $department->save();
    
            flash(' เพิ่มหน่วยงาน/สาขาวิชาเรียบร้อแล้ว ')->success();
            return redirect()->route('departments.index');
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
        return view('departments.index');
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
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
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
        //Validation
        $this->validate($request,[
            'dept_name'. $id,
            'manager_name',
            'dept_address' 
            ],
        );
    
            $department = Department::FindorFail($id);
            $department->dept_name = $request->dept_name;
            $department->manager_name = $request->manager_name;
            $department->dept_address = $request->dept_address;
            $department->save();
    
            flash('แก้ไขหน่วยงาน/สาขาวิชาเรียบร้อแล้ว')->success();
            return redirect()->route('departments.index');
        
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
        $department = Department::findOrFail($id);
        $department->delete();

        flash('ลบหน่วยงาน/สาขาวิชาเรียบร้อแล้ว')->success();
        return redirect()->route('departments.index');

    }
}

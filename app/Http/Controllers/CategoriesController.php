<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Routing\ontroller;
use Illuminate\Http\Request;
use App\Http\Controllers\flash;
use Illuminate\Http\Response;

class CategoriesController extends Controller
{
    public function index(){
        
        $categories = Category::orderby('created_at','DESC')->get();
        return view('categories.index', compact('categories'));

    }
    
    public function create(){
        return view('categories.create');
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));

    }

    public function store(Request $request){
        //Validation
        $this->validate($request,[
        'cate_name' => 'required|min:2|max:50|unique:categories'
        ]);

        $category = new Category();
        $category->cate_name = $request->cate_name;
        $category->save();

        flash('เพิ่มหมวดหมู่วัสดุเรียบร้อยแล้ว')->success();
        return redirect()->route('categories.index');
    }
    public function update(Request $request , $id){

        //Validation
        $this->validate($request,[
        'cate_name' => 'required|min:2|max:50|unique:categories,cate_name,' . $id
        ]);

        $category = Category::FindorFail($id);
        $category->cate_name = $request->cate_name;
        $category->save();

        flash('แก้ไขหมวดหมู่วัสดุเรียบร้อยแล้ว')->success();
        return redirect()->route('categories.index');

    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();

        flash('ลบหมวดหมู่วัสดุเรียบร้อยแล้ว')->success();
        return redirect()->route('categories.index');

    }

}

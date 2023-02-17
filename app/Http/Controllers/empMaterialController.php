<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Material;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;




class empMaterialController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $materials = Material::orderby('created_at','DESC')->get();
        //
        $keyword = $request->keyword;
        $materias = Material::where('mate_name', 'LIKE', "%{$keyword}%")->orWhere('material_id', 'LIKE', "%{$keyword}%");
        $searchMaterials = Material::where('mate_name', 'LIKE', "%{$keyword}%")->count();
        //$materias->appends(['keyword' => $keyword ?? ""]);

        $categories = Category::orderby('created_at','DESC')->get();
        
        
        return view('emp-materials', compact('materials','categories'));

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
        
        
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material, $id)
    {
        //
        $material = Material::find($id);
        $category = Category::get();
        return view('empMaterial.show',compact('material','category'));


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

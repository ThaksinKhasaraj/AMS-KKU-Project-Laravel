<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Category;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $materials = Material::orderby('created_at','DESC')->get();
        $categories = Category::get();
        $materialsTotal = Material::groupBy('mate_amount')
        ->selectRaw('count(*) as total, mate_amount')
        ->get();
        $Totalmate_amount = Material::where('mate_status', 1)->sum('mate_amount');

        $Stock = Material::where('mate_status', 1)
        ->where('mate_amount', '>' , 3)->count('mate_amount');

        $InStock = Material::where('mate_status', 1)
        ->where('mate_amount', '>' , 3)->orderby('created_at','DESC')->get();

        $min = Material::where('mate_amount', '<' , 3)->count('mate_amount');

        $minStock = Material::where('mate_amount','<' , 3)->orderby('created_at','DESC')->get();

        $countOutstock = Material::where('mate_amount', '==' , 0)->count('mate_amount');
        $Outstock = Material::where('mate_amount', '==' , 0)->orderby('created_at','DESC')->get();
        

        return view('materials.index', compact('materials','categories','materialsTotal', 
        'Totalmate_amount','Stock','InStock','min','minStock' ,'countOutstock','Outstock'));
           

        
    }

    /**
     * Show empMaterials
     * แสดงรายการวัสดุในส่วนของบุคลากร
     * 
     */

    public function  empMaterials(Request $request)
    {

        //$material = Material::orderby('created_at','DESC')->get();
        //

        $materials = Material::orderby('created_at','DESC')->where('mate_amount' ,'>',1)->get();
        //
        $keyword = $request->keyword;
        $materias = Material::where('mate_name', 'LIKE', "%{$keyword}%")->orWhere('material_id', 'LIKE', "%{$keyword}%");
        $searchMaterials = Material::where('mate_name', 'LIKE', "%{$keyword}%")->count();
        //$materias->appends(['keyword' => $keyword ?? ""]);

        $categories = Category::orderby('created_at','DESC')->get();
        
        
        return view('emp-materials', compact('materials','categories','searchMaterials', 'keyword'));

    }


    public function search(Request $request){
        $materials = Material::orderBy('id','desc')->where('mate_name','LIKE','%'.$request->material.'%');
        if($request->category != "ALL") $materials->where('category_id',$request->category);
        $materials = $materials->get();
        $categories = Category::all();
        
        return view('emp-materials',compact( 'materials','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::get();
        return view('materials.create', compact('categories'));
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
        $request->validate([
            'mateID' => 'required',
            'mate_name' => 'required',
            'mate_price' => 'required',
            'mate_amount' => 'required',
            'mate_unit' => 'required',
            'mate_detail',
            'category'=> 'required',
            'mate_status' => 'required',
            'mate_note' => 'required',
            'mateImage' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        $imageName = null;
        if($request->hasFile('mateImage')){
            $imageName = date('YmdHis') . "." .$request->mateImage->extension();
            $request->mateImage->move(public_path('storage/mateImage'), $imageName);
        }

        $material = Material::create([
            'mateID'     => $request->mateID,
            'mate_name'    => $request->mate_name,
            'mate_price' => $request->mate_price,
            'mate_amount' => $request->mate_amount,
            'mate_unit' => $request->mate_unit,
            'mate_detail' => $request->mate_detail,
            'category_id' => $request->category,
            'line_id' => $request->line_id,
            'mate_status' => $request->mate_status,
            'mate_note' => $request->mate_note,
            'mateImage' => $imageName  
        ]);


        return redirect()->route('materials.index')
                        ->with('success','เพิ่มรายการวัสดุเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
        $material = Material::find($id);
        $category = Category::get();
        return view('materials.show',compact('material','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Material::findOrFail($id);
        $category = Category::get();
        return view('materials.edit',compact('material' , 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //
        $request->validate([
            
            'mateID',
            'mate_name',
            'mate_price',
            'mate_amount',
            'mate_unit',
            'mate_detail',
            'category',
            'mate_status',
            'mate_note'
            //'mateImage' => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        
        // $imageName = null;
        // if($request->hasFile('mateImage')){
        //     $imageName = date('YmdHis') . "." .$request->mateImage->extension();
        //     $request->mateImage->move(public_path('storage/mateImage'), $imageName);
        // }else{
        //     unset($request['mateImage']);
        // }

        $material->update([
            'mateID'     => $request->mateID,
            'mate_name'    => $request->mate_name,
            'mate_price' => $request->mate_price,
            'mate_amount' => $request->mate_amount,
            'mate_unit' => $request->mate_unit,
            'mate_detail' => $request->mate_detail,
            'category_id' => $request->category,
            'mate_status' => $request->mate_status,
            'mate_note' => $request->mate_note
            //'mateImage' => $imageName
            
        ]);

  
        return redirect()->route('materials.index')
                        ->with('success','แก้ไขรายการวัสดุเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
       
        $material->delete();
        flash('ลบรายการวัสดุเรียบร้อยแล้ว')->success();
        return redirect()->route('materials.index');

    }

    public function cartIndex( Request $request )
    {
        
        $carts = Cart::get();
        $cartdetails = CartDetail::get();
        $materials = Material::get();
        $categories = Category::get();
        $users = User::get();
        $departments = Department::get();

        return view('cart',compact('carts', 'cartdetails' , 'materials' , 'categories' , 'users' ,'departments'));
        
    }

    public function addToCart($id)
    {
        $material = Material::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['amount']++;
        } else {
            $cart[$id] = [
                "material_id" => $material->id,
                "mateID" => $material->mateID,
                "mate_name" => $material->mate_name,
                "amount" => 1,
                "mate_unit" => $material->mate_unit,
                "mateImage" => $material->mateImage
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'เพิ่มวัสดุเรียบร้อยแล้ว');
    }


    public function updateCart(Request $request)
    {
        
        if($request->id && $request->amount){
            $cart = session()->get('cart');
            $cart[$request->id]["amount"] = $request->amount;
            session()->put('cart', $cart);
            session()->flash('success', 'เพิ่มจำนวนวัสดุเรียบร้อยแล้ว');
        }
    }

    public function removeCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'ลบวัสดุเรียบร้อยแล้ว');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Material;
use App\Models\Category;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    
    public function cartIndex( Request $request )
    {
        //
        $carts = Cart::get();
        $cartdetails = CartDetail::get();
        $materials = Material::get();
        $categories = Category::get();
        $users = User::get();
        $departments = Department::get();

        return view('cart',compact('carts', 'cartdetails' , 'materials' , 'categories' , 'users' ,'departments'));
        
    }

    //ไม่ได้ใช้ส่วนนี้ ทั้งนี้ใช้ใน MaterialController

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


    public function update(Request $request )
    {
        
         
        $cart = session()->get('cart', []);
        if($request->id && $request->amount){
            $cart = session()->get('cart');
            $cart[$request->id]["amount"] = $request->amount;
            session()->put('cart', $cart);
            session()->flash('success', 'เพิ่มจำนวนวัสดุเรียบร้อยแล้ว');
        }
    }


    public function remove(Request $request)
    {
        foreach (session('cart') as $session_cart_items[]) {
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


    public function destroy( Cart $cart , $id)
    {
        //
        $cart = Material::findOrFail($id);
        $cart->delete('material_id');

        flash('ลบรายการวัสดุงานเรียบร้อยแล้ว')->success();
        return redirect()->route('cart.index');
        
    }
}

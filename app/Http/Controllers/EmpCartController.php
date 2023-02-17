<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\empCart;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Department;
use App\Models\User;
use App\Models\Material;
use App\Models\empCartDetail;
Use Auth;


class EmpCartController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        //
        // 0 = ตะกร้า , 1 = เช็คเอ้า
        //$order = Order::where('user_id', Auth::id())->where('status', 0)->first();

        $empcarts = empCart::orderby('created_at','DESC')->get();
        $materials = Material::orderby('created_at','DESC')->get();
        return view('empCart.index',compact('empcarts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function store(Request $request)
    {
    
        $material = Material::find($request->material_id);
        $empcart = empCart::where('user_id', Auth::id())->where('status', 0)->first();

        if ($empcart) {
            $empcartdetail = $empcart->emp_cart_details()->where('material_id', $material->id)->first();
            if ($empcartdetail) {
                $amountNew = $empcartdetail->amount + 1;
                $empcartdetail->update([
                    'amount' => $amountNew
                ]);
            } else {
                $prepareEmpcartdetail = [
                    'empCartID' => $empcart->id,
                    'material_id' => $material->id,
                    'mateName' => $material->mateName,
                    'amount' => 1,
                    'unit' => $material->unit,
                ];
                $empcartdetail = empCartDetail::create($prepareEmpcartdetail);
            }
        } else {
            $prepareempcart = [
                'status' => 0,
                'user_id' => Auth::id()
            ];

            $empcart = empCart::create($prepareempcart);


            $prepareEmpcartdetail= [
                'empCartID' => $empcart->id,
                'material_id' => $material->id,
                'mateName' => $material->mateName,
                'amount' => 1,
                'unit' => $material->unit,
            ];
            $empcartdetail = empCartDetail::create($prepareEmpcartdetail);
        }

        $totalRaw = 0;
        $total = $empcart->emp_cart_details->map(function ($empcartdetail) use ($totalRaw) {
            // totalRaw = totalRaw +  $orderDetail->amount * $orderDetail->price;
            $totalRaw += $empcartdetail->amount * $empcartdetail->unit;
            return $totalRaw;
        })->toarray();
        

        $empcart->update([
            'total' => array_sum($total)
        ]);


        return redirect()->route('empCart.index')
               ->with('success','empCart created successfully.');
    }
    
     // public function store(Request $request)
    // {
    //     //dd($request);
    //    //Validation

    //    $material = Material::where($request->material_id);
    //    $empCart = empCart::where('user_id', Auth::id());

    //       $request->validate([
    //         'empCartID', 
    //         'mateID',
    //         'mateName' => 'required',
    //         'mateImage',
    //         'matePrice',
    //         'mateUnit',
    //         'mateAmount'
    //         //

    //     ]);

    //     $empcart = empCart::create([
    //     'empCartID' => Auth::id(), 
    //     'mateID' => $request->mateID,
    //     'mateName' => $request->mateName,
    //     'mateImage' => $request->mateName,
    //     'matePrice'  => $request->matePrice,
    //     'mateUnit'  => $request->mateUnit,
    //     'mateAmount'  => $request->mateAmount
        
    //     ]);


    //     $empcart = $request->all();

    //        return redirect()->route('empCart.index')
    //                     ->with('success','Users created successfully.');


    // }
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empCart  $empCart
     * @return \Illuminate\Http\Response
     */
    public function show(empCart $empCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empCart  $empCart
     * @return \Illuminate\Http\Response
     */
    public function edit(empCart $empCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empCart  $empCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, empCart $empCart)
    {
        //

        $empCartDetail = $empcart->emp_cart_details()->where('material_id', $request->material_id)->first();

        if ($request->value = "checkout") {
            $empcart->update([
                'status' => 1
            ]);
        } else {
            if ($empCartDetail) {
                if ($request->value == "increase") {
                    $amountNew = $empCartDetail->amount + 1;
                } else {
                    $amountNew = $empCartDetail->amount - 1;
                }

                $empCartDetail->update([
                    'amount' => $amountNew
                ]);
            }


            $totalRaw = 0;
            $total = $order->emp_cart_details->map(function ($empCartDetail) use ($totalRaw) {
                // totalRaw = totalRaw +  $orderDetail->amount * $orderDetail->price;
                $totalRaw += $empCartDetail->amount * $empCartDetail->price;
                return $totalRaw;
            })->toarray();

            $empcart->update([
                'total' => array_sum($total)
            ]);
        }



        return redirect()->route('empCart.index')
                             ->with('success','Users created successfully.');
    }

        
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empCart  $empCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(empCart $empCart)
    {
        //
    }

    
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}





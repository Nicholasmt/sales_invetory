<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discounts;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = 1;
        $discounts = Discounts::all();
        $products = Products::all();
        return view('admin.promo.index', compact('discounts', 'count', 'products'));
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
    public function store(Request $request , Discounts $discount)
    {
         $rules=['product' => 'required'];

         $messages=['product.required' => 'Select a Product'];

         $validate = Validator::make($request->all(), $rules, $messages);

                if($validate->fails())
                {
                    return back()->withErrors($validate->errors());
                }
                else
                {
                    $id = $request->product;
                    $product = Products::find("$id");

                    if($request->discount_rate)
                    {
                        $decimal = $request->discount_rate/100;
                        $rate = $product->price * $decimal;
 
                       
                        $discount_price = $product->price - $rate;

                        $exist = Discounts::where('product_id', $request->product)->first();
                       
                        if($exist)
                        {
                            
                                $exist->product_id =  $request->product;
                                $exist->discount_per_product = $discount_price;
                                $exist->discount_rate = $request->discount_rate;
                                $exist->update();

                                return back()->with('success', 'Discount Updated Successfully'); 
                        }

                          else
                          {
                                        
                                //save
                                $discount->product_id = $request->product;
                                $discount->discount_per_product = $discount_price;
                                $discount->discount_rate = $request->discount_rate;
                                $discount->save();
                                
                                return back()->with('success', 'Discount Added Successfully');

                          }

 
                    }
                       

                   
                   elseif($request->product_qty)
                    {
                        $Total_qty_price = $product->price * $request->product_qty;
                        $qty_percetage = $request->qty_rate/100;
                        $qtyRate = $Total_qty_price * $qty_percetage;
                        $qtyPrice = $Total_qty_price - $qtyRate;

                       $alreadyExist = Discounts::where('product_id', $request->product)->first();

                        if($alreadyExist)
                        {
                            $alreadyExist->product_id = $request->product;
                            $alreadyExist->product_qty = $request->product_qty;
                            $alreadyExist->qty_rate = $request->qty_rate;
                            $alreadyExist->qty_price =   $qtyPrice; 
                            $alreadyExist->update();

                            return back()->with('success', ' Discount Added Successfully');
                        }

                        else
                        {

                            
                        //save
                        $discount->product_id = $request->product;
                        $discount->product_qty = $request->product_qty;
                        $discount->qty_rate = $request->qty_rate;
                        $discount->qty_price =   $qtyPrice;
                      
                         $discount->save();
                       
                        return back()->with('success', ' Discount Added Successfully');

                        }

                       
                }

                    else
                    {
                        return back()->with('error', 'Pls... Select Discount Rate or Product Quantity');
                       
                    }

                   
                }

        
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
    public function edit(Discounts $discount)
    {
        $products = Products::all();
        return view('admin.promo.edit', compact('discount','products'));
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count=1;
        $categories = Categories::all();  
        $products = Products::all();  
        return view('admin.products.index', compact('products','categories','count'));
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
    public function store(Request $request, Products $product)
    {
                    $rules=['price' => 'required',
                             'qty' => 'required',
                            'category' => 'required'];

            $messages =['category.required' => 'select a product category'];

            $validate = Validator::make($request->all(), $rules, $messages);

                if($validate->fails())
                {
                    return back()->withErrors($validate->errors());
                    
                }
                else
                {
                   $value = $request->price * $request->qty;
                   $product->product_name = $request->product_name;
                   $product->price = $request->price;
                   $product->cat_id = $request->category;
                   $product->qty = $request->qty;
                   $product->total_value = $value;
                   $product->save();
                   return back()->with('success', 'Product Added Successfully!');

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
    public function edit(Products $product)
    {
       $categories = Categories::all();
       return view('admin.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product)
    { 
        $value=$request->qty + $request->price;
       Products::where('id',$product)->update(['product_name'=>$request->product_name,
                                               'price'=>$request->price,
                                               'qty'=>$request->qty,
                                               'cat_id'=>$request->category,
                                               'total_value'=>$value,
                                                ]);
         return back()->with('success','Updated Successfully');
    }

    public function delete(Products $product)
    {
      return view('admin.products.delete',compact('product'))->render();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$product)
    { 
         $id =session()->get('id');
        $user = Users::find("$user");
       if(\Hash::check($request->password,$user->passsword))
       {
          Products::where('id',$product)->delete();
          return back('success','Deleted Successfully');
       }
       else
       {
        return back('error','Incorrect Password');
       }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales_invocie;
use App\Models\Users;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Discounts;
use App\Models\Customer;

class SalesInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = 1;
        $id = session()->get('id');
        $sellers = Users::find("$id");
        $sales = Sales_invocie::where('user_id',$sellers->id)->get();
        $cat = Categories::all();
        $product = Products::all();
        $discount = Discounts::all();
        return view('sellers.sales.index', compact('sales','count','product','cat', 'discount'));
    }

    public function load_product($id)
    {
        $product = Products::where('cat_id',$id)->get();
        return view('sellers.sales.load-product',compact('product'))->render();
    }

    public function load_discount($id)
    {
        $discount = Discounts::where('product_id', $id)->first();
         if($discount == null)
         {
            return view('sellers.sales.no-discount')->with('error', 'No discount for this Product');
         }
         else
         {
            return view('sellers.sales.load-discount', compact('discount'))->render();
         }

    }

    public function load_customer($id)
    {
        $customer = Customer::where('phone', 'like', "%{$id}%")->first();
        return view('sellers.sales.load-customer',compact('customer'))->render();
    }

    public function all_sales()
    {
            $count = 1;
            $id = session()->get('id');
            $sellers = Users::find("$id");
           $sales = Sales_invocie::where('user_id',$sellers->id)->get();


         return view('sellers.sales.all_sales', compact('sales','count'));
    }

    public function searchResult($keyword)
    {
            $count = 1;
            $id = session()->get('id');
            $sellers = Users::find("$id");
            $sales = Sales_invocie::where('user_id', $sellers->id)->where('invoice_no', 'like', "%{$keyword}%")->get();

         return view('sellers.sales.load-sales-result', compact('sales','count'))->render();
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

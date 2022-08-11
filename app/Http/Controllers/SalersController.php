<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Sales_invocie;
use App\Models\Users;
use App\Models\Discounts;
use App\Models\Company_setup;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
 


use Illuminate\Http\Request;

class SalersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id = session()->get('id');
      $daily_sales = Sales_invocie::where('user_id', $id)->whereDate('created_at', date("Y:m:d"))->get();
      $monthly_sales = Sales_invocie::where('user_id', $id)->whereMonth('created_at', date('m'))->get();
      $yearly_sales = Sales_invocie::where('user_id', $id)->whereYear('created_at', Carbon::now()->year)->get();

      $totalDaily = $daily_sales->sum('amount');
      $totalMonthly = $monthly_sales->sum('amount');
      $totalYearly = $yearly_sales->sum('amount');

      $daily_qty = $daily_sales->sum('qty');
      $monthly_qty =  $monthly_sales->sum('qty');
      $yearly_qty = $yearly_sales->sum('qty');

      $product = Products::all();

      return view('sellers.dashboard', compact('totalDaily','totalMonthly', 'totalYearly', 
                                                'daily_qty', 'monthly_qty', 'yearly_qty',
                                                  'daily_sales','monthly_sales','yearly_sales', 'product'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
         $category = Categories::all();
         

        return view('sellers.products.overview',compact('category' ));  
    }

    public function view_product($id)
    {

        $product = Products::where('cat_id', $id)->get();

        return view('sellers.products.view-product', compact('product'));

    }


     
    public function sales_invoice($id)
      {

           $company = Company_setup::all();
           $invoice = Sales_invocie::find("$id");

           return view('sellers.invoice.invoice', compact('invoice', 'company'));
      }

      public function invoice_print($id)
      {

        $company = Company_setup::all();
        $invoice = Sales_invocie::find("$id");

         return view('sellers.invoice.print-invoice', compact('invoice', 'company'));
      }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Sales_invocie $sales_invocie, Products $product)
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

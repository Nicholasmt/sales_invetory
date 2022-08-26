<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales_invoice;
use App\Models\Users;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Discounts;
use App\Models\Customer;
use App\Models\Checkout;
use App\Models\Company_setup;

class SalesInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $css=[
            'css/datatables.min.css'
            ];
        $js=[
            'dataTables/datatables.min.js','js/dataTables/dataTables.bootstrap4.min.js' 
            ];
        $count = 1;
        $id = session()->get('id');
        $sellers = Users::find("$id");
        $sales = Sales_invoice::where('user_id',$id)->get();
        $cat = Categories::all();
        $product = Products::all();
        $discount = Discounts::all();
        $checkouts = Checkout::where('user_id',$id)->get();
        return view('sellers.sales.index', compact('sales','count','product','cat','js','css','checkouts', 'discount'));
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
        $css=[
            'css/datatables.min.css'
            ];
        $js=[
            'dataTables/datatables.min.js','js/dataTables/dataTables.bootstrap4.min.js' 
            ];
            $count = 1;
            $id = session()->get('id');
            $sellers = Users::find("$id");
           $sales = Sales_invoice::where('user_id',$sellers->id)->get();
          return view('sellers.sales.all_sales', compact('sales','count','js','css'));
    }

    public function searchResult($keyword)
    {
            $count = 1;
            $id = session()->get('id');
            $sellers = Users::find("$id");
            $sales = Sales_invoice::where('user_id', $sellers->id)->where('invoice_no', 'like', "%{$keyword}%")->get();

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


    public function checkout_selected(Request $request)
    {
           $selected = $request->ids; 
           $checkouts = Checkout::whereIn('id',$selected)->get();
            $totalPayment = $checkouts->sum('amount');
            $carts = Checkout::all();
            $count = 1;
            return view('sellers.sales.checkout.load-checkout',compact('totalPayment','checkouts'))->render();

    }


    public function checkout_sales(Request $request)
    {
       $selected = $request->ids;
      if($request->has('checkout'))
      {
        if($request->has('ids'))
        {
            $checkouts = Checkout::whereIn('id',$selected)->get();
            $totalPayment = $checkouts->sum('amount');
            $carts = Checkout::all();
            $count = 1;
            return view('sellers.sales.checkout.index',compact('totalPayment','checkouts','carts','count'))->render();
        }
        else
        {
            return back()->with('error','Please Select to Chechout');
        }
      }
      elseif($request->has('delete'))
      {
        if($request->has('ids'))
        {
            Checkout::whereIn('id',$selected)->delete();
            return back()->with('success','Deleted');
        }

        else
        {
            return back()->with('error','Please Select to Delete');
        }
        
      }
       
        
    }

    public function sales_receipt(Request $request)
    {
        $company = Company_setup::where('active',1)->first();
        $selected = $request->ids;
        $checkouts = Checkout::whereIn('id',$selected)->get();
          foreach($checkouts as $checkout)
          {
           $sales[] = Sales_invoice::create(['product_id'=>$checkout->product_id,
                                    'user_id'=>$checkout->user_id,
                                    'customer_id'=>$checkout->customer_id,
                                    'discount_id'=>$checkout->discount_id,
                                    'invoice_no'=>$checkout->invoice_no,
                                    'quantity'=>$checkout->quantity,
                                    'amount'=>$checkout->amount,
                                   ]);
                                   
           }
             foreach($sales as $sale)
             {
               $total=$sale->sum('amount');
             }
               Checkout::whereIn('id',$selected)->delete();
            return view('sellers.invoice.index',compact('sales','total','company'));
           
    }

     public function view_receipt($id)
     {
        $company = Company_setup::where('active',1)->first();
        $sales = Sales_invoice::where('id',$id)->first();
        return view('sellers.sales.rececipt.index', compact('sales','company'));
     }

     public function print_sales_receipt($id)
     {
        $company = Company_setup::where('active',1)->first();
        $sales = Sales_invoice::find("$id");
        return view('sellers.sales.rececipt.print', compact('sales','company'));
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
    public function destroy(Request $request)
    {
        
    }
}

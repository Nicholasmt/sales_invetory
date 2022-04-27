<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Sales_invocie;
use App\Models\Users;
use App\Models\Discounts;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
 


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
        return view('sellers.dashboard');
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


    public function create_sales()
    {   
        
        $count = 1;
        $id = session()->get('id');
        $sellers = Users::find("$id");
       $sales = Sales_invocie::where('user_id',$sellers->id)->get();

        $cat = Categories::all();
        $product = Products::all();
        $discount = Discounts::all();

         return view('sellers.sales.create_sale', compact('sales','count', 'cat', 'product', 'discount'));
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
           $sales = Sales_invocie::where('user_id', $sellers->id)->where('customer_name', 'like', "%{$keyword}%")->get();

         return view('seller.sales.load-sales-result', compact('sales','count'))->render();
    }



      public function loader($id)
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

      public function sales_invoice($id)
      {
           $invoice = Sales_invocie::find("$id");

           return view('sellers.invoice.invoice', compact('invoice'));
      }

      public function invoice_print($id)
      {
        $invoice = Sales_invocie::find("$id");

         return view('sellers.invoice.print-invoice', compact('invoice'));
      }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Sales_invocie $sales_invocie, Products $product)
    {
        $rules=['category' => 'required',
                  'product'=> 'required',
                   'qty' => 'required',
                    'customer_name'=>'required',
                      'customer_phone' => 'required'];

         $messages=[ 'category.required' => 'Select a Category',
                     'product.required' => 'Select a Product'
                    ];

         $validate = Validator::make($request->all(), $rules, $messages);

                if($validate->fails())
                {
                    return back()->withErrors($validate->errors());
                } 

                else
                {

                    $random = Str::random(14);

                    
                    $id = session()->get('id');
                    $user = Users::find("$id");

                    $product = Products::find($request->product);
                 

                  $discount = Discounts::where('product_id', $request->product)->first(); 
                  
            if($request->qty <= $product->qty )
            {

                  if($discount == null)
                  {
                    
                    $product_total_price = $product->price * $request->qty;

                    $sales_invocie->product_id = $request->product; 
                    $sales_invocie->cat_id = $request->category; 
                    $sales_invocie->user_id = $user->id;
                    $sales_invocie->discount_id = $discount->id;
                    $sales_invocie->invoice_no = $random;   
                    $sales_invocie->qty = $request->qty; 
                    $sales_invocie->amount =  $product_total_price; 
                    $sales_invocie->customer_name = $request->customer_name; 
                    $sales_invocie->customer_phone = $request->customer_phone;
                    $sales_invocie->customer_address = $request->customer_address;
                    $sales_invocie->save();

                             // update qty
                       $availbleStock =  $product->price - $request->qty;
                       $product->qty = $availbleStock;
                       $product->update();

                    return back()->with('success', 'Purchase was successfuly with normal price');
                    

                  }

                  else
                    {
                          $discount_price = $request->product_discount_price;
                          $qty_discount = $request->product_qty_price;

                          if($request->qty < $discount->product_qty || $discount->discount_per_product !== null || $discount->product_qty == null)
                          {
                            $sales_invocie->product_id = $request->product; 
                            $sales_invocie->cat_id = $request->category; 
                            $sales_invocie->user_id = $user->id; 
                            $sales_invocie->discount_id = $discount->id;
                            $sales_invocie->invoice_no = $random;   
                            $sales_invocie->qty = $request->qty; 
                            $sales_invocie->amount =  $discount_price; 
                            $sales_invocie->customer_name = $request->customer_name; 
                            $sales_invocie->customer_phone = $request->customer_phone;
                            $sales_invocie->customer_address = $request->customer_address;

                            $sales_invocie->save();

                               // update qty
                            $availbleStock =  $product->price - $request->qty;
                            $product->qty = $availbleStock;
                            $product->update();

                            return back()->with('success', 'Purchase was successfuly with discount price');
    
                          }
                          
                            elseif($discount->qty_price !== null && $request->qty >= $discount->product_qty)
                            {

                                $sales_invocie->product_id = $request->product; 
                                $sales_invocie->cat_id = $request->category; 
                                $sales_invocie->user_id = $request->$user->id; 
                                $sales_invocie->discount_id = $discount->id;
                                $sales_invocie->invoice_no = $random;   
                                $sales_invocie->qty = $request->qty; 
                                $sales_invocie->amount =  $qty_discount; 
                                $sales_invocie->customer_name = $request->customer_name; 
                                $sales_invocie->customer_phone = $request->customer_phone;
                                $sales_invocie->customer_address = $request->customer_address;

                                $sales_invocie->save();

                                 // update qty
                                $availbleStock =  $product->price - $request->qty;
                                $product->qty = $availbleStock;
                                $product->update();

                                return back()->with('success', 'Purchase was successfuly with product qty promo price');

        
                            }

                            else
                            {
                               return back()->with('error', 'failed try again...');
                            }


                    }     

                  
                  }

                  else
                    {
                        return back()->with('error', 'OUT OF STOCK!');
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

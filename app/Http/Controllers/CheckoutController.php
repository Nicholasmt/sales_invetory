<?php

namespace App\Http\Controllers;
use App\Models\Checkout;
use App\Models\Users;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Discounts;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Checkout::all();
        $count = 1;
        $totalPayment = null;
        $checkouts = null;
        return view('sellers.sales.checkout.index',compact('carts','count','totalPayment','checkouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $rules=['product'=> 'required',
                        'qty' => 'required',
                        'name'=>'required',
                        'phone' => 'required',
                        'address' => 'required'
                        ];

        $messages=['category.required' => 'Select a Category',
                    'product.required' => 'Select a Product'
                  ];
        $validate = \Validator::make($request->all(), $rules, $messages);
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

                //customer details
                $customer = Customer::where('phone',$request->phone)->first();

                //update product quantity
                $bal = $request->qty * $product->price;
                $remaining_val = $product->total_value - $bal;
                $availbleStock =  $product->qty - $request->qty;
                if($request->qty <= $product->qty )
                {
                if($discount == null)
                {
                
                    $product_total_price = $product->price * $request->qty;
                    if($customer == null)
                    {
                       $createcustomer=Customer::create(['name'=>$request->name,
                                                    'phone'=>$request->phone,
                                                    'address'=>$request->address
                                                ]);
                                //add to checkout        
                                $addToChart = ['product_id'=>$request->product,
                                                'user_id'=>$user->id,
                                                'invoice_no'=>$random,
                                                'quantity'=>$request->qty,
                                                'amount'=>$product_total_price,
                                                'customer_id'=>$createcustomer->id,
                                            ];
                                Checkout::create($addToChart);
                            }
                            else
                            {
                                    //add to checkout        
                                    $addToChart = ['product_id'=>$request->product,
                                                    'user_id'=>$user->id,
                                                    'invoice_no'=>$random,
                                                    'quantity'=>$request->qty,
                                                    'amount'=>$product_total_price,
                                                    'customer_id'=>$customer->id,
                                                    ];
                                    Checkout::create($addToChart);
                            }
             
                  // update product qty
                   Products::where('id',$request->product)->update(['qty'=>$availbleStock,
                                                              'total_value'=>$remaining_val,
                                                            ]);

                  return back()->with('success', 'Added To Chart Waiting for Checkout');

            
             }

              else
                {
                  $discount_price = $request->product_discount_price;
                  $qty_discount = $request->product_qty_price;
                  if($request->qty < $discount->product_qty && $discount->discount_per_product !== null || $discount->product_qty == null)
                  {

                    if($customer == null)
                    {
                         //save customers details
                       $createcustomer=Customer::create(['name'=>$request->name,
                                                        'phone'=>$request->phone,
                                                        'address'=>$request->address
                                                       ]);
                           //add to checkout        
                        $addToChart = ['product_id'=>$request->product,
                                        'user_id'=>$user->id,
                                        'discount_id'=>$discount->id,
                                        'invoice_no'=>$random,
                                        'quantity'=>$request->qty,
                                        'amount'=> $discount_price * $request->qty,
                                        'customer_id'=>$createcustomer->id,
                                    ];
                       Checkout::create($addToChart);
                     }

                     else
                     {
                        $addToChart = ['product_id'=>$request->product,
                                        'user_id'=>$user->id,
                                        'discount_id'=>$discount->id,
                                        'invoice_no'=>$random,
                                        'quantity'=>$request->qty,
                                        'amount'=> $discount_price * $request->qty,
                                        'customer_id'=>$customer->id,
                                    ];
                       Checkout::create($addToChart);
                     }
                   

                    
                    // update product qty
                     Products::where('id',$request->product)->update(['qty'=>$availbleStock,
                                                                       'total_value'=>$remaining_val,
                                                                    ]);

                      return back()->with('success', 'Added To Chart Waiting for Checkout');


                  }
                  
                    elseif($discount->qty_price !== null && $request->qty >= $discount->product_qty)
                    {
                    
                        if($customer == null)
                          {
                            //save customers details
                           $createcustomer = $Customer::create(['name'=>$request->name,
                                                                'phone'=>$request->phone,
                                                                'address'=>$request->address
                                                            ]);

                                    $addToChart = ['product_id'=>$request->product,
                                                    'user_id'=>$user->id,
                                                    'discount_id'=>$discount->id,
                                                    'invoice_no'=>$random,
                                                    'quantity'=>$request->qty,
                                                    'amount'=> $qty_discount * $request->qty,
                                                    'customer_id'=>$createcustomer->id,
                                                    ];
                               Checkout::create($addToChart);
                          }
                          else
                          {
                            $addToCart = ['product_id'=>$request->product,
                                            'user_id'=>$user->id,
                                            'discount_id'=>$discount->id,
                                            'invoice_no'=>$random,
                                            'quantity'=>$request->qty,
                                            'amount'=> $qty_discount * $request->qty,
                                            'customer_id'=>$customer->id,
                                            ];
                               Checkout::create($addToCart);
                          }
                         

                    
                   
                    // update product qty
                    Products::where('id',$request->product)->update(['qty'=>$availbleStock,
                                                                     'total_value'=>$remaining_val,
                                                                   ]);
                    return back()->with('success', 'Added To Chart Waiting for Checkout');

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
    public function show($checkout)
    {
       
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

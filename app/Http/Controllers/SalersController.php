<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Sales_invocie;
use App\Models\Users;
use App\Models\Discounts;
 


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

         return view('sellers.sales.craete_sale', compact('sales','count', 'cat', 'product', 'discount'));
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
          $discount = Discounts::find("$id");
          
        return view('sellers.sales.load-discount', compact('discount'))->render();

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

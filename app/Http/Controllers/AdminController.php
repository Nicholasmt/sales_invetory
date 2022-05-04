<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Sales_invocie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $daily_sales = Sales_invocie::whereDate('created_at', date("Y:m:d"))->get();
        $monthly_sales = Sales_invocie::whereMonth('created_at', date('m'))->get();
        $yearly_sales = Sales_invocie::whereYear('created_at', Carbon::now()->year)->get();
  
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

    public function add_new()
    {
        $privilege = Users::all();

       return view('admin.add-sellers.add', compact('privilege'));
    }

    public function view_all_sales()
    {
        $count = 1;
        $sales = Sales_invocie::all();

       return view('admin.sales-overview.view', compact('sales','count'));
    }

    public function view()
    {
        $count = 1;
        $sellers = Users::where('role_id', 2)->get();
       return view('admin.add-sellers.view',compact('sellers', 'count'));
    }

    public function product()
    {
        $cat = Categories::all();  
       return view('admin.products.add', compact('cat'));
    }

    public function view_product()
    {
        $count = 1;
        $products = Products::all();  
       return view('admin.products.view', compact('products', 'count'));
    }

    public function category()
    {
        $count = 1;
        $cats = Categories::all();  
       return view('admin.category.add', compact('cats', 'count'));
    }

    public function profile()
    {
        $id = session()->get("id");
        $user = Users::find("$id");

        return view('admin.profile.profile', compact('user'));
    }

    public function updateProfile()
    {
       $id = session()->get("id");
       $user = Users::find("$id");
    
       return view('admin.profile.profile-update', compact('user'));
    }

    public function saveUpdate(Request $request, Users $user, $id)
    {

        $user = Users::find("$id");

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->update();
 
        return back()->with('success', 'Updated Successfully!');
    }

    public function savePassword(Request $request, Users $user, $id)
    {
        $rules=['old_password'=>'required',
                 'new_password'=>'required|min:8|same:confirm_password',
                   'confirm_password'=>'required|min:8'];
        $messages=[];

        $validate = Validator::make($request->all(), $rules, $messages);

        if($validate->fails()){

            return back()->withErrors($validate->errors());
        }

        else
        {
 
             if(Hash::check($request->old_password, $user->password))
            {

                $user = Users::find("$id");

                $user->passowrd = $request->confirm_password;
                $user->update();
                
                return back()->with('success', 'updated successfully!');
            }

            else
            {
                return back()->with('error', 'fialed!, old password mismatch try again...');
            }
            

       }
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
        //
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

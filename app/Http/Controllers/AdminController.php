<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Sales_invoice;
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
        $daily_sales = Sales_invoice::whereDate('created_at', date("Y:m:d"))->get();
        $monthly_sales = Sales_invoice::whereMonth('created_at', date('m'))->get();
        $yearly_sales = Sales_invoice::whereYear('created_at', Carbon::now()->year)->get();
         $totalDaily = $daily_sales->sum('amount');
        $totalMonthly = $monthly_sales->sum('amount');
        $totalYearly = $yearly_sales->sum('amount');
         $daily_qty = $daily_sales->sum('qty');
        $monthly_qty =  $monthly_sales->sum('qty');
        $yearly_qty = $yearly_sales->sum('qty');
        $product = Products::all();
       return view('admin.dashboard',compact('totalDaily','totalMonthly', 'totalYearly', 
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
        $css=[
            'css/datatables.min.css'
            ];
        $js=[
            'dataTables/datatables.min.js','js/dataTables/dataTables.bootstrap4.min.js' 
            ];
        $count = 1;
        $sales = Sales_invoice::all();
       return view('admin.sales-overview.view', compact('sales','js','css','count'));
    }

    public function view()
    {
        $count = 1;
        $sellers = Users::where('role_id', 2)->get();
       return view('admin.add-sellers.view',compact('sellers', 'count'));
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
    public function show($profile)
    {
        $id = session()->get("id");
        $user = Users::find("$id");
       return view('admin.profile.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($profile)
    {
        $id = session()->get("id");
        $user = Users::find("$id");
       return view('admin.profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $profile)
    {
      $user = Users::find("$profile");
       if($request->has('updateProfile'))
       {
         if(Hash::check($request->password, $user->password))
          {
           $user = Users::where('id',$profile)->update(['first_name'=>$request->first_name,
                                                        'last_name'=>$request->last_name,
                                                        'address'=> $request->address,
                                                        'phone'=>$request->phone
                                                       ]);
             return back()->with('success', 'Updated Successfully!');
          }
          else
            {
                return back()->with('error','Password mismatch try again...');
            }
       }
        elseif($request->has('updatePassword'))
        {
            $rules=['old_password'=>'required',
                     'new_password'=>'required|min:8|same:confirm_password',
                       'confirm_password'=>'required|min:8'
                   ];
             $validate = Validator::make($request->all(), $rules);
           if($validate->fails())
            {
             return back()->withErrors($validate->errors());
            }
          else
            { 
               if(Hash::check($request->old_password, $user->password))
                {
                    $user = Users::where('id',$profile)->update(['password'=>$request->confirm_password]);
                    return back()->with('success', 'updated successfully!');
                }
              else
                {
                    return back()->with('error', 'fialed!, old password mismatch try again...');
                }
            }
        }
        else
        {
           return back();
        }
      
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

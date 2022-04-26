<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       return view('admin.dashboard');
    }

    public function add_new()
    {
        $privilege = Users::all();

       return view('admin.add-sellers.add', compact('privilege'));
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

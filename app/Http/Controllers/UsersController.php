<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Roles;
use App\Mail\User_mails;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class UsersController extends Controller
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
        $id = session()->get('id');
        $count = 1;
        $users = Users::where('role_id',2)->get();
        $roles = Roles::all();
        return view('admin.employees.index',compact('users','roles','count','js','css'));
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
        $rules =['first_name'=>'required',
                 'last_name'=>'required',
                 'email'=>'required',
                 'phone'=>'required',
                 'address'=>'required',
                 'role'=>'required',
                ];
       $validator = Validator::make($request->all(),$rules);
       if($validator->fails())
       {
        return back()->withErrors($validator->errors());
       }
       else
       {
          $randomPass = Str::random(8);
           $user=['first_name'=>$request->first_name,
                    'last_name'=>$request->last_name,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'address'=>$request->address,
                    'role_id'=>$request->role,
                    'password'=>Hash::make($randomPass)
                   ];
           $employee = Users::create($user);
           Mail::to($employee->email)->send( new User_mails($employee,$randomPass));
           return back()->with('success','Employee Created');
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
      public function delete(Users $user)
      {
        return view('admin.employees.delete',compact('user'))->render();
      }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$user_id)
    {
        $id = session()->get('id');
        $user = Users::find("$id");
        if(Hash::check($request->password,$user->password))
        {
           Users::where('id',$user_id)->delete();
           return back('success','User Deleted Successfully');
        }
        else
        {
          return back()->with('error','Password Mismatch');
        }
    }
}

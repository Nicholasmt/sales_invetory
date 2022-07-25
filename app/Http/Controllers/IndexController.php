<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use App\Models\Logs;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Logs $log)
    {
       if(session()->get('user_auth') == true && session()->get('privilege') == 1)
       {

            return redirect('admin/dashboard');

           } 

           else

           {

             $id = session()->get('id');
             
              $log->user_id = $id;
              $log->login_time = date("Y:m:d:H:i:s");;
              $log->save();


              return redirect('saler/dashboard');

             
           }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Auth(Request $request, Users $user)
    {
        $rules = ['email' => 'required|',
                 'password' => 'required'
                ];

        $validuate = Validator::make($request->all(), $rules);

        if($validuate->fails())
        {
          return back()->withErrors($validuate->errors());
        }

        else
        {  
            $email = $request->email;
            $password = $request->password;
            $user = Users::where('email',$email)->with('role')->first();

          if($user)
          {
              if(Hash::check($password, $user->password))
              {
                  $request->session()->put('id', $user->id);
                  $request->session()->put('first_name', $user->first_name);
                  $request->session()->put('email', $user->email);
                  $request->session()->put('last_name', $user->last_name);
                  $request->session()->put('privilege', $user->role_id);
                  $request->session()->put('user_auth', true);

                  return redirect('redirect');
              }
               else
              {
                  return redirect('sign-in')->with('error', 'Incorrect Email and Password');
              }

          }
           else
          {
             return redirect('sign-in')->with('error', 'User Does Not Exist!');
          }

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request, Logs $log)
    {
         if(session()->get('privilege') == 1)
         {
            $request->session()->invalidate();

            return redirect('sign-in');
         }

         else
         {
              $id = session()->get('id');
              $log = Logs::where('user_id', $id)->where('logout_time', null)->first();
              $log->logout_time = date("Y:m:d:H:i:s");
              $log->update();

            $request->session()->invalidate();

            return redirect('sign-in');
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

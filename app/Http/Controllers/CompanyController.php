<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company_setup;
use App\Models\Users;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count =1;
        $companys = Company_setup::all();
        return view('admin.company.index', compact('companys','count'));

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
    public function store(Request $request, Company_setup $company)
    {
        $rules=['name'=>'required',
               'location'=>'required',
                'contact'=>'required',
                 'registration_number'=>'required'];

                $messages=[];

                $validate = Validator::make($request->all(), $rules, $messages);

                if($validate->fails()){

                return back()->withErrors($validate->errors());
                
                }
                else
                {
                   $company->name = $request->name;
                   $company->location = $request->location;
                   $company->contact = $request->contact;
                   $company->registration_number = $request->registration_number;
                   $company->save();

                   return back()->with('success', 'created Successfully');

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
    public function edit(Company_setup $company)
    {
        return view('admin.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $company)
    {
        Company_setup::where('id',$company)->update(['name'=>$request->name,
                                                      'location'=>$request->location,
                                                      'contact'=>$request->contact,
                                                      'registration_number'=>$request->registration_number
                                                    ]);

        return back()->with('success','Updated successfuly');
    }

    public function delete(Company_setup $company)
    {
      return view('admin.company.delete',compact('company'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$company)
    {
        $id=session()->get('id');
        $user=Users::find("$id");
        if(\Hash::check($request->password,$user->password))
        {
            Company_setup::where('id',$company)->delete();

            return back()->with('success','Deleted successfuly');
        }
        else
        {
            return back()->with('error','Incorrect Password');
        }
    }
}

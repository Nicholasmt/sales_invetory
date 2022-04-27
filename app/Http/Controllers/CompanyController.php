<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company_setup;
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
        $company = Company_setup::all();
         return view('admin.company-Setup.add', compact('company','count'));

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

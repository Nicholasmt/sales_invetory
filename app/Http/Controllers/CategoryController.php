<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Users;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = 1;
        $categories = Categories::all();  
       return view('admin.categories.index', compact('categories','count'));
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
    public function store(Request $request ,Categories $cat)
    {
        $rules =['title' => 'required',
                  'description' => 'required'];
        $messages=[];

        $validation = Validator::make($request->all(), $rules, $messages);

        if($validation->fails())
        {
            return back()->withErrors($validation->errors());
        }
        else
        {
           $cat->title = $request->title;
           $cat->description = $request->description;
           $cat->save();

           return back()->with('success', 'Category Added!');
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
    public function edit( Categories $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
           Categories::where('id',$category)->update(['title'=>$request->title,
                                                      'description'=>$request->description
                                                     ]);
           return back()->with('success','Updated successfully');
    }
    public function delete(Categories $category)
    {
        return view('admin.categories.delete',compact('category'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $request,$category)
    {
        $id =session()->get('id');
        $user = Users::find("$user");
       if(\Hash::check($request->password,$user->passsword))
       {
          Categories::where('id',$category)->delete();
          return back('success','Deleted Successfully');
       }
       else
       {
        return back('error','Incorrect Password');
       }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Users;

;

class NoticationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $id = session()->get('id');
        if (session()->get('user_auth') == true && session()->get('privilege') == 2)
        {
            $inboxes = Notification::where(['incoming'=>1])->get();
            $sents = Notification::where('user_id',$id)->get();
            return view('sellers.notification.index', compact('inboxes','sents'));
        }
        elseif (session()->get('user_auth') == true && session()->get('privilege') == 1)
        {
            $inboxes = Notification::where(['incoming'=>2])->get();
            $sents = Notification::where('user_id',$id)->get();
            return view('sellers.notification.index', compact('inboxes','sents'));
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
        $rules =['subject'=>'required',
                 'description'=>'required',
                 'message'=>'required'
                 ];
       $validator = \Validator::make($request->all(),$rules);
       if($validator->fails())
       {
        return back()->withErrors($validator->errors());
       }
       else
       {
           $id = session()->get('id');
           $user = Users::find("$id");
           Notification::create(['subject'=>$request->subject,
                                 'description'=>$request->description,
                                 'message'=>$request->message,
                                 'incoming'=>$user->role->privilege,
                                  'user_id'=>$id
                                  ]);

            return back()->with('success','Message Sent');

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

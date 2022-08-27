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
       $css=[
            'css/datatables.min.css'
            ];
        $js=[
            'dataTables/datatables.min.js','js/dataTables/dataTables.bootstrap4.min.js' 
            ];
         $id = session()->get('id');
        if (session()->get('user_auth') == true && session()->get('privilege') == 2)
        {
            $inboxes = Notification::where(['incoming'=>1])->get();
            $sents = Notification::where('user_id',$id)->get();
            $unread = Notification::where(['incoming'=>1,'status'=>0])->get();
            return view('sellers.notification.index', compact('inboxes','sents','unread','css','js'));
        }
        elseif (session()->get('user_auth') == true && session()->get('privilege') == 1)
        {
            $inboxes = Notification::where(['incoming'=>2])->get();
            $sents = Notification::where('user_id',$id)->get();
            $unread = Notification::where(['incoming'=>2,'status'=>0])->get();
            return view('sellers.notification.index', compact('inboxes','sents','unread','js','css'));
        }
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
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
        $notification = Notification::find("$id");
        if($notification->status == 1)
        {
          return view('sellers.notification.show',compact('notification'));
        }
        else
        {
          Notification::where('id',$id)->update(['status'=>1]);
          return view('sellers.notification.show',compact('notification'));
        }

       
        
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

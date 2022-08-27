@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')
 <div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="page-header-title">
                <h5 class="m-b-10">READ MESSAGE</h5>
            </div>
            <ul class="breadcrumb">
            @if (Session::get('user_auth') == true && Session::get('privilege') == 1)
                   <li class="breadcrumb-item"><a href="{{ route('admin-dashbaord')}}"><i class="feather icon-home"></i></a></li>
                   <li class="breadcrumb-item"><a href="{{ route('adminnotifications.index')}}">Notification</a></li>/
				@elseif (Session::get('user_auth') == true && Session::get('privilege') == 2)
				    <li class="breadcrumb-item"><a href="{{ route('saler-dashbaord')}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('salernotifications.index')}}">Notification</a></li>/
				@endif
               
                <li class="breadcrumb-item"><a href="javascript:">Read</a></li>
            </ul>
        </div>
    </div>
   </div>
</div>
<div class="col-sm-12">
<div class="card">
    <div class="card-header">
        <h5>Message</h5>
    </div>
    <div class="card-block">
        <div class="text-left">
             <h4 class="text-info">SUBJECT:</h4>  
             <p> {{$notification->subject}}</p>
        </div>
        <div class="text-right top">
             <h4 class="text-info">SENDER</h4> 
             <p>  {{$notification->user->first_name}} </p>   
        </div>
          <h4 class="text-center text-info">Message</h4> 
           <p> 
           {{$notification->message}}
           Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
             ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
              aliquip ex ea commodo consequat. Duis aute irure dolor in 
              reprehenderit in voluptate velit esse cillum dolore eu fugiat 
              nulla pariatur. Excepteur sint occaecat cupidatat non proident,
            sunt in culpa qui officia deserunt mollit anim id est laborum."
          </p>
      </div>
</div>
</div>
<style>
    .top
    {
      margin-top:-6%;
    }
</style>
@endsection
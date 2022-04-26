@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')


<div class="col-sm-12">
        <h5 class="mb-3"> Your Profile</h5>
        <hr>
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0"><a href="#!" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Personal Detials</a></h5>
                </div>
                <div id="collapseOne" class=" card-body collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                   <div class="col-md-6 form-group">
                       <label for=""> First Name</label>
                   </div> 

                   <div class="col-md-6 form-group">
                       
                       <label class="btn btn-info move">{{$user->first_name}}</label>
                   </div> 

                   <div class="col-md-6 form-group">
                       <label for=""> Last Name</label>
                   </div> 

                   <div class="col-md-6 form-group">
                       
                       <label class="btn btn-info move">{{$user->last_name}}</label>

                   </div> 


                   <div class="col-md-6 form-group">
                       <label for=""> Email Address</label>
                   </div> 

                   <div class="col-md-6 form-group">
                       
                       <label class="btn btn-info move">{{$user->email}}</label>

                   </div> 


                   <div class="col-md-6 form-group">
                       <label for=""> Address</label>
                   </div> 

                   <div class="col-md-6 form-group">
                       
                       <label class="btn btn-info move">{{$user->address}}</label>

                   </div> 

                </div>

                <style>
                       .move{
                           margin-top:-10%;
                           margin-left: 30%
                       }
                </style>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">{{$user->first_name }} Level</a></h5>
                </div>
                <div id="collapseTwo" class="collapse card-body" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    
                <div class="col-md-6 form-group">
                       <label for=""> Your Privilege</label>
                   </div> 

                   <div class="col-md-6 form-group">
                       
                       <label class="btn btn-info move">{{$user->role->title}}</label>

                   </div> 

                </div>
            </div>
            
        </div>
    </div>

@endsection
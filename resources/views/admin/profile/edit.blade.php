@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')


  <div class="col-sm-12">
    <div class="card">
        <div class="card-header">
                <h5>Add New Salers</h5>
            </div>
            <div class="card-body">
                <h5>Personal Information</h5>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin-save-update',$user->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->first_name}}" name="first_name">
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Last Name</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$user->last_name}}" name="last_name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="email" class="form-control" id="exampleInputPassword1" value="{{$user->email}}" name="email" readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Address</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$user->address}}" name="address">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$user->phone}}" name="phone">
                            </div>
                            
                            
                            <input type="submit" class="btn btn-primary" value="Save Change" >


                        </form>
                    </div>

                    <div class="col-md-6">

                    <h5>Security</h5>

                       <form action="{{ route('admin-save-pass',$user->id)}}" method="POST">
                           @csrf
                            <div class="form-group">
                                <label>Old Password</label>
                                <input type="text" class="form-control" placeholder="Enter Old Pasword" name="old_password">
                            </div>

                              <div class="form-group">
                                <label for="exampleInputPassword1">New Password</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter New Password" name="new_password">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Confrim Password" name="confirm_password">
                            </div>

                            <div class="col-md-12">

                            <input type="submit" class="btn btn-primary" value="Save Change">

                            </div>

                            </form>
                           
                    </div>

                    

                    </div>
                </div>
                </div>
            </div>


   @endsection
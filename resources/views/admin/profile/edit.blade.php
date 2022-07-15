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
                        <form action="{{ route('adminprofile.update',['profile'=>$user->id])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" class="form-control"   aria-describedby="emailHelp" value="{{$user->first_name}}" name="first_name">
                             </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Last Name</label>
                                <input type="text" class="form-control"   value="{{$user->last_name}}" name="last_name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="email" class="form-control"   value="{{$user->email}}" name="email" readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Address</label>
                                <input type="text" class="form-control"   value="{{$user->address}}" name="address">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone</label>
                                <input type="text" class="form-control"   value="{{$user->phone}}" name="phone">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input type="password" class="form-control"  placeholder="Enter password to proceed" name="password">
                            </div>
                             <div class="form-group">
                              <input type="submit" class="btn btn-primary" name="updateProfile" value="Save Change" >
                            </div>
                    </form>
                </div>
                <div class="col-md-6">
                  <h5>Security</h5>
                       <form action="{{ route('adminprofile.update',['profile'=>$user->id])}}" method="POST">
                           @csrf
                           @method('PATCH')
                            <div class="form-group">
                                <label>Old Password</label>
                                <input type="text" class="form-control" placeholder="Enter Old Pasword" name="old_password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">New Password</label>
                                <input type="text" class="form-control"  placeholder="Enter New Password" name="new_password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input type="text" class="form-control"  placeholder="Enter Confrim Password" name="confirm_password">
                            </div>
                            <div class="col-md-12">
                               <input type="submit" class="btn btn-primary" name="updatePassword" value="Save Change">
                             </div>
                         </form>
                      </div>
                   </div>
                </div>
            </div>
        </div>
  @endsection
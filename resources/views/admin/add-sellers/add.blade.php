@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')


  <div class="col-sm-12">
    <div class="card">
        <div class="card-header">
                <h5>Add New Salers</h5>
            </div>
            <div class="card-body">
                <h5>Salers Form</h5>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter First Name" name="first_name">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Last Name</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder=" Enter Last Name" name="last_name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Address</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Address" name="last_name">
                            </div>
                            
                            
                            <!-- <input type="submit" class="btn btn-primary" value="Submit" > -->

                        </form>
                    </div>
                    <div class="col-md-6">
                       
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" placeholder="Enter Email" name="email">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Privilege</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    @foreach ($privilege as $p )
                                      <option value="{{$p->role_id}}">{{$p->role->title}}</option>
                                    @endforeach
                                  </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Phone" name="last_name">
                            </div>
                           
                    </div>

                    <div class="col-md-12">

                 <input type="submit" class="btn btn-primary" value="Create">

                    </div>

                    </div>
                </div>
                </div>
            </div>


   @endsection
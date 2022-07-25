@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')
 <div class="col-sm-12">
    <div class="card">
        <div class="card-header">
                <h5>Cpmpany Setup</h5>
            </div>
            <div class="card-body">
                <h5>Update</h5>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                      <form action="{{ route('admincompany.update',['company'=>$product])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Company Name</label>
                                <input type="text"  value="{{$company->name}}" class="form-control" placeholder="Enter Company Name" name="name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Location</label>
                                <input type="text" class="form-control" value="{{$company->location}}" placeholder="Enter Location" name="location">
                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Contact</label>
                                <input type="text"  value="{{$company->contact}}" class="form-control" placeholder="Enter Contact Address" name="contact">
                            </div>

                            <div class="form-group">
                               <label for="exampleFormControlSelect1">Company CAC</label>
                                 <input type="text" value="{{$company->registration_number}}" placeholder="Enter Company Registration Number" class="form-control" name="registration_number">
                            </div>
                             <input type="submit" class="btn btn-primary" value="Update" >
                      </form>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>


   @endsection
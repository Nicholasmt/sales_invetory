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
                        <form action="{{ route('admin-saveProducts')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Product Price</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Price" name="price">
                                <small id="emailHelp" class="form-text text-muted">Enter Numbers only.</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Quantity</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder=" Enter Quantity" name="qty">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Category</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="category">
                                    @foreach ($cat as $c)
                                      <option value="{{$c->id}}">{{$c->title}}</option>
                                    @endforeach
                                  </select>
                            </div>
                            
                            
                            <input type="submit" class="btn btn-primary" value="Create" >

                        </form>
                    </div>
                     
                    </div>

                    <div class="col-md-12">

                 <!-- <input type="submit" class="btn btn-primary" value="Create"> -->

                    </div>

                    </div>
                </div>
            </div>
        </div>


   @endsection
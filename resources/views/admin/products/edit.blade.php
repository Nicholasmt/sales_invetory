@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')
 <div class="col-sm-12">
    <div class="card">
        <div class="card-header">
                <h5>Product</h5>
            </div>
            <div class="card-body">
                <h5>Update</h5>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                      <form action="{{ route('adminproducts.update',['product'=>$product])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Product Name</label>
                                <input type="text" class="form-control" value="{{$product->product_name}}" aria-describedby="emailHelp" placeholder="Enter Product Name" name="product_name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Product Price</label>
                                <input type="text" class="form-control" value="{{$product->price}}" aria-describedby="emailHelp" placeholder="Enter Price" name="price">
                                <small id="emailHelp" class="form-text text-muted">Enter Numbers only.</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Quantity</label>
                                <input type="text" class="form-control" value="{{$product->qty}}" placeholder=" Enter Quantity" name="qty">
                            </div>

                            <div class="form-group">
                               <label for="exampleFormControlSelect1">Select Category</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="category">
                                   @foreach ($categories as $category)
                                    <option value="{{$category->id}}" @if(isset($product)) @if($product->cat_id==$category->id) selected @endif @endif>{{$category->title}}</option>
                                    @endforeach
                                </select>
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
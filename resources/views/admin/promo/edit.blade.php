@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')
 <div class="col-sm-12">
    <div class="card">
       <div class="card-header">
           <h5>Discount Promo</h5>
        </div>
         <div class="card-body">
           <h5>Update</h5>
              <hr>
                <div class="row">
                   @if ($discount->discount_per_product && $discount->produc_qty)
				     <div class="col-md-6">
                        <h5 class="mt-4">Quantity Discount Promo</h5>
					     <form action="{{ route('admindiscounts.update',['discount'=>$discount])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Product Quantity</label>
                                <input type="text" class="form-control" value="{{$discount->product_qty}}" name="product_qty">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Quantity Price</label>
                                <input type="text" class="form-control" value="{{$discount->qty_price}}" name="qty_price" readonly>
                                <small id="emailHelp" class="form-text text-muted">Enter Numbers only.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Quantity Rate</label>
                                <input type="text" class="form-control" value="{{$discount->qty_rate}}" name="qty_rate">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Select Product</label>
                                 <select class="form-control" id="exampleFormControlSelect1" name="category">
                                    @foreach ($products as $product)
                                    <option value="{{$product->id}}" @if(isset($discount)) @if($discount->product_id==$product->id) selected @endif @endif>{{$product->product_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                             <input type="submit" class="btn btn-primary" name="qantity_discount" value="Update" >
						</form>
                     </div>
					 <div class="col-md-6">
                        <h5 class="mt-4">Discount Per Product</h5>
						  <form action="{{ route('admindiscounts.update',['discount'=>$discount])}}" method="POST">
                               @csrf
                               @method('PATCH')
                               <div class="form-group">
                                  <label for="exampleFormControlSelect1">Select Product</label>
                                   <select class="form-control" name="product">
                                     <option disabled selected> Select Product</option>
                                     @foreach ($products as $product)
                                     <option value="{{$product->id}}" @if(isset($discount)) @if($discount->product_id==$product->id) selected @endif @endif>{{$product->product_name}}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1"> Discount Price</label>
                                  <input type="text" class="form-control" value="{{$discount->discount_per_product}}" name="discount_rate" readonly>
                                  <small id="emailHelp" class="form-text text-muted">Price per Product</small>
                              </div>
                              <div class="form-group">
                                 <label for="exampleInputEmail1"> Discount Rate Per Product</label>
                                   <input type="text" class="form-control" value="{{$discount->discount_rate}}" name="discount_rate">
                                   <small id="emailHelp" class="form-text text-muted">Enter Percentage Rate</small>
                              </div>
                               <input type="submit" class="btn btn-primary" name="single_discount" value="Update" >
					     </form>
                    </div>
			      @endif
				  @if($discount->product_qty)
					<div class="col-md-6">
                        <h5 class="mt-4">Quantity Discount Promo</h5>
					       <form action="{{ route('admindiscounts.update',['discount'=>$discount])}}" method="POST">
						      @csrf
						      @method('PATCH')
                              <div class="form-group">
                                <label for="exampleInputEmail1"> Product Quantity</label>
                                <input type="text" class="form-control" value="{{$discount->product_qty}}" name="product_qty">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1"> Quantity Price</label>
                                   <input type="text" class="form-control" value="{{$discount->qty_price}}" name="qty_price" readonly>
                                   <small id="emailHelp" class="form-text text-muted">Enter Numbers only.</small>
                              </div>
                              <div class="form-group">
                                 <label for="exampleInputPassword1">Quantity Rate</label>
                                   <input type="text" class="form-control" value="{{$discount->qty_rate}}" name="qty_rate">
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Product</label>
                                  <select class="form-control" id="exampleFormControlSelect1" name="category">
                                    @foreach ($products as $product)
                                    <option value="{{$product->id}}" @if(isset($discount)) @if($discount->product_id==$product->id) selected @endif @endif>{{$product->product_name}}</option>
                                    @endforeach
                                  </select>
                              </div>
                               <input type="submit" class="btn btn-primary" name="qantity_discount" value="Update" >
						   </form>
                        </div>
					  @else
                      <div class="col-md-6">
                         <h5 class="mt-4">Discount Per Product</h5>
						   <form action="{{ route('admindiscounts.update',['discount'=>$discount])}}" method="POST">
							   @csrf
							   @method('PATCH')
                               <div class="form-group">
                                   <label for="exampleFormControlSelect1">Select Product</label>
                                     <select class="form-control" name="product">
                                       <option disabled selected> Select Product</option>
                                        @foreach ($products as $product)
                                       <option value="{{$product->id}}" @if(isset($discount)) @if($discount->product_id==$product->id) selected @endif @endif>{{$product->product_name}}</option>
                                        @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1"> Discount Price</label>
                                  <input type="text" class="form-control" value="{{$discount->discount_per_product}}" name="discount_per_product" readonly>
                                  <small id="emailHelp" class="form-text text-muted">Price per Product</small>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1"> Discount Rate Per Product</label>
                                  <input type="text" class="form-control" value="{{$discount->discount_rate}}" name="discount_rate">
                                  <small id="emailHelp" class="form-text text-muted">Enter Percentage Rate</small>
                              </div>
                               <input type="submit" class="btn btn-primary" name="single_discount" value="Update" >
					        </form>
                        </div>
					  @endif
				 </div>
              </div>
           </div>
       </div>
@endsection
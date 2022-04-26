@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')


        <div class="col-sm-12">
           <h5>Product Discounts</h5>
              <hr>
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Create Discount</a>
                </li>


              <div class="col-sm-12">
                <h5 class="mt-4">Create Promo Discount for your Products</h5>
                <hr>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dsicounts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Create Discount</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                    </li> -->
                </ul>

                <div class="tab-content" id="pills-tabContent">
					
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						
                       <div class="card-block table-border-style">
                        <form action="" class="">
                          <div class="input-group">
                           <input type="text" class="form-control" placeholder="Search Salers" name="keyword">
                             <div class="input-group-append">
                            <input class="btn btn-primary" type="submit" value="Search">
                        </div>
                    </div>
                  </form>
               

                    </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Product Title</th>
                                        <th>Product Normal Price</th>
                                        <th>Rate (per product)</th>
                                        <th>Price (Per Product)</th>
                                        <th>Quantity of Products</th>
                                        <th>Quantity Rate</th>
                                        <th>Quantity Price</th>
                                        <th>Date/Time</th>
                                        <th>Actions</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                @if($discount->count() == 0 )

                                <td scope="row"><label class="btn btn-info"> No data Found</label></td>

                                @else
                                                                

                                @foreach ($discount as $d)
                                    <tr>
                                        
                                        <td scope="row">{!!$count++;!!}</td>
                                        <td class="table-row">{{$d->product->category->description}}</td>
                                        <td class="table-row">#{{$d->product->price}}</td>
                                        <td class="table-row">{{$d->discount_rate}}%</td>
                                        <td class="table-row">#{{$d->discount_per_product}}</td>
                                        <td class="table-row">{{$d->product_qty}} (qty)</td>
                                        <td class="table-row">{{$d->qty_rate}}%</td>
                                        <td>#{{$d->qty_price}}</td>
                                        <td>{{$d->created_at->diffForHumans()}}</td>
                                        <td><a href="" class="btn btn-danger"> Delete</a></td>
                                   
                                    </tr>
                                
                                    @endforeach 

                                    @endif

                                </tbody>
                            </table>
                        </div>
					</div>

                    
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row">
                      <div class="col-md-6">

                      <h5 class="mt-4">Discount Per Product</h5>

                        <form method="POST" action="{{ route('admin-save-discount')}}">
                            @csrf
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Product</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="product">
                                    @foreach ($product as $p)
                                      <option value="{{$p->id}}">{{$p->category->title}}</option>
                                    @endforeach
                                  </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Discount Rate Per Product</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Percentage Number" name="discount_rate">
                                <small id="emailHelp" class="form-text text-muted">Enter Percentage Rate</small>
                            </div>

                            

                           

                             <input type="submit" class="btn btn-primary" value="Create" >

                            </form>
                          </div>
						
						<div class="col-md-6">

                        <h5 class="mt-4">Quantity Discount Promo</h5>

					<form method="POST" action="{{ route('admin-save-discount')}}">
                        @csrf
							
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Product</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="product">
                                    @foreach ($product as $p)
                                      <option value="{{$p->id}}">{{$p->category->title}}</option>
                                    @endforeach
                                  </select>
                            </div>
								
								  <div class="form-group">
                                <label for="exampleInputPassword1">Product Quantity </label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder=" Enter Number of Product" name="product_qty">
                                <small id="emailHelp" class="form-text text-muted">Enter Number of Product Quantity for Promo </small>
                            </div>

								
								<div class="form-group">
                                <label for="exampleInputPassword1">  Quantity Rate</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder=" Enter Number of Percentage" name="qty_rate">
                                <small id="emailHelp" class="form-text text-muted">Enter Percentage Rate </small>
                            </div>

                             <input type="submit" class="btn btn-primary" value="Create" >
								
						   </form>
							
						</div>
						
                        </div>
                    </div>
 
                </div>
            </div>
        </div>
	</div>

 
     <<style>
     .table-row
     {
         text-align:center;
     }
     </style>     



@endsection
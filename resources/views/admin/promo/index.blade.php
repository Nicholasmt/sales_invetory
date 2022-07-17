@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')

@section('header')

<link href="{{ asset('assets/css/datatables.min.css')}}" rel="stylesheet">

@endsection

        <div class="col-sm-12">
           <h5>Product Discounts</h5>
              <hr>
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="{{ route('admin-dashboard')}}" role="tab" aria-controls="home" aria-selected="true">Dashboard</a>
                </li>
			</ul>

              <div class="col-sm-12">
                <h5 class="mt-4">Create Promo Discount for your Products</h5>
                <hr>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"> <i class="fa fa-calendar"></i> PROMO DISCOUNT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"> <i class="fa fa-plus"></i>  ADD</a>
                    </li>
                    
                </ul>

                <div class="tab-content" id="pills-tabContent">
					
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						
                     <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Product Name</th>
                                        <th>Product Normal Price</th>
                                        <th>Rate (per product)</th>
                                        <th>Discount Price</th>
                                        <th>Quantity of Products</th>
                                        <th>Quantity Rate</th>
                                        <th>Quantity Discount Price</th>
                                        <th>Date/Time</th>
                                        <th>Actions</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                @if($discounts->count() == 0 )

                                <td scope="row"><label class="btn btn-info"> No data Found</label></td>

                                @else
                                                                

                                @foreach ($discounts as $discount)
                                    <tr>
                                        
                                        <td scope="row">{!!$count++;!!}</td>
                                        <td class="table-row">{{$discount->product->product_name}}</td>
                                        <td class="table-row">#{{$discount->product->price}}</td>
                                        <td class="table-row">{{$discount->discount_rate}}%</td>
                                        <td class="table-row">#{{$discount->discount_per_product}}</td>
                                        <td class="table-row">{{$discount->product_qty}} (qty)</td>
                                        <td class="table-row">{{$discount->qty_rate}}%</td>
                                        <td>#{{$discount->qty_price}}</td>
                                        <td>{{$discount->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{ route('admindiscounts.edit',['discount'=>$discount])}}" class="btn btn-primary"> <i class="fa fa-edit"></i></a>
                                            <span>
                                            <a href="" class="btn btn-danger"> <i class="fa fa-trash"></i></a>  
                                            </span>
                                        </td>
                                   
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

                        <form method="POST" action="{{ route('admindiscounts.store')}}">
                            @csrf
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Product</label>
                                <select class="form-control"   name="product">
                                <option disabled selected> Select Product</option>
                                    @foreach ($products as $product)
                                      <option value="{{$product->id}}">{{$product->product_name}}</option>
                                    @endforeach
                                  </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Discount Rate Per Product</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Percentage Number" name="discount_rate">
                                <small id="emailHelp" class="form-text text-muted">Enter Percentage Rate</small>
                            </div>

                            

                           

                             <input type="submit" class="btn btn-primary" value="Create" >

                            </form>
                          </div>
						
						<div class="col-md-6">

                        <h5 class="mt-4">Quantity Discount Promo</h5>

					<form method="POST" action="{{ route('admindiscounts.store')}}">
                        @csrf
							
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Product</label>
                                <select class="form-control"   name="product">
                                <option disabled selected> Select Product</option>
                                    @foreach ($products as $product)
                                      <option value="{{$product->id}}">{{$product->product_name}}</option>
                                    @endforeach
                                  </select>
                            </div>
								
								  <div class="form-group">
                                <label for="exampleInputPassword1">Product Quantity </label>
                                <input type="text" class="form-control"   placeholder=" Enter Number of Product" name="product_qty">
                                <small id="emailHelp" class="form-text text-muted">Enter Number of Product Quantity for Promo </small>
                            </div>

								
								<div class="form-group">
                                <label for="exampleInputPassword1">  Quantity Rate</label>
                                <input type="text" class="form-control"   placeholder=" Enter Number of Percentage" name="qty_rate">
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
 
 

 
     <style>
    
    select.form-control.form-control-sm
    {
        padding:10px 10px;
    }

     </style>  


 
@endsection

@section('script')

      <script src="{{ asset('js/dataTables/datatables.min.js')}}"></script>
      <script src="{{ asset('js/dataTables/dataTables.bootstrap4.min.js')}}"></script>  
     
     <script>
       $(document).ready(function(){
                $('.table').DataTable({
                    pageLength: 10,
                    responsive: true,
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                         {extend: 'print',
                        customize: function (win){
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');

                                $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                        }
                        }
                    ]

                });

            });

        </script>

        @endsection


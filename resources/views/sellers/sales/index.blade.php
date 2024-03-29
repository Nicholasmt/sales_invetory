@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')
@section('header')
 <link href="{{ asset('assets/css/datatables.min.css')}}" rel="stylesheet">
@endsection
    <div class="col-sm-12">
      <h5>Product Sales</h5>
         <hr>
           <ul class="nav nav-tabs" id="myTab" role="tablist">
             <li class="nav-item">
               <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sales</a>
             </li>
             <li class="" style="margin-left:60%">
               <a class=" btn btn-primary" href="{{ route('salercheckouts.index')}}" style="padding-top:18px;"><i class="fa fa-shopping-cart"></i>
                  <p class="text-warning" style="margin-top:-120%; margin-left:60%;">{{$checkouts->count()}}</p>
               </a>
             </li>
             <div class="col-sm-12">
             <h5 class="mt-4">View / Create Sale</h5>
             <hr>
               <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                 <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Sales</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Create Sale</a>
                 </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                </li> -->
                </ul>
                <div class="tab-content" id="pills-tabContent">
			      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					<div class="card-block table-border-style">
                       <h5 class="mt-4">Today's Sales</h5><br>
                        <!-- <form action="" class="">
                          <div class="input-group">
                           <input type="text" class="form-control" placeholder="Search Salers" name="keyword">
                             <div class="input-group-append">
                            <input class="btn btn-primary" type="submit" value="Search">
                        </div>
                    </div>
                  </form> -->
                     </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                         <th>S/N</th>
                                         <th>Product Name</th>
                                         <th>Product Category</th>
                                         <th>Quantity</th>
                                         <th>Amount</th>
                                         <th>Customer Name</th>
                                         <th>Customer Phone</th>
                                         <th>Customer Address</th>
                                         <th>Date/Time</th>
                                         <th>Action</th>
                                     </tr>
                                </thead>
                                <tbody>
                                    
                                @if($sales->count() == 0 )
                                <td scope="row"><label class="btn btn-info"> No data Found</label></td>
                                @else
                                @foreach ($sales as $sales)
                                    <tr>
                                         <td scope="row">{!!$count++;!!}</td>
                                        <td>{{$sales->product->product_name}}</td>
                                        <td>{{$sales->product->category->title}}</td>
                                        <td>{{$sales->quantity}}</td>
                                        <td>{{$sales->amount}}</td>
                                        <td>{{$sales->customer->name}}</td>
                                        <td>{{$sales->customer->phone}}</td>
                                        <td>{{$sales->customer->address}}</td>
                                        <td>{{$sales->created_at->diffForHumans()}}</td>
                                        <td><a href="{{ route('saler-view-receipt',$sales->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                                     </tr>
                                      @endforeach 
                                     @endif
                                </tbody>
                          </table>
                     </div>
				  </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row">
                      <div class="col-md-12">
                         <form method="POST" action="{{ route('salercheckouts.store')}}">
                            @csrf
                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Category</label>
                                 <select class="form-control" name="category" id="select-category">
                                  <option disabled selected>Select Category</option>
                                    @foreach ($cat as $c)
                                  <option value="{{$c->id}}" id="{{$c->id}}">{{$c->title}}</option>
                                    @endforeach
                                 </select>
                               </div>
                               <div id="product"></div>
                               <div id="discount"></div>
                               <div class="form-group">
                                    <label for="exampleInputEmail1"> Quantity of product</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title" name="qty">
                                
                                </div>
                                <label for="exampleInputPassword1">Customer's Phone Number</label>
                                <div class="input-group">
                                   <input type="text" class="form-control" placeholder="Enter Phone Number" id="phone" name="phone">
                                      <div class="input-group-append">
                                        <a class="btn btn-primary text-white" id="customer">Search</a>
                                      </div>
                                    </div>

                                   <div id="load-customer"></div>

                                   <div class="form-group" style="padding:20px;">
                                     <input type="submit" class="btn btn-info" value="Add To Cart" >
                                   </div>
                              </form>
                           </div>
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
    <script src="{{ asset('js/loader.js')}}"></script>
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
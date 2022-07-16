@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')
@section('header')
 <link href="{{ asset('assets/css/datatables.min.css')}}" rel="stylesheet">
@endsection
<div class="col-sm-12">
    <h5>Products</h5>
     <hr>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="{{ route('admin-dashboard')}}" role="tab" aria-controls="home" aria-selected="true">Dashboard</a>
        </li>
        <div class="col-sm-12">
           <h5 class="mt-4">Products</h5>
             <hr>
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                 <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fa fa-book"></i> PRODUCTS</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"> <i class="fa fa-plus"></i> ADD NEW</a>
                 </li>
               </ul>
               <div class="tab-content" id="pills-tabContent">
				 <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				    <div class="card-block table-border-style">
				 </div>
                 <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Action</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($products->count() == 0 )
                    <td><p class="btn btn-info"> No data Found</p></td>
                     @else
                     @foreach ($products as $product)
                        <tr>
                            <td scope="row">{{$count ++;}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->qty}}</td>
                            <td>{{$product->total_value}}</td>
                            <td>{{$product->category->title}}</td>
                            <td>{{$product->created_at->diffForHumans()}}</td>
                            <td><a href="{{ route('adminproducts.edit',['product'=>$product])}}" class="btn btn-primary"> <i class="fa fa-edit"></i> </a></td>
                            <td><a href="" class="btn btn-danger"> <i class="fa fa-trash"></i></a></td>
                         </tr>
                         @endforeach 
                      @endif
                  </tbody>
                    <tfoot>
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Action</th>
                            <th>Action</th>
                        </tr>
                    </thead>  
                </tfoot>
            </table>
        </div>
	</div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
       <div class="row">
          <div class="col-md-6">
              <form action="{{ route('adminproducts.store')}}" method="POST">
                 @csrf
                   <div class="form-group">
                      <label for="exampleInputEmail1"> Product Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Name" name="product_name">
                  </div>

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
                        <option  disabled selected> Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                     </select>
                 </div>
                   <input type="submit" class="btn btn-primary" value="Create" >
              </form>
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
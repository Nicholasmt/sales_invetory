@extends('layouts.body')

@section('title', 'Sales | Inventory')
  
@section('content')


@section('header')

<link href="{{ asset('assets/css/datatables.min.css')}}" rel="stylesheet">

@endsection

<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5>Products</h5>
            <span class="d-block m-t-5">All <code> Avaiable</code> Products</span>
        </div>
       
        <!-- <div class="card-block table-border-style">
            <form action="" class="">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Salers" name="keyword">
            <div class="input-group-append">
                <input class="btn btn-primary" type="submit" value="Search">
            </div>
		</div>
			</form>
	   </div> -->

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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    @if($products->count() == 0 )

                    <td><p class="btn btn-info"> No data Found</p></td>

                            @else

                            
                     @foreach ($products as $p)
                        <tr>
                           
                            <td scope="row">{{$count ++;}}</td>
                            <td>{{$p->product_name}}</td>
                            <td>{{$p->price}}</td>
                            <td>{{$p->qty}}</td>
                            <td>{{$p->total_value}}</td>
                            <td>{{$p->category->title}}</td>
                            <td>{{$p->created_at->diffForHumans()}}</td>
                            <td><a href="" class="btn btn-primary">Edit</a></td>
                            <td><a href="" class="btn btn-danger">Delete</a></td>

                          

                        </tr>
                       
                        @endforeach 

                        @endif

                    </tbody>
                </table>
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

    <!-- <script src="{{ asset('js/loader.js')}}"></script> -->

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
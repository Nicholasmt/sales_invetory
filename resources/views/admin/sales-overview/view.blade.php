@extends('layouts.body')
@section('content')

@section('title', 'Sales | Inventory')

@section('header')

<link href="{{ asset('assets/css/datatables.min.css')}}" rel="stylesheet">

@endsection
<div class="col-md-12">
<div class="card-header">
            <h5>Sales</h5>
            <span class="d-block m-t-5">All <code> Sales</code> Record</span>
        </div>
        </div>

<div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Product Price</th>
                             <th>Quantity</th>
                            <th>Amount</th>
                            <th>Sellers Name</th>
                            <th>Date</th>
                             
                        </tr>
                    </thead>
                    <tbody>
                        
                    @if($sales->count() == 0 )

                    <td><p class="btn btn-info"> No data Found</p></td>

                            @else

                            
                     @foreach ($sales as $s)
                        <tr>
                           
                            <td scope="row">{{$count ++;}}</td>
                            <td>{{$s->product->product_name}}</td>
                            <td>{{$s->category->title}}</td>
                            <td>{{$s->product->price}}</td>
                            <td>{{$s->qty}} (qty)</td>
                            <td>{{$s->amount}}</td>
                            <td>{{$s->user->first_name}}</td> 
                            <td>{{$s->created_at->diffForHumans()}}</td>
                             

                          

                        </tr>
                       
                        @endforeach 

                        @endif

                    </tbody>
                </table>
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
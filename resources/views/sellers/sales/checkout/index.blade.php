@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')


<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5>Checkout</h5>
            <span class="d-block m-t-5">  <code>  </code>  </span>
        </div>
       
        <div class="card-block table-border-style">
         
	   </div>

        </div>
        
        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Select</th>
                                         <th>S/N</th>
                                         <th>Product Name</th>
                                         <th>Quantity</th>
                                         <th>Price</th>
                                         <th>Customer Name</th>
                                         <th>Customer Phone</th>
                                         <th>Customer Address</th>
                                         <th>Date/Time</th>
                                      </tr>
                                </thead>
                                <tbody>
                                 @if($charts->count() == 0 )
                                <td scope="row"><label class="btn btn-info"> No data Found</label></td>
                                @else
                                @foreach ($charts as $chart)
                                <form action="{{ route('salercheckouts.update',['checkout'=>$chart])}}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                    <tr>
                                        <td> 
                                          
                                          <input type="checkbox" value="{{$chart->id}}" name="select[]">
                                        </td>
                                        <td scope="row">{!!$count++;!!}</td>
                                        <td>{{$chart->product->product_name}}</td>
                                        <td>{{$chart->quantity}}</td>
                                        <td>{{$chart->amount}}</td>
                                        <td>{{$chart->customer->name}}</td>
                                        <td>{{$chart->customer->phone}}</td>
                                        <td>{{$chart->customer->address}}</td>
                                        <td>{{$chart->created_at->diffForHumans()}}</td>
                                    </tr>
                                @endforeach 
                                @endif
                                <input type="submit" class="btn btn-primary" value="Checkout">
                                </form>       
                        </tbody>
                 </table>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')

<script src="{{ asset('js/loader.js')}}"></script>

@endsection
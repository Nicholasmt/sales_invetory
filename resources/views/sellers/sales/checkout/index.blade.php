@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')
 <div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5> Sales Carts</h5>/
            <span class=""> <a href="{{ route('salercreatesales.index')}}" class="">Sales</a>  </span>
        </div>
        <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Checkbox</th>
                            <th>S/N</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                            <th>Customer Name</th>
                            <th>Customer Phone</th>
                            <th>Customer Address</th>
                            <th>Date/Time</th>
                        </tr>
                    </thead>
                    <tbody>
                      <form action="{{route('saler-checkout-selected')}}" method="POST">
                        @csrf
                        @if($carts->count() == 0)
                        <td scope="row"><label class="badge badge-info"> No data Found</label></td>
                        @else
                        @foreach ($carts as $cart)
                          <tr id="sid{{$cart->id}}">
                              <td> 
                                 <input id="checkboxID[]" type="checkbox" class="checkboxclass" value="{{$cart->id}}" name="ids[]" @if (isset($checkouts)) @foreach ($checkouts as $item)@if ($item->id == $cart->id) checked @endif @endforeach  @endif>
                              </td>
                              <td scope="row">{!!$count++;!!}</td>
                              <td>{{$cart->product->product_name}}</td>
                              <td>{{$cart->quantity}}</td>
                              <td>{{$cart->amount}}</td>
                              <td>{{$cart->customer->name}}</td>
                              <td>{{$cart->customer->phone}}</td>
                              <td>{{$cart->customer->address}}</td>
                              <td>{{$cart->created_at->diffForHumans()}}</td>
                           </tr>
                        @endforeach 
                        @endif
                          <a href="{{ route('salercheckouts.index')}}" class="btn btn-white"> <i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a>
                          <button class="btn btn-primary" type="submit" name="checkout" ><i class="fa fa-shopping-cart"></i> checkout</button>  
                          <button class="btn btn-danger" type="submit" name="delete" ><i class="fa fa-trash"></i></button>
                      </form>
                    </tbody>
                    <tfoot>
                        <th>Checkbox</th>
                        <th>S/N</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Customer Name</th>
                        <th>Customer Phone</th>
                        <th>Customer Address</th>
                        <th>Date/Time</th>
                    </tfoot>
                </table> 
                @if (isset($totalPayment))
                  @if($totalPayment != null) 
                    <h5 class="font-bold">Total Payment</h5>
                     <p>Amount: <span>#{{$totalPayment}}</span></p>
                    <form action="{{route('saler-checkout-sales')}}" method="POST">
                        @csrf
                        @foreach ($checkouts as $checkout) 
                        <input type="hidden" value="{{$checkout->id}}" name="ids[]"> 
                        @endforeach  
                        <input type="submit" value="Complete Payment" class="btn btn-success">
                    </form>
                    @endif
                @endif

                <div id="loadCheckouts"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/dataTables/datatables.min.js')}}"></script>
<script src="{{ asset('js/dataTables/dataTables.bootstrap4.min.js')}}"></script>  
<script src="{{ asset('js/loader.js')}}"></script>
 
 
@endsection
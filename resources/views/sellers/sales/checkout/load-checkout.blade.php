 sjcsdbckjsncjhsbcjsncnsclk
@if (isset($totalPayment))
    @if($totalPayment != null) 
    <h5 class="font-bold">Total Payment</h5>
        <p>Amount: <span>#{{$totalPayment}}</span></p>
    <form action="{{route('saler-checkout-sales')}}" method="POST">
        @csrf
        @foreach ($checkouts as $checkout) 
        <input type="hidden" value="{{$checkout->id}}" name="ids[]"> 
        @endforeach  
        <input type="submit" value="Complete Sale" class="btn btn-success">
    </form>
    @else
     <p>Noting is selected</p>
    @endif
@endif
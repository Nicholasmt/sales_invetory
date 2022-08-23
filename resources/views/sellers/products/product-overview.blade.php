@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')
<div class="col-sm-12">
   <div class="card">
     <div class="card-header">
        <h5 class="mb-3">Overviews</h5>/
           <span class=""> 
            <a href="{{ route('saler-dashbaord')}}" class="btn btn-white">Dashboard</a>/ 
            <a href="{{ route('saler-dashbaord')}}" class="btn btn-white">Product Categories</a>
           </span>
        </div>
        <div class="accordion" id="accordionExample">
		   <div class="table-responsive">
               <table class="table">
                <h3>PRODUCT OVERVIEW</h3>
                 <thead>
                   <tr class="text-center">
                    <th>S/N</th>
                    <th>PRODUCT NAME</th>
                    <th>PRICE</th>
                    <th>AVAILABLE QUNATITY</th>
                    <th>TOTAL VALUE</th>
                   </tr>
                 </thead>
                 <tbody>
                 @php $count = 1 @endphp
                 @if ($products->count() == 0)
                  <td class="badge badge-warning"> NO PRODUCT FOUND</td>
                  @else
                   @foreach ($products as $product)
                    <tr class="text-center">
                       <td>{{$count++}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>#{{$product->price}}</td>
                        <td class="font-bold">
                            @if ($product->qty == 0)
                            <p class="badge badge-info">OUT OF STOCK</p></td>
                            @else
                            <p class="badge badge-info">{{$product->qty}}</p></td> 
                            @endif 
                        <td>{{$product->total_value}}</td>
                       </tr>
                      @endforeach
                    @endif
                 </tbody>
                 <tfoot>
                   <thead>
                     <tr class="text-center">
                     <th>S/N</th>
                    <th>PRODUCT NAME</th>
                    <th>PRICE</th>
                    <th>AVAILABLE QUNATITY</th>
                    <th>TOTAL VALUE</th>
                     </tr>
                   </thead>
                 </tfoot>
              </table>
            </div>
		</div>
     </div>
</div>

 <style>
    .move
    {
    text-transform:capitalize;
    font-weight:bolder;
    font-size:16;
    margin-top:-9%;
    margin-left: 30%;
    }
    .eye
    {
    margin-top:-10%;
    margin-left: 60%
    }
</style>

@endsection
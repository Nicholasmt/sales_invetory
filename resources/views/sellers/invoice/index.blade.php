@extends('layouts.app')
@section('title', 'Sales | Inventory')
@section('body')
<div class="col-sm-12">
   <h5 class="text-bold"> Sales Invoice</h5><hr>
     <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item"> </li>
	  </ul>
</div>

<div class="col-lg-4">
  <div class="title-action">
 <!-- <a href="invoice_print.html" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Invoice </a> -->
  </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="wrapper wrapper-content animated fadeInRight">
         <div class="ibox-content ">
            <div class="row">
               <div class="text-left" style="padding:20px;">
                  <h5>{{$company->name}}</h5>
					  <address>
						<P><i class=" fa fa-book"></i> Registration NO: <span>{{$company->registration_number}}</span></P>
						<p><i class="fa fa-map-marker"></i> <span> {{$company->location}}</span></p> 
                        <p><i class="fa fa-phone"></i> <span> {{$company->contact}}</span></p>
					</address>
				</div>
 
                </div>
                <div class="table-responsive m-t">
                    <h3>PURCHASE LIST</h3>
					<table class="table">
					<thead>
						<tr class="text-black">
						    <th>S/N</th>
							<th>Invoice NO</th>
                            <th>Category</th>
							 <th>Item Purchased</th>
							 <th>Quantity</th>
							 <th>Product Price</th>
                             <th>Date/Time</th>
							
                          </tr>
					  </thead>
					  <tbody>
                         @php
                            $count = 1;
                         @endphp
                         @foreach ($sales as $sale)
                           <tr class="text-center">
                            <td>{{$count++}}</td>
							<td><div><strong>{{$sale->invoice_no}}</strong></div>
                            <td>{{$sale->product->category->title}}</td>
                            <td>{{$sale->product->product_name}}</td>
							<td>{{$sale->quantity}} (qty)</td>
							<td>#{{$sale->amount}}</td>
                            <td>{{$sale->created_at}}</td>
						  </tr>
                         @endforeach
                        </tbody>
					</table>
				  </div> 
                  <div>
                    <h3>CUSTOMER'S DETAILS</h3>
                    <p class="text-font"> Name: <span class="span-text" > {{$sale->customer->name}}</span></p>
                    <p class="text-font"> Phone: <span class="span-text"> {{$sale->customer->phone}}</span></p>
                    <p class="text-font"> Address: <span class="span-text"> {{$sale->customer->address}}</span></p>
                </div>
                 <table class="table invoice-total">
					<tbody>
					  <tr>
                        <td><strong>TOTAL :</strong></td>
						<td>#{{$total}}</td>
					  </tr>
					</tbody>
				   </table>
                   <div class="text-right">
                     <!-- <a href="#" target="_blank" class="btn btn-primary">
					 <i class="fa fa-print">
                     </i> Print Invoice </a> -->
                   </div>
                 </div>
               </div>
            </div>
        </div>
        <style>
            .text-font
            {
               font-size:20px;
               font-weight:800;
               color:dark;
            }

            .span-text
            {
                font-weight:400;
            }
        </style>

<script type="text/javascript">
  window.print();
</script>

@endsection
			
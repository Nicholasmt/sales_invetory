
@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')

<div class="col-sm-12">
        <h5> Sales Invoice</h5>
              <hr>
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <!-- <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sales Invoice</a> -->
                </li>
          </div>

            <div class="col-lg-4">
                    <div class="title-action">
                        
                        <!-- <a href="invoice_print.html" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Invoice </a> -->
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">
                            <div class="row">
                                <div class="col-sm-6">
                                    @foreach ($company as $c)
                                     <h5>{{$c->name}}</h5>
                                    <address>
                                        <strong>Company CAC</strong><br>
                                        {{$c->registration_number}}<br>
                                        
                                        <abbr title="Phone">Contact:</abbr> {{$c->contact}}
                                    </address>
                                    @endforeach
                                </div>

                                <div class="col-sm-6 text-right">
                                    <h4>Invoice NO:</h4>
                                    <h6 class="text-navy">{{$invoice->invoice_no}}</h6><hr>
                                    <h4>Customer's Details:</h4>
                                    <address>
                                        <strong>NAME: {{$invoice->customer_name}}</strong><br>
                                        <abbr title="Phone">PHONE NO:</abbr>  {{$invoice->customer_phone}}<br>
                                       ADDRESS: {{$invoice->customer_address}}<br>
                                        
                                    </address>
                                    <p>
                                    <h4>Seller's Details:</h4>
                                        <span><strong>Name:</strong> {{$invoice->user->first_name}}</span><br/>
                                        <span><strong>Phone No:</strong> {{$invoice->user->phone}}</span><br/>
                                        <span><strong>Invoice Date:</strong> {{$invoice->created_at}}</span>
                                    </p>
                                </div>
                            </div>

                            <div class="table-responsive m-t">
                                <table class="table invoice-table">
                                    <thead>
                                    <tr>
                                        <th>Product Purchased</th>
                                        <th>Quantity</th>
                                        <th>Product Category</th>
                                        <th>Product Price</th>
                                        <th>Discounts</th>
                                       
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><div><strong>{{$invoice->product->product_name}}</strong></div>
                                            <small></small></td>
                                        <td>{{$invoice->qty}} (qty)</td>
                                        <td>{{$invoice->category->title}}</td>
                                        <td>{{$invoice->qty}}</td>
                                        <td>
                                          @if ($invoice->discount_id == null)

                                          <label class="badge badge-info"> No Discount Recorded</label>
                                         
                                          @else

                                          {{$invoice->discount->qty_price}}
                                          
                                          @endif  
                                        </td>   
                                         
                                       
                                    </tr>
                                    
                                    </tbody>
                                </table>
                            </div><!-- /table-responsive -->

                            <table class="table invoice-total">
                                <tbody>
                                  <tr>
                                    <td><strong>TOTAL :</strong></td>
                                    <td>#{{$invoice->amount}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="text-right">
                            <a href="{{ route('saler-print',$invoice->id)}}" target="_blank" class="btn btn-primary">
                                <i class="fa fa-print">

                                </i> Print Invoice </a>
                            </div>

                            
                        </div>
                </div>
            </div>
        </div>

        @endsection
			
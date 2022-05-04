@extends('layouts.app')
@section('title', 'Sales | Inventory')
@section('body')

<div class="row">
            <div class="col-lg-11" id="move">
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
                                <style>
                                  #move{
                                      margin-left:3%;
                                      margin-top: 1%
                                  }
                                </style>

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
                                        <span><strong>Sale Date:</strong> {{$invoice->created_at}}</span>
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
                                        <td># {{$invoice->amount}}</td>
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
                            <!-- <div class="text-right">
                            <a href="#" target="_blank" class="btn btn-primary">
                                <i class="fa fa-print">

                                </i> Print Invoice </a>
                            </div> -->

                            
                        </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
        window.print();
        </script>

        @endsection

        
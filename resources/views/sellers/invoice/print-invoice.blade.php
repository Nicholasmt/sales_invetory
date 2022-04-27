@extends('layouts.app')
@section('title', 'Sales | Inventory')
@section('body')

<div class="row">
            <div class="col-lg-11" id="move">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>Company Name:</h5>
                                    <address>
                                        <strong>Inspinia, Inc.</strong><br>
                                        106 Jorg Avenu, 600/10<br>
                                        Chicago, VT 32456<br>
                                        <abbr title="Phone">P:</abbr> (123) 601-4590
                                    </address>
                                </div>

                                <style>
                                  #move{
                                      margin-left:3%;
                                      margin-top: 1%
                                  }
                                </style>

                                <div class="col-sm-6 text-right">
                                    <h4>Invoice No.</h4>
                                    <h4 class="text-navy">{{$invoice->invoice_no}}</h4>
                                    <h4>Customer's Details:</h4>
                                    <address>
                                        <strong>NAME: {{$invoice->customer_name}}</strong><br>
                                        <abbr title="Phone">PHONE NO:</abbr>  {{$invoice->customer_phone}}<br>
                                       ADDRESS: Miami, CT 445611<br>
                                        
                                    </address>
                                    <p>
                                    <h4>Sellers Details:</h4>
                                        <span><strong>Sellers Name:</strong> {{$invoice->user_id}}</span><br/>
                                        <span><strong>Sellers Phone No:</strong> {{$invoice->user_id}}</span><br/>
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
                                        <td><div><strong>{{$invoice->product_id}}</strong></div>
                                            <small></small></td>
                                        <td>{{$invoice->qty}} (qty)</td>
                                        <td>{{$invoice->cat_id}}</td>
                                        <td>{{$invoice->qty}}</td>
                                        <td>$31,98</td>
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

        
@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')

@section('header')

<link rel="stylesheet" href="{{ asset('assets/plugins/chart-morris/css/morris.css')}}">

@endsection

                                 <div class="col-md-6 col-xl-4">
                                    <div class="card daily-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4">Daily Sales </h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>$ {{$totalDaily}}</h3>
                                                </div>

                                                <div class="col-3 text-right">
                                                     
                                                    <p class="m-b-0">  {{$daily_qty}} (qty)</p>
                                                </div>
                                            </div>
                                            <div class="progress m-t-30" style="height: 7px;">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: {{$daily_sales->count()/24}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[ daily sales section ] end-->
                                <!--[ Monthly  sales section ] starts-->
                                <div class="col-md-6 col-xl-4">
                                    <div class="card Monthly-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4">Monthly Sales</h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>$ {{$totalMonthly}}</h3>
                                                </div>
                                                <div class="col-3 text-right">
                                                     
                                                    <p class="m-b-0">{{$monthly_qty}} (qty)</p>
                                                </div>
                                            </div>
                                            <div class="progress m-t-30" style="height: 7px;">
                                                <div class="progress-bar progress-c-theme2" role="progressbar" style="width: {{$monthly_sales->count()/30}}%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[ Monthly  sales section ] end-->
                                <!--[ year  sales section ] starts-->
                                <div class="col-md-12 col-xl-4">
                                    <div class="card yearly-sales">
                                        <div class="card-block">
                                            <h6 class="mb-4">Yearly Sales</h6>
                                            <div class="row d-flex align-items-center">
                                                <div class="col-9">
                                                    <h3 class="f-w-300 d-flex align-items-center  m-b-0"><i class="feather icon-arrow-up text-c-green f-30 m-r-10"></i>$ {{$totalYearly}}</h3>
                                                </div>
                                                <div class="col-3 text-right">
                                                  
                                                    <p class="m-b-0">{{$yearly_qty}} (qty)</p>
                                                </div>
                                            </div>
                                            <div class="progress m-t-30" style="height: 7px;">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width: {{$yearly_sales->count()/356}}%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                    <div class="col-xl-12">
                    <h3 class="mb-4">Product Overview</h3> 
                         <div class="card-block">
                           <div class="row align-items-center justify-content-center m-b-20">
                                    <div class="col-6">
                                        <h4 class="f-w-300 d-flex align-items-center float-left m-0">Stocks  Availablity</h4>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="d-flex  align-items-center float-right m-0">(QTY) <i class="fas fa-caret-up text-c-green f-22 m-l-10"></i></h6>
                                    </div>
                                </div>

                                <div class="row">
                                  
                                <div class="col-xl-12">

                                @foreach ($product as $p)
                                    
                                  <h6 class="align-items-center float-left"><i  class="text-c-yellow">{{$p->qty/100}}%  </i>{{$p->product_name}}</h6>
                                 <div class="col-12">
                                    <h6 class="align-items-center float-right">{{$p->qty}}</h6>
                                    </div>
                                    <div class="progress m-t-30 m-b-20" style="height: 6px;">
                                        <div class="progress-bar progress-c-theme" role="progressbar" style="width: {{$p->qty/100}}%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
									 @endforeach
									
                                   </div>

                                  

                                </div>

                            </div>
                        </div>


 

@endsection

@section('script')

<!-- chart-morris Js -->
<script src="{{ asset('assets/plugins/chart-morris/js/raphael.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/chart-morris/js/morris.min.js')}}"></script>
    <script src="{{ asset('assets/js/pages/chart-morris-custom.js')}}"></script>
@endsection


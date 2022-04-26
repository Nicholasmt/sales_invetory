@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')


<div class="col-sm-12">
        <h5 class="mb-3"> Product Overview</h5>
        <hr>
        <div class="accordion" id="accordionExample">
			 @foreach ($category as $c)
            <div class="card">
			
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0"><a href="#!" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Category: {{$c->title}}</a></h5>
                </div>
                <div id="collapseOne" class=" card-body collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">

                <div class="col-md-6 form-group">
                       <label for=""> Product Title</label>
                   </div> 

                   <div class="col-md-6 form-group">
                       
                       <p class="move"> {{$c->description}} </p><a href="{{ route('saler-viewP',$c->id)}}" class=" btn btn-primary fa fa-eye eye"> </a><hr>

                   </div> 

               
               
            </div>
			
			 @endforeach

            <!-- <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0"><a href="#!" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">  Level</a></h5>
                </div>
                <div id="collapseTwo" class="collapse card-body" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    
                <div class="col-md-6 form-group">
                       <label for=""> Your Privilege</label>
                   </div> 

                   <div class="col-md-6 form-group">
                       
                       <label class="btn btn-info move"> sdfvdg</label>

                   </div> 

                </div>
            </div> -->
            
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
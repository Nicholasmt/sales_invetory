@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')


<div class="col-sm-12">
        <h5 class="mb-3"> Product Overview</h5>
        <hr>
        <div class="accordion" id="accordionExample">
        @foreach ($product as $p) 
            <div class="card">
			
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0"><a href="#!" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Products {{$p->category->title}}</a></h5>
                </div>
                <div id="collapseOne" class=" card-body collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">

              
                <div class="col-md-6 form-group">
                       <label for=""> Product Title</label>
                   </div> 
 
                   <div class="col-md-6 form-group">
                       
                       <label class="btn btn-info move">{{$p->category->description}}</label>
                   </div> 

                   <div class="col-md-6 form-group">
                       <label for=""> Product Price</label>
                   </div> 
 
                   <div class="col-md-6 form-group">
                       
                       <label class="btn btn-info move">#{{$p->price}}</label>
                   </div> 

                   <div class="col-md-6 form-group">
                       <label for=""> Product Category</label>
                   </div> 

                   <div class="col-md-6 form-group">
                       
                       <label class="btn btn-info move">{{$p->category->title}}</label>

                   </div> 


                   <div class="col-md-6 form-group">
                       <label for="">Avaliable Quantity</label>
                   </div> 

                   <div class="col-md-6 form-group">
                       
                       <label class="btn btn-info move">{{$p->qty}} (qty)</label>

                   </div> 


                   <div class="col-md-6 form-group">
                       <label for=""> Toatl Value Price</label>
                   </div> 

                   <div class="col-md-6 form-group">
                       
                       <label class="btn btn-info move">#{{$p->total_value}}</label>

                   </div> 

                  

                </div>

                

               
               
            </div>
			
			 @endforeach
 
            
        </div>
    </div>

 <style>
                       .move
                       {
                           text-transform:capitalize;
                           font-weight:bolder;
                           font-size:16;
                           margin-top:-12%;
                           margin-left: 30%;
                       }
                       
                </style>

@endsection
          
          
          
          
          
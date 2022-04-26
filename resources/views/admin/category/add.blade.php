@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')


        <div class="col-sm-12">
           <h5>Product</h5>
              <hr>
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Categories</a>
                </li>


              <div class="col-sm-12">
                <h5 class="mt-4">View/Add</h5>
                <hr>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Add New</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                    </li> -->
                </ul>

                <div class="tab-content" id="pills-tabContent">
					
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						
                       <div class="card-block table-border-style">
                        <form action="" class="">
                          <div class="input-group">
                           <input type="text" class="form-control" placeholder="Search Salers" name="keyword">
                             <div class="input-group-append">
                            <input class="btn btn-primary" type="submit" value="Search">
                        </div>
                    </div>
                  </form>
               

                    </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                @if($cats->count() == 0 )

                                <td scope="row"><label class="btn btn-info"> No data Found</label></td>

                                @else
                                                                

                                @foreach ($cats as $c)
                                    <tr>
                                        
                                        <td scope="row">{!!$count++;!!}</td>
                                        <td>{{$c->title}}</td>
                                        <td>{{$c->description}}</td>
                                        <td>{{$c->created_at->diffForHumans()}}</td>
                                        <td><a href="" class="btn btn-primary"> Edit</a></td>
                                        <td><a href="" class="btn btn-danger"> Delete</a></td>
                                   
                                    </tr>
                                
                                    @endforeach 

                                    @endif

                                </tbody>
                            </table>
                        </div>
					</div>

                    
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row">
                      <div class="col-md-6">
                        <form method="POST" action="{{ route('admin-savecats')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Title</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title" name="title">
                               
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder=" Enter Description" name="description">
                            </div>

                             <input type="submit" class="btn btn-primary" value="Create" >

                            </form>
                          </div>
                        </div>

                    
                    </div>
                </div>
            </div>
        </div>
	</div>

 
          



@endsection
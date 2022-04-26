@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')


        <div class="col-sm-12">
           <h5>Notifications</h5>
              <hr>
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                <!-- <li class="nav-item">
                    <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sales</a>
                </li> -->


              <div class="col-sm-12">
                <h5 class="mt-4">View / Create Notification</h5>
                <hr>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Create Notification</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                    </li> -->
                </ul>

                <div class="tab-content" id="pills-tabContent">
					
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						
                       <div class="card-block table-border-style">

                       <h5 class="mt-4">All Notifications</h5><br>

                        <!-- <form action="" class="">
                          <div class="input-group">
                           <input type="text" class="form-control" placeholder="Search Salers" name="keyword">
                             <div class="input-group-append">
                            <input class="btn btn-primary" type="submit" value="Search">
                        </div>
                    </div>
                  </form> -->
               

                    </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Tile</th>
                                        <th>User</th>
                                        <th>Description</th>
                                        <th>Message</th>
                                        <th>Date/Time</th>
                                        <th>Action</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                @if($notify->count() == 0 )

                                <td scope="row"><label class="btn btn-info"> No data Found</label></td>

                                @else
                                                                

                                @foreach ($notify as $n)
                                    <tr>
                                        
                                        <td ncope="row">{!!$count++;!!}</td>
                                        <td>{{$n->qty}}</td>
                                        <td>{{$n->amount}}</td>
                                        <td>{{$n->customer_name}}</td>
                                        <td>{{$n->customer_phone}}</td>
                                        <td>{{$n->created_at->diffForHumans()}}</td>
                                        <td><a href="" class="fa fa-eye"></a></td>
                                       
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
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title" name="qty">
                               
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder=" Enter Description" name="description">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Message</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder=" Enter Message" name="message">
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

 
          
<script src="{{ asset('js/loader.js')}}"></script>


@endsection
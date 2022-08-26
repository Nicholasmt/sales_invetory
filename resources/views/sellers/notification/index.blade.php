@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')
 <div class="col-sm-12">
 <div class="card">
     <div class="card-header">
        <h5 class="mb-3">Notifications</h5>/
           <span class=""> <a href="{{ route('saler-dashbaord')}}" class="">Dashboard</a>  </span>
         </div>
			 <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-inbox" role="tab" aria-controls="pills-inbox" aria-selected="true">Inbox <i class="fa fa-arrow-down"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-new" role="tab" aria-controls="pills-new" aria-selected="false">New <i class="fa fa-plus"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-sent" role="tab" aria-controls="pills-sent" aria-selected="false">Sent <i class="fa fa-arrow-up"></i></a>
				</li>
			 </ul>
              <div class="tab-content" id="pills-tabContent">
           <!--Tab #1 Starts-->
				  <div class="tab-pane fade show active" id="pills-inbox" role="tabpanel" aria-labelledby="pills-home-tab">
					 <div class="card-block table-border-style">
                       <h3 class="mt-4">Inbox</h3><br>
                     </div>
                     <div class="table-responsive">
                       <table class="table">
                         <thead>
                             <tr class=" ">
								<th>S/N</th>
								<th>SUBJECT</th>
								<th>DESCRIPTION</th>
								<th>SENDER</th>
								<th>DATE</th>
								<th>ACTION</th>
                              </tr>
                          </thead>
                          <tbody>
							@php $count=1 @endphp
							@if ($inboxes->count()==0)
							  <td class="badge badge-warning"> No Message Found</td>
							  @else
							  @foreach ($inboxes as $inbox)
							  <tr class=" ">
								@if ($inbox->status==0)
								 <td class="bold-text">{{$count++}}</td>
								 <td class="bold-text">{{$inbox->subject}} </td>
								 <td class="bold-text">{{$inbox->description}}</td>
								 <td class="bold-text"> {{$inbox->user->first_name}} </td>
								 <td class="bold-text">{{$inbox->created_at}} </td>
								 <td class="bold-text"> 
								   <form action="" method="POST">
									   <span class="badge badge-danger">new</span>
									   <button class="btn btn-primary" type="submit" name="new">
											 <i class="fa fa-envelope"></i>  
										</button>
									</form>
								 </td>
								 @else
								 <td>{{$count++}}</td>
								 <td>{{$inbox->subject}} </td>
								 <td>{{$inbox->description}}</td>
								 <td> {{$inbox->user->first_name}} </td>
								 <td>{{$inbox->created_at}} </td>
								 <td>
									<form action="" method="POST">
									    <button class="btn btn-secondary" type="submit" name="read">
											 <i class="fa fa-envelope"></i>  
										</button>
									</form>
								</td>
								@endif
                                 
							  </tr>
							  @endforeach
							  @endif
                          </tbody>
                          <tfoot>
							 <thead>
								<tr class="">
									<th>S/N</th>
									<th>SUBJECT</th>
									<th>DESCRIPTION</th>
									<th>SENDER</th>
									<th>DATE</th>
									<th>ACTION</th>
								</tr>
							 </thead>
                          </tfoot>
                     </table>
                  </div>
		      </div>
         <!--Tab #1 Ends-->
				  
        <!--Tab #2 Starts-->
              <div class="tab-pane fade" id="pills-new" role="tabpanel" aria-labelledby="pills-profile-tab">
                 <div class="row">
                    <div class="col-md-12">
                    <h3 class="mt-4">Compose</h3><br>
					@if (Session::get('user_auth') == true && Session::get('privilege') == 1)
                    <form method="POST" action="{{ route('adminnotifications.store')}}">
					@elseif (Session::get('user_auth') == true && Session::get('privilege') == 2)
					<form method="POST" action="{{ route('salernotifications.store')}}">
					@endif
                          @csrf
                          <div class="form-group">
                              <label for="exampleInputEmail1">Subject</label>
                              <input type="text" class="form-control"  placeholder="Enter Title" name="subject">
                          </div>

						 <div class="form-group">
							<label for="exampleInputPassword1">Description</label>
							<input type="text" class="form-control"   placeholder=" Enter Description" name="description">
						 </div>

						  <div class="form-group">
							<label for="exampleInputPassword1">Message</label>
							<textarea type="text" class="form-control"   placeholder=" Enter Message" name="message"></textarea>
						  </div>
					      <div class="form-group">
						   <input type="submit" class="btn btn-primary" value="Send" >
					      </div>
				     </form>
                   </div>
               </div>
             </div>
        <!--Tab #2 Ends-->
				  
        <!--Tab #3 Starts-->
			  <div class="tab-pane fade" id="pills-sent" role="tabpanel" aria-labelledby="pills-home-tab">
				 <div class="card-block table-border-style">
				   <h3 class="mt-4">Sent</h3><br>
				 </div>
				 <div class="table-responsive">
				   <table class="table">
					 <thead>
						 <tr class="">
						    <th>S/N</th>
							<th>SUBJECT</th>
							<th>DESCRIPTION</th>
							<th>SENDER</th>
							<th>DATE</th>
							<th>ACTION</th>
						</tr>
					  </thead>
					  <tbody>
					   @if ($sents->count()==0)
						 <td class="badge badge-warning"> No Message Found</td>
					    @else
					    @foreach ($sents as $sent )
						  <tr class=" ">
							<td>{{$count++}}</td>
							 <td>{{$sent->subject}}</td>
							 <td>{{$sent->description}}</td>
							 <td>{{$sent->user->first_name}}</td>
							 <td>{{$sent->created_at}}</td>
							 <td> <a href="" class="btn btn-warning"> <i class="fa fa-eye"></i></a></td>
						 </tr>
					    @endforeach
					  @endif
					  </tbody>
					  <tfoot>
						 <thead>
							<tr class="">
								<th>S/N</th>
								<th>SUBJECT</th>
								<th>DESCRIPTION</th>
								<th>SENDER</th>
								<th>DATE</th>
								<th>ACTION</th>
							</tr>
						 </thead>
					  </tfoot>
				 </table>
			  </div>
		  </div>
<!--Tab #3 Ends-->
        </div>
     </div>
  </div>
 
 <style>
  .bold-text
  {
	font-weight:600;
	font-size:20px;
	color:black;
  }
 </style>

 
          
<script src="{{ asset('js/loader.js')}}"></script>


@endsection
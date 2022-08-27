@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')
<!-- [ breadcrumb ] start -->
<div class="page-header">
	<div class="page-block">
		<div class="row align-items-center">
			<div class="col-md-12">
				<div class="page-header-title">
					<h5 class="m-b-10">Notifications</h5>
				</div>
				<ul class="breadcrumb">
				@if (Session::get('user_auth') == true && Session::get('privilege') == 1)
                   <li class="breadcrumb-item"><a href="{{ route('admin-dashbaord')}}"><i class="feather icon-home"></i></a></li>
				@elseif (Session::get('user_auth') == true && Session::get('privilege') == 2)
				    <li class="breadcrumb-item"><a href="{{ route('saler-dashbaord')}}"><i class="feather icon-home"></i></a></li>
				@endif
					<li class="breadcrumb-item"><a href="javascript:">Notifications</a></li>

				 </ul>
			 </div>
		 </div>
	  </div>
   </div>
<!-- [ breadcrumb ] end -->
    <div class="col-xl-12">
          <!-- <div class="card">
				<div class="card-header">
					<h5>Messages</h5>
				</div>
           </div> -->
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
                       <h3 class="mt-1 font-bold text-center">INBOX</h3><br>
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
							@if($unread->count()==1)
						      <p class="padding text-center">You have 
								<span class="text-info font-bold">{{$unread->count()}}</span> 
								<span class="badge badge-danger">new</span> unread Message
							  </p>
							@else
							  <p class="padding text-center">You have 
								<span class="text-info font-bold">{{$unread->count()}}</span> 
								<span class="badge badge-danger">new</span> unread Messages
							  </p>
							@endif
						    @php $count=1 @endphp
							@if ($inboxes->count()==0)
							  <td class="badge badge-warning"> No Message Found</td>
							  @else
							  @foreach ($inboxes as $inbox)
							  <tr class=" ">
								@if ($inbox->status==0)
								 <td class="bold-text">{{$count++}}</td>
								 <td class="bold-text">{{$inbox->subject}}  <span class="badge badge-danger">new</span> </td>
								 <td class="bold-text">{{$inbox->description}}</td>
								 <td class="bold-text"> {{$inbox->user->first_name}} </td>
								 <td class="bold-text">{{$inbox->created_at}} </td>
								 <td class="bold-text"> 
								 @if (Session::get('user_auth') == true && Session::get('privilege') == 1)
								  <a href="{{ route('adminnotifications.show',['notification'=>$inbox])}}" class="btn btn-info"><i class="fa fa-envelope"></i></a>
								@elseif (Session::get('user_auth') == true && Session::get('privilege') == 2)
								  <a href="{{ route('salernotifications.show',['notification'=>$inbox])}}" class="btn btn-info"><i class="fa fa-envelope"></i></a>
								@endif
								</td>
								 @else
								 <td>{{$count++}}</td>
								 <td>{{$inbox->subject}} </td>
								 <td>{{$inbox->description}}</td>
								 <td> {{$inbox->user->first_name}} </td>
								 <td>{{$inbox->created_at}} </td>
								 <td>
								 @if (Session::get('user_auth') == true && Session::get('privilege') == 1)		
                                   <a href="{{ route('adminnotifications.show',['notification'=>$inbox])}}" class="btn btn-info"><i class="fa fa-envelope"></i></a>
								 @elseif (Session::get('user_auth') == true && Session::get('privilege') == 2)
								   <a href="{{ route('salernotifications.show',['notification'=>$inbox])}}" class="btn btn-secondary"><i class="fa fa-envelope"></i></a>
								 @endif
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
				   <h3 class="mt-1">Sent</h3><br>
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
 
 <style>
  .bold-text
  {
	font-weight:600;
	font-size:20px;
	color:black;
  }
    select.form-control.form-control-sm
    {
        padding:8px 7px;
    }
 </style>

   

 
          

 @endsection
 @section('script')
       <script src="{{ asset('js/loader.js')}}"></script>
       <script src="{{ asset('js/dataTables/datatables.min.js')}}"></script>
       <script src="{{ asset('js/dataTables/dataTables.bootstrap4.min.js')}}"></script>  
       <script>
         $(document).ready(function(){
                $('.table').DataTable({
                    pageLength: 10,
                    responsive: true,
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                         {extend: 'print',
                        customize: function (win){
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');

                                $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                        }
                        }
                    ]

                });

            });

        </script>
 
 @endsection
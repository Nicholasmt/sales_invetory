@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')
 <div class="col-sm-12">
      <h5>Notifications</h5>
         <hr>
             <ul class="nav nav-tabs" id="myTab" role="tablist">
                 <h5 class="mt-4"> <a href="" class="">Dashhboard</a>/ 
                    <span> 
                       Notifications
                    </span> 
                 </h5>
             </ul>		  
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
<!--				  Tab #1 Starts-->
				  <div class="tab-pane fade show active" id="pills-inbox" role="tabpanel" aria-labelledby="pills-home-tab">
					 <div class="card-block table-border-style">
                       <h3 class="mt-4">Inbox</h3><br>
                     </div>
                     <div class="table-responsive">
                       <table class="table">
                         <thead>
                             <tr class=" ">
								<th>S/N</th>
								<th>Subject</th>
								<th>Sender</th>
								<th>Description</th>
								<th>Date/Time</th>
								<th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <td class="badge badge-warning"> No Message Found</td>
                              <tr class=" ">
                                 <td></td>
								 <td> </td>
								 <td></td>
								 <td>  </td>
								 <td> </td>
								 <td> </td>
								 <td> </td>
                              </tr>
                          </tbody>
                          <tfoot>
							 <thead>
								<tr class="">
									<th>S/N</th>
									<th>Subject</th>
									<th>Sender</th>
									<th>Description</th>
									<th>Date/Time</th>
									<th>Action</th>
								</tr>
							 </thead>
                          </tfoot>
                     </table>
                  </div>
		      </div>
<!--				  Tab #1 Ends-->
				  
<!--				  Tab #2 Starts-->
              <div class="tab-pane fade" id="pills-new" role="tabpanel" aria-labelledby="pills-profile-tab">
                 <div class="row">
                    <div class="col-md-12">
                    <h3 class="mt-4">Compose</h3><br>
                      <form method="POST" action=" ">
                          @csrf
                          <div class="form-group">
                              <label for="exampleInputEmail1">Title</label>
                              <input type="text" class="form-control"  placeholder="Enter Title" name="qty">
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
						   <input type="submit" class="btn btn-primary" value="Create" >
					      </div>
				     </form>
                   </div>
               </div>
             </div>
<!--				  Tab #2 Ends-->
				  
<!--				  Tab #3 Starts-->
			  <div class="tab-pane fade" id="pills-sent" role="tabpanel" aria-labelledby="pills-home-tab">
				 <div class="card-block table-border-style">
				   <h3 class="mt-4">Sent</h3><br>
				 </div>
				 <div class="table-responsive">
				   <table class="table">
					 <thead>
						 <tr class=" ">
							<th>S/N</th>
							<th>Subject</th>
							<th>Sender</th>
							<th>Description</th>
							<th>Time</th>
							<th>Action</th>
						  </tr>
					  </thead>
					  <tbody>
						  <td class="badge badge-warning"> No Message Found</td>
						  <tr class=" ">
							 <td></td>
							 <td> </td>
							 <td></td>
							 <td>  </td>
							 <td> </td>
							 <td> </td>
							 <td> </td>
						  </tr>
					  </tbody>
					  <tfoot>
						 <thead>
							<tr class="">
								<th>S/N</th>
								<th>Subject</th>
								<th>Sender</th>
								<th>Description</th>
								<th>Time</th>
								<th>Action</th>
							</tr>
						 </thead>
					  </tfoot>
				 </table>
			  </div>
		  </div>
<!--				  Tab #3 Ends-->
        </div>
     </div>
 
 

 
          
<script src="{{ asset('js/loader.js')}}"></script>


@endsection
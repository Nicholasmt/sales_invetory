@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')
 
@section('header')
  <link href="{{ asset('assets/css/datatables.min.css')}}" rel="stylesheet">
@endsection
 <div class="col-sm-12">
   <h5>Employees</h5>
      <hr>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
           <li class="nav-item">
              <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="{{ route('admin-dashboard')}}" role="tab" aria-controls="home" aria-selected="true">Dashboard</a>
           </li>
			 <div class="col-sm-12">
               <h5 class="mt-4">Setup Employee</h5>
                <hr>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                   <li class="nav-item">
                       <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"> <i class="fa fa-home"></i> Employee</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fa fa-plus"></i> Add</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
				   <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					   <div class="card-block table-border-style">
				  </div>
          <div class="table-responsive">
				    <table class="table">
					   <thead>
						   <tr>
								<th>S/N</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Address</th>
                <th>Actions</th>
						   </tr>
						</thead>
						<tbody>
					  @foreach ($users as $user)
							<tr>
								<th scope="row">{{$count ++;}}</th>
								<td>{{$user->first_name}}</td>
								<td>{{$user->last_name}}</td>
								<td>{{$user->email}}</td>
								<td>{{$user->phone}}</td>
								<td>{{$user->address}}</td>
                <td> <a href="" class="btn btn-danger"> <i class="fa fa-trash"></i> </a></td>
							</tr>
						 @endforeach 
					   </tbody>
					 </table>
				  </div>
			   </div>
         <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row">
               <div class="col-md-6">
				       <form action="{{ route('adminusers.store')}}">
                @csrf
                   <div class="form-group">
                      <label>First Name</label>
                      <input type="text" class="form-control" placeholder="Enter First name" name="first_name">
                   </div>
                   <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" class="form-control" placeholder="Enter Last name" name="last_name">
                   </div>
                   <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" placeholder="Enter Email" name="email">
                   </div>
                   <div class="form-group">
                      <label for="exampleFormControlSelect1">Select Privilege</label>
                      <select class="form-control" id="exampleFormControlSelect1">
                          @foreach ($roles as $role )
                            <option value="{{$role->role_id}}">{{$role->title}}</option>
                          @endforeach
                      </select>
                   </div>
                   <div class="form-group">
                      <label for="exampleInputPassword1">Address</label>
                      <input type="text" class="form-control" placeholder="Enter address" name="address">
                   </div>
                   <div class="form-group">
                      <label for="exampleInputPassword1">Phone</label>
                      <input type="text" class="form-control"  placeholder="Enter Phone" name="last_name">
                   </div>
				         <div class="col-md-12">
                    <input type="submit" class="btn btn-primary" value="Submit">
                   </div>
				         </form>
                </div>
            </div>
        </div>
    </div>
</div>
	 
<style>
     select.form-control.form-control-sm
    {
        padding:10px 10px;
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
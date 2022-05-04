@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')


@section('header')

    <link href="{{ asset('assets/css/datatables.min.css')}}" rel="stylesheet">

    @endsection

    <div class="col-sm-12">
           <h5>System Logs</h5>
              <hr>
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <!-- <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Categories</a> -->
                </li>
			 

              <div class="col-sm-12">
                <h5 class="mt-4">Logs</h5>
                <hr>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Logs</a>
                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Add New</a> -->
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                    </li> -->
                    
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
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>Log IN Time</th>
                                        <th>Log Out Time</th>
                                        <!-- <th>Actions</th> -->
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                @if($logs->count() == 0 )

                                <td scope="row"><label class="btn btn-info"> No data Found</label></td>

                                @else
                                                                

                                @foreach ($logs as $l)
                                    <tr>
                                        
                                        <td scope="row">{!!$count++;!!}</td>
                                        <td>{{$l->user->first_name}}</td>
                                        <td>{{$l->user->email}}</td>
                                        <td>{{$l->login_time}}</td>
                                        <td>{{$l->logout_time}}</td>
                                        <!-- <td>{{$l->created_at->diffForHumans()}}</td> -->
                                         <!-- <td><a href="" class="btn btn-danger"> Delete</a></td> -->
                                   
                                    </tr>
                                
                                    @endforeach 

                                    @endif

                                </tbody>
                            </table>
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
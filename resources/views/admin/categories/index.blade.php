@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')
@section('header')
 <link href="{{ asset('assets/css/datatables.min.css')}}" rel="stylesheet">
@endsection
<div class="col-sm-12">
    <h5>Categories</h5>
     <hr>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="{{ route('admin-dashboard')}}" role="tab" aria-controls="home" aria-selected="true">Dashboard</a>
        </li>
      </ul>
        <div class="col-sm-12">
           <h5 class="mt-4">Categories</h5>
             <hr>
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                 <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fa fa-book"></i> Categories</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"> <i class="fa fa-plus"></i> Add New</a>
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
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($categories->count() == 0 )
                           <td scope="row"><label class="btn btn-info"> No data Found</label></td>
                        @else
                        @foreach ($categories as $category)
                        <tr>
                            <td scope="row">{!!$count++;!!}</td>
                            <td>{{$category->title}}</td>
                            <td>{{$category->description}}</td>
                            <td>{{$category->created_at->diffForHumans()}}</td>
                            <td>
                               <a href="{{ route('admincategories.edit',['category'=>$category])}}" class="btn btn-primary"> <i class="fa fa-edit"></i></a>
                               <span>
                                 <a id="deletecategory" value="{{$category->id}}" class="btn btn-danger"> <i class="fa fa-trash text-white"></i></a>
                              </span>
                              <div id="modal"></div>
                              </td>
                         </tr>
                        @endforeach 
                        @endif
                      </tbody>
                      <tfoot>
                         <tr>
                            <th>S/N</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Actions</th>
                         </tr>
                      </tfoot>
                    </table>
                 </div>
			  </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                 <div class="row">
                    <div class="col-md-6">
                       <form method="POST" action="{{ route('admincategories.store')}}">
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
<style>
   select.form-control.form-control-sm
    {
        padding:10px 10px;
    }
</style>  
  
@endsection
@section('script')
<script src="{{ asset('js/delete.js')}}"></script>
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
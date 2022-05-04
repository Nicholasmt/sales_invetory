@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')

@section('header')

<link href="{{ asset('assets/css/datatables.min.css')}}" rel="stylesheet">

@endsection

<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5>All Salers</h5>
            <span class="d-block m-t-5">Employed <code> Sellers</code> Information</span>
        </div>
        <div class="card-block table-border-style">

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
                        </tr>
                    </thead>
                    <tbody>
                        
                    @if($sellers->count() == 0 )

                            <th ><p class="btn btn-info"> No data Found</p></th>

                            @else
                            
                     @foreach ($sellers as $s)
                        <tr>
                            

                            <th scope="row">{{$count ++;}}</th>
                            <td>{{$s->first_name}}</td>
                            <td>{{$s->last_name}}</td>
                            <td>{{$s->email}}</td>
                            <td>{{$s->phone}}</td>
                            <td>{{$s->address}}</td>
                          </tr>
                       
                        @endforeach 

                        @endif

                    </tbody>
                </table>
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
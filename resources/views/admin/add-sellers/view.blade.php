@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')


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


@endsection
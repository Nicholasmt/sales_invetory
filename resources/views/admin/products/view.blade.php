@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')


<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5>Products</h5>
            <span class="d-block m-t-5">All <code> Avaiable</code> Products</span>
        </div>
       
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
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    @if($products->count() == 0 )

                    <td><p class="btn btn-info"> No data Found</p></td>

                            @else

                            
                     @foreach ($products as $p)
                        <tr>
                           
                            <td scope="row">{{$count ++;}}</td>
                            <td>{{$p->price}}</td>
                            <td>{{$p->qty}}</td>
                            <td>{{$p->total_value}}</td>
                            <td>{{$p->category->title}}</td>
                            <td>{{$p->created_at->diffForHumans()}}</td>
                            <td><a href="" class="btn btn-primary">Edit</a></td>
                            <td><a href="" class="btn btn-danger">Delete</a></td>

                          

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
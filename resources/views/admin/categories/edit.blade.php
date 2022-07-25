@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')
 <div class="col-sm-12">
    <div class="card">
        <div class="card-header">
                <h5>Category</h5>
            </div>
            <div class="card-body">
                <h5>Update/ <hr>
                   <a href="{{ route('admincategories.index')}}">
                     <h5>Categories</h5>  
                   </a>
                </h5>
                 <hr>
                <div class="row">
                    <div class="col-md-6">
                      <form action="{{ route('admincategories.update',['category'=>$category])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Title</label>
                                <input type="text" value="{{$category->title}}" class="form-control" placeholder="Enter Category Name" name="title">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Description</label>
                                <input type="text" class="form-control" value="{{$category->description}}" placeholder="Enter Description" name="description">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Update" >
                      </form>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
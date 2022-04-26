@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')


<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5>Sales Record</h5>
            <span class="d-block m-t-5">All <code> Products</code> Sales</span>
        </div>
       
        <div class="card-block table-border-style">
            <form action="" class="">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Sales" name="keyword">
            <div class="input-group-append">
                <input class="btn btn-primary" type="submit" value="Search">
            </div>
		</div>
			</form>
	   </div>

        </div>
        
            <div id="result"></div>

        </div>
    </div>
</div>


@endsection
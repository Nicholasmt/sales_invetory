@extends('layouts.body')
@section('title', 'Sales | Inventory')
@section('content')
<div class="col-sm-12">
   <div class="card">
     <div class="card-header">
        <h5 class="mb-3">Overviews</h5>/
           <span class=""> 
            <a href="{{ route('saler-dashbaord')}}" class="">Dashboard</a>/ 
            <a href="{{ route('saler-dashbaord')}}" class="">Product Categories</a>
           </span>
        </div>
        <div class="accordion" id="accordionExample">
		   <div class="table-responsive">
               <table class="table">
                <h3>PRODUCT OVERVIEW</h3>
                 <thead>
                   <tr>
                    <th>S/N</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>ACTION</th>
                   </tr>
                 </thead>
                 <tbody>
                 @php $count = 1 @endphp
                 @foreach ($categories as $category)
                    <tr>
                        <td>{{$count++}}</td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->description}}</td>
                        <td><a href="{{ route('saler-viewP',$category->id)}}" class="btn btn-primary"> <i class="fa fa-eye"></i> </a></td>
                    </tr>
                    @endforeach
                 </tbody>
                 <tfoot>
                   <thead>
                     <tr>
                        <th>TITLE</th>
                        <th>DESCRIPTION</th>
                        <th>ACTION</th>
                     </tr>
                   </thead>
                 </tfoot>
              </table>
            </div>
		</div>
     </div>
</div>

 <style>
    .move
    {
    text-transform:capitalize;
    font-weight:bolder;
    font-size:16;
    margin-top:-9%;
    margin-left: 30%;
    }
    .eye
    {
    margin-top:-10%;
    margin-left: 60%
    }
</style>

@endsection
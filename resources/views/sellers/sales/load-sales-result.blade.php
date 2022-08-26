<div class="table-responsive">
    <table class="table">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Product Price</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($sales->count() == 0 )
                <td class="badge badge-warning"> No data Found</td>
                @else
                @foreach ($sales as $s)
                <tr>
                    <td scope="row">{{$count ++;}}</td>
                    <td>{{$s->product->product_name}}</td>
                    <td>{{$s->category->title}}</td>
                    <td>{{$s->product->price}}</td>
                    <td>{{$s->qty}} (qty)</td>
                    <td>{{$s->amount}}</td>
                    <td>{{$s->created_at->diffForHumans()}}</td>
                    <td><a href="{{ route('saler-sales-invoice',$s->id)}}" class="btn btn-primary">Print Invoice</a></td>
                    </tr>
                  @endforeach 
                @endif
            </tbody>
            <tfoot>
                <th>S/N</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Actions</th> 
            </tfoot>
    </table>
</div>
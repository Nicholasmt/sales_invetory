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
                        
                    @if($sales->count() == 0 )

                    <td><p class="btn btn-info"> No data Found</p></td>

                            @else

                            
                     @foreach ($sales as $s)
                        <tr>
                           
                            <td scope="row">{{$count ++;}}</td>
                            <td>{{$s->srice}}</td>
                            <td>{{$s->qty}}</td>
                            <td>{{$s->total_value}}</td>
                            <td>{{$s->category->title}}</td>
                            <td>{{$s->created_at->diffForHumans()}}</td>
                             

                          

                        </tr>
                       
                        @endforeach 

                        @endif

                    </tbody>
                </table>
            </div>
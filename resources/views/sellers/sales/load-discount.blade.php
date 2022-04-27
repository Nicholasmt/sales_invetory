             
                     @if($discount->discount_rate == null)

                <label class="btn btn-info space"> No Quantity Discount</label>

                     @else

                   <h5 class="mt-4">Single Product Discount</h5><br>
     
                       <div class="form-group">
                                <label for="exampleInputEmail1"> Product Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$discount->product->price}}" name="product_name" readonly>
                               
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Product Discount Rate</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$discount->discount_rate}}%" name="product_rate" readonly>
                               
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Discount Price</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$discount->discount_per_product}}" name="product_discount_price" readonly>
                               
                            </div>
                            @endif

                            <hr>

                            @if ($discount->qty_price == null)

                            <label class="btn btn-info space"> No Quantity Discount</label>

                             @else

                     <h5 class="mt-4">Quantity Product Discount</h5><br>


                            <div class="form-group">
                                <label for="exampleInputEmail1"> Quantity Discount Rate</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$discount->qty_rate}}%" name="product_qty_rate" readonly>
                               
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Quantity of product</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$discount->product_qty}} (qty)" name="product_qty" readonly>
                               
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Quantity Price</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$discount->qty_price}}" name="product_qty_price" readonly>
                               
                            </div>

                            @endif

                            <style>
                                   
                            </style>
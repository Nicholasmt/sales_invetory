                       
            <h5 class="mt-4">Single Product Discount</h5><br>
     
                       <div class="form-group">
                                <label for="exampleInputEmail1"> Product Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$discount->product->price}}" name="qty">
                               
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Product Discount Rate</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$discount->discount_rate}}" name="qty">
                               
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Discount Price</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$discount->discount_per_product}}" name="qty">
                               
                            </div>

                            <hr>

                     <h5 class="mt-4">Quantity Product Discount</h5><br>


                            <div class="form-group">
                                <label for="exampleInputEmail1"> Quantity Discount Rate</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$discount->qty_rate}}" name="qty">
                               
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> Quantity of product</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$discount->product_qty}}" name="qty">
                               
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"> Quantity Price</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$discount->qty_price}}" name="qty">
                               
                            </div>
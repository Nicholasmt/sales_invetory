<div class="form-group">
  <label for="exampleFormControlSelect1">Select Product</label>
   <select class="form-control" name="product" id="select-product">
     <option disabled selected>Select Product</option>
       @foreach ($product as $p)
        <option value="{{$p->id}}" id="{{$p->id}}">{{$p->product_name}}</option>
       @endforeach
    </select>
</div>
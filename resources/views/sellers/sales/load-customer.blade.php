@if ($customer == null)
<div class="form-group">
  <label for="exampleInputPassword1">Customer's Name</label>
  <input type="text" class="form-control"  placeholder=" Enter Description" name="name">
</div>
 
<div class="form-group">
  <label for="exampleInputPassword1">Customer's Address</label>
  <input type="text" class="form-control"  placeholder=" Enter Description" name="address">
</div>
@else
<div class="form-group">
  <label for="exampleInputPassword1">Customer's Name</label>
  <input type="text" class="form-control" value="{{$customer->name}}" placeholder=" Enter Description" name="name">
</div>
 
<div class="form-group">
   <label for="exampleInputPassword1">Customer's Address</label>
   <input type="text" class="form-control" value="{{$customer->address}}" placeholder=" Enter Description" name="address">
</div>
@endif
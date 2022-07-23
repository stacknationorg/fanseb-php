@extends('layouts.oapp')
@section("title","Cart")
@section('content')
<nav>
</nav>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Add Delivery Address</p>
                
              </div>
            </div>    
<div class="card-body">
<form action="{{route("products.buy.add",$product->id)}}" method="post">
@csrf
            <div class="form-group">
                <label class="form-label" for="country">Country:</label>
                <input id="country" type="text" class="form-control" name="country">
            </div>
            <div class="form-group">
                <label class="form-label" for="state">State:</label>
                <input id="state" type="text" class="form-control" name="state">
            </div>
            <div class="form-group">
                <label class="form-label" for="city">City:</label>
                <input id="city" type="text" class="form-control" name="city">
            </div>
            <div class="form-group">
                <label class="form-label" for="address">Address:</label>
                <input id="address"  type="text" class="form-control" name="address">
            </div>
            <div class="form-group">
                <label class="form-label" for="pin_code">Pin Code:</label>
                <input id="pin_code" type="text" class="form-control" name="pincode" >
            </div>
<button type="submit" class="btn btn-primary">Proceed to Checkout</button>
</form>
</div>
</div> 
</div> 
<div class="col-md-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Your Order</p>
                
              </div>
            </div>    
<div class="card-body">
<span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">House</span>
      <a href="javascript:;" class="card-title h5 d-block text-darker">
        Shared Coworking
      </a>
      <p class="card-description mb-4">
        Use border utilities to quickly style the border and border-radius of an element. Great for images, buttons.
      </p>
      <div class="author align-items-center">
        <img src="./assets/img/kit/pro/team-2.jpg" alt="..." class="avatar shadow">
        <div class="name ps-3">
          <span>Mathew Glock</span>
          <div class="stats">
            <small>Posted on 28 February</small>
          </div>
        </div>
      </div>
</div>
</div> 
</div> 
@endsection
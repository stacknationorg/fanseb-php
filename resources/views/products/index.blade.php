@extends('layouts.oapp')
@section("title","{{$product->title}}")
@section('content')
<nav>
</nav>

<div class="card">
  <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
    <a href="javascript:;" class="d-block">
      <img src="{{asset("assets/products/thumbnail/".$product->thumbnail)}}" class="img-fluid border-radius-lg">
    </a>
  </div>

  <div class="card-body pt-2">
    <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">House</span>
    <a href="javascript:;" class="card-title h5 d-block text-darker">
    {{$product->title}}
    </a>
    <p class="card-description mb-4">
    {{$product->description}}
    </p>
    <div class="author align-items-center">
     
      <div class="name ps-3">
        <span>{{$product->price}}</span>
        <div class="stats">
          <small>{{$product->discountprice}}</small>
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer pt-2">
  @foreach ($product->images as $image)
                                       <div class="col-lg-4">
                                            <img src="{{$image}}" alt="..." class="img-fluid">
                                       </div>
 @endforeach
                                   <video width="320" height="240" autoplay muted>
  <source src="{{asset("assets/products/video/".$product->video)}}" type="video/mp4">
  
</video>
<a href="{{route("products.buy.check",$product->id)}}">Add to Cart</a>
</div>
@endsection
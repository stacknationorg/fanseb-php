@extends('layouts.oapp')
@section("title","Products")
@section('content')
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
           
              <h6>Products List</h6>
              <a href="{{route("creator.products.create")}}" class="btn btn-primary">Add Product </a>
            </div>
            @if($products->count()>0)
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                 <tr>
                  
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> ID</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Title</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Details</th>
            
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($products as $product)
                            <tr>
                                <td>
                                <div class="d-flex flex-column justify-content-center">
                                <h6 class=" text-center mb-0 text-sm">{{$product->id}}</h6>  </td>
                                <td>
                                <div class="d-flex flex-column justify-content-center">
                                <h6 class=" text-center mb-0 text-sm">{{$product->title}}</h6> </td>
                                <td> <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-center mb-0 text-sm">{{$product->description}}</h6> </td>
                                
                                <td> <div class="text-center d-flex flex-column justify-content-center">
                               Check Now </td>
                                
                            </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            @else
                <p class="text-dark">No products found</p>
            @endif
          </div>
        </div>
      </div>


@endsection
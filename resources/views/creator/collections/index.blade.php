@extends('layouts.oapp')
@section('content')
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4"> 
            <div class="card-header pb-0">
           
              <h6>Collections List</h6>
              <a href="{{route("creator.collections.create")}}" class="btn btn-primary">Add Collection </a>
            </div>

            @if($collections->count()>0)
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
                  @foreach ($collections as $collection)
                            <tr>
                                <td>
                                <div class="d-flex flex-column justify-content-center">
                                <h6 class=" text-center mb-0 text-sm">{{$collection->id}}</h6>  </td>
                                <td>
                                <div class="d-flex flex-column justify-content-center">
                                <h6 class=" text-center mb-0 text-sm">{{$collection->title}}</h6> </td>
                                <td> <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-center mb-0 text-sm">{{$collection->thumbnail}}</h6> </td>
                                
                                <td> <div class="text-center d-flex flex-column justify-content-center">
                                </td>
                                
                            </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            @else
                <p class="text-dark">No collections found</p>
            @endif
          </div>
        </div>
      </div>


@endsection
@extends('layouts.oapp')
@section("title","Pebbles")
@section('content')
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
           
              <h6>Pebbles List</h6>
              <a href="{{route("creator.pebbles.create")}}" class="btn btn-primary">Add Pebble </a>
            </div>
            @if($pebbles->count()>0)
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                 <tr>
                  
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> ID</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Title</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Video</th>
            
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($pebbles as $pebble)
                            <tr>
                                <td>
                                <div class="d-flex flex-column justify-content-center">
                                <h6 class=" text-center mb-0 text-sm">{{$pebble->id}}</h6>  </td>
                                <td>
                                <div class="d-flex flex-column justify-content-center">
                                <h6 class=" text-center mb-0 text-sm">{{$pebble->title}}</h6> </td>
                                <td> <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-center mb-0 text-sm">{{$pebble->description}}</h6> </td>
                                
                                <td> <div class="text-center d-flex flex-column justify-content-center">
                                {{$pebble->video}}</td>
                                
                            </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            @else
                <p class="text-dark">No pebbles found</p>
            @endif
          </div>
        </div>
      </div>


@endsection
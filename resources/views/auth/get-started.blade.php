@extends('layouts.auths')
@section("title","Get started")
@section('content')
<div class="pt-32pt pt-sm-64pt pb-32pt">
    <div class="container page__container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 mb-3">
                <a href="{{route("register","User")}}" class="btn btn-primary btn-block">User</a>
            </div>
            <div class="col-md-8 mb-3">
                <a href="{{route("register","Creator")}}" class="btn btn-primary btn-block">Creator</a>
            </div>
            <div class="col-md-8 mb-3">
                <a href="{{route("register","Brand")}}" class="btn btn-primary btn-block">Brand</a>
            </div>
            
        </div>
    </div>
</div>
@endsection
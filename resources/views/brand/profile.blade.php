@extends('layouts.app')
@section("title","Brand Profile")
@section('content')

<div class="card shadow-lg mx-4 card-profile-bottom">
      <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="{{asset("assets/users/photo/".(Auth::user()->photo??"default.png"))}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
              {{Auth::user()->name}}
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
              {{Auth::user()->description}}
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center " data-bs-toggle="tab" role="tab" aria-selected="true">
                    <i class="fa fa-facebook-official"></i>
                    <span class="ms-2">{{$user->fb_count}}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" role="tab" aria-selected="false">
                    <i class="fa fa-instagram"></i>
                    <span class="ms-2">{{$user->ig_count}}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" role="tab" aria-selected="false">
                    <i class="fa fa-youtube"></i>
                    <span class="ms-2">{{$user->yt_count}}</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
</div>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Edit Profile</p>
                <a href="{{route("brand.view",[$user->id,md5($user->name)])}}" class="btn btn-primary btn-sm ms-auto">View Profile</a>
              </div>
            </div>    
<div class=card-body">
    
        <form method="POST" action="{{ route('brand.profile') }}" class="col-md-10 p-0 mx-auto" enctype="multipart/form-data">
            <img src="{{asset("assets/users/photo/".($user->photo??"default.png"))}}" height="100px" width="100px" alt="photo" class="mb-3 rounded">
            @csrf
            <div class="form-group">
                <label class="form-label" for="photo">Brand Logo:</label>
                <input id="photo" value="{{$user->photo}}" type="file" class="form-control" name="photo">
            </div>
            <div class="form-group">
                <label class="form-label" for="name">Brand Name:</label>
                <input id="name" value="{{$user->name}}" type="text" class="form-control" name="name" required placeholder="Your name ...">
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Email:</label>
                <input id="email" value="{{$user->email}}" type="email" class="form-control" name="email" required placeholder="Your email address ...">
            </div>
            <div class="form-group">
                <label class="form-label" for="mobile">Mobile Number:</label>
                <input id="mobile" value="{{$user->mobile}}" type="tel" class="form-control" name="mobile" required placeholder="Your mobile number ...">
            </div>
            <div class="form-group">
                <label class="form-label" for="description">About Brand:</label>
                <input id="description" value="{{$user->description}}" type="text" class="form-control" name="description" required placeholder="About Brand ...">
                
            </div>
            <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Contact Information</p>
            <div class="form-group">
                <label class="form-label" for="country">Country:</label>
                <input id="country" value="{{$user->country}}" type="text" class="form-control" name="country">
            </div>
            <div class="form-group">
                <label class="form-label" for="state">State:</label>
                <input id="state" value="{{$user->state}}" type="text" class="form-control" name="state">
            </div>
            <div class="form-group">
                <label class="form-label" for="city">City:</label>
                <input id="city" value="{{$user->city}}" type="text" class="form-control" name="city">
            </div>
            <div class="form-group">
                <label class="form-label" for="address">Office Address:</label>
                <input id="address" value="{{$user->address}}" type="text" class="form-control" name="address">
            </div>
            <div class="form-group">
                <label class="form-label" for="pin_code">Pin Code:</label>
                <input id="pin_code" value="{{$user->pin_code}}" type="text" class="form-control" name="pin_code" >
            </div>
            <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Social Information</p>
              <div class="form-group">
                <label class="form-label" for="country">Facebook:</label>
                <input id="facebook" value="{{$user->facebook}}" type="text" class="form-control" name="facebook">
            </div>
            <div class="form-group">
                <label class="form-label" for="pin_code">Facebook Count:</label>
                <input id="fb_count" value="{{$user->fb_count}}" type="text" class="form-control" name="fb_count" >
            </div>
            <div class="form-group">
                <label class="form-label" for="state">Twitter:</label>
                <input id="twitter" value="{{$user->twitter}}" type="text" class="form-control" name="twitter">
            </div>
            <div class="form-group">
                <label class="form-label" for="pin_code">Twitter Count:</label>
                <input id="t_count" value="{{$user->t_count}}" type="text" class="form-control" name="t_count" >
            </div>
            <div class="form-group">
                <label class="form-label" for="city">Youtube:</label>
                <input id="youtube" value="{{$user->youtube}}" type="text" class="form-control" name="youtube">
            </div>
            <div class="form-group">
                <label class="form-label" for="pin_code">Youtube Count:</label>
                <input id="yt_count" value="{{$user->yt_count}}" type="text" class="form-control" name="yt_count" >
            </div>
            <div class="form-group">
                <label class="form-label" for="address">Instagram:</label>
                <input id="instagram" value="{{$user->instagram}}" type="text" class="form-control" name="instagram">
            </div>
            <div class="form-group">
                <label class="form-label" for="pin_code">Instagram Count:</label>
                <input id="ig_count" value="{{$user->ig_count}}" type="text" class="form-control" name="ig_count" >
            </div>

            <div>
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
<script>
ClassicEditor
    .create( document.querySelector( '#description' ) )
    .catch( error => {
        console.error( error );
    });
</script>
@endsection
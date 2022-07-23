@extends('layouts.app')
@section("title","Edit Product")
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
                    <span class="ms-2">{{Auth::user()->fb_count}}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" role="tab" aria-selected="false">
                    <i class="fa fa-instagram"></i>
                    <span class="ms-2">{{Auth::user()->ig_count}}</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" role="tab" aria-selected="false">
                    <i class="fa fa-youtube"></i>
                    <span class="ms-2">{{Auth::user()->yt_count}}</span>
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
                <p class="mb-0">Edit Product</p>
               
              </div>
            </div>    
<div class=card-body">
    <div>&nbsp;</div>

        <form method="POST" action="{{ route('brand.products.edit') }}" onsubmit="checkImages(event)" class="col-md-10 p-0 mx-auto" enctype="multipart/form-data">
           
            @csrf
            <div class="form-group">
                <label class="form-label" for="title">Product Name:</label>
                <input id="title"  type="text" class="form-control" name="title" placeholder="Product Title ...">
            </div>
            <div class="form-group">
                <label class="form-label" for="description">Product Description:</label>
                <textarea id="description" type="text" class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">
                <label class="form-label" for="thumbnail">Product Thumbnail:</label>
                <input id="thumbnail" type="file" accept=".png,.jpeg,.jpg" class="form-control" name="thumbnail">
            </div>
            <div class="form-group">
                <label class="form-label" for="price">Price:</label>
                <input id="price" type="text" class="form-control" name="price" placeholder="Price ...">
            </div>
            <div class="form-group">
                <label class="form-label" for="discountprice">Discounted Price:</label>
                <input id="discountprice" type="text" class="form-control" name="discountprice" placeholder="Discounted Price ...">
                
            </div>
            <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Product Information</p>
             
            <div class="form-group">
                <label class="form-label" for="availability">Availability:</label>
                <input id="availability" type="text" class="form-control" name="availability">
            </div>
            
            
            <div class="form-group">
                <label class="form-label" for="specifications">Specification:</label>
                <textarea id="specifications" class="form-control" name="specifications"></textarea>
            </div>
            
            <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Product Gallery</p>
              <div class="form-group">
                <label class="form-label" for="images[]">Images:</label>
                <div id="image">
                <input id="images" type="file" accept=".png,.jpeg,.jpg" multiple class="form-control" name="images[]">
                </div>
               
            </div>
            <div class="form-group">
                <label class="form-label" for="video">Video:</label>
                <input id="video" type="file" accept=".mp4,.webp,.3gp,.mvi" class="form-control" name="video" >
                
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
<script src="{{asset("assets/new/assets/js/jquery-3.5.1.min.js")}}"></script>


<script>

ClassicEditor
    .create( document.querySelector( '#specifications' ) )
    .catch( error => {
        console.error( error );
    });

    function checkImages(e){
        var $fileUpload = $("#images");
        if (parseInt($fileUpload.get(0).files.length)>4){
            e.preventDefault()
            alert("You can only upload a maximum of 4 files");
            return false;
        }
        else{
            return true;
        }
    }
  

</script>

@endsection
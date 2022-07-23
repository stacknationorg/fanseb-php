@extends('layouts.oapp')
@section("title","Brand Profile")
@section('content')
<div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="row">
                                      
                                </div><!--end row-->                                                              
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
<div class="row">
                        <div class="col-9">
                            <div class="card">
                                                            
                                <div class="card-body">
                                    <div class="profile">
                                        <div class="row">
                                            <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                                <div class="dastyle-profile-main">
                                                    <div class="dastyle-profile-main-pic">
                                                        <img src="{{asset("assets/users/photo/".($user->photo??"default.png"))}}" alt="" height="110" class="rounded-circle">
                                                        
                                                    </div>
                                                    <div class="dastyle-profile_user-detail">
                                                        <h5 class="dastyle-user-name">{{$user->name}}</h5>                                                        
                                                        <p class="mb-0 dastyle-user-name-post">{{$user->description}}</p>                                                        
                                                    </div>
                                                </div>                                                
                                            </div><!--end col-->
                                            
                                            
                                            <div class="col-lg-8 align-self-center">
                                                <div class="row">
                                                    <div class="col-auto text-right border-right">
                                                        <button type="button" class="btn btn-soft-primary btn-icon-circle-sm mb-2">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </button>
                                                        <p class="mb-0 font-weight-semibold">Facebook</p>
                                                        <h4 class="m-0 font-weight-bold">{{$user->fb_count}} <span class="text-muted font-12 font-weight-normal">Followers</span></h4>
                                                    </div><!--end col-->
                                                    <div class="col-auto text-right border-right">
                                                        <button type="button" class="btn btn-soft-info btn-icon-circle-sm mb-2">
                                                            <i class="fab fa-instagram"></i>
                                                        </button>
                                                        <p class="mb-0 font-weight-semibold">Twitter</p>
                                                        <h4 class="m-0 font-weight-bold">{{$user->ig_count}} <span class="text-muted font-12 font-weight-normal">Followers</span></h4>
                                                    </div><!--end col-->
                                                    <div class="col-auto text-right border-right">
                                                        <button type="button" class="btn btn-soft-info btn-icon-circle-sm mb-2">
                                                            <i class="fab fa-youtube"></i>
                                                        </button>
                                                        <p class="mb-0 font-weight-semibold">Youtube</p>
                                                        <h4 class="m-0 font-weight-bold">{{$user->yt_count}} <span class="text-muted font-12 font-weight-normal">Followers</span></h4>
                                                    </div>
                                                    <div class="col-auto text-right">
                                                    <button type="button" class="btn btn-primary mb-2">
                                                            Follow
                                                        </button>
                                                    </div>
                                                </div><!--end row-->                                               
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div><!--end f_profile-->                                                                                
                                </div><!--end card-body-->          
                            </div> <!--end card-->    
                        </div><!--end col-->
                    </div>

                    
                    <div class="row">
                        <div class="col-9">
                        <div class="text-center">
                        <h4 class="page-title">Products</h4>
                                    </div>
                       
                                @if($products->count()===0)
                    <p>No product found</p>
                    @else
                                    <div class="row">
                                    
                                    @foreach ($products as $product)
                                    <div class="col-md-3">
                                      <div class="card">
                                        <div class="card-body">
                                      <div class="ribbon4 rib4-primary">
                                        <span class="ribbon4-band ribbon4-band-primary text-white text-center"> {{$product->owner->name}}</span>                                        
                                      </div><!--end ribbon-->                                    
                                        <img src="{{asset("assets/products/thumbnail/".$product->thumbnail)}}" alt="" class="d-block mx-auto my-4" width="150">
                                        <div class="row my-4">
                                        <div class="col">
                                        <a href="{{route("products.view",[$product->id,md5($product->title)])}}" class="title-text d-block"><h3> {{$product->title}} </h3></a>
                                        <h4 class="text-dark mt-0"> ₹ {{$product->discountprice}} <small class="text-muted font-14"><del>₹ {{$product->price}}</del></small></h4>  
                                           </div>
                                        <div class="col-auto">
                                        <span class="text-white text-center rib1-primary"></span>
                                            
                                        </div>      
                                        </div> 
                                    <button class="btn btn-soft-primary btn-block">Add To Cart</button>      
                                    </div>
                                    </div>
                                  </div>
                                  @endforeach
                                 
                                  
                                                     
                                  </div>
                                  
                                  @endif
                                </div>
                              </div>
                            </div>
                            <footer class="footer text-center text-sm-left">
                    &copy; 2022 Fanseb.
                </footer><!--end footer-->


@endsection
@extends('layout.master')
@section('style')
    <link rel="stylesheet" href="{{url('asset/css/product.css')}}">
@endsection
@section('title','Product')
@section('content')
<div class="container-fluid content">
    <div class="row">
        <div class="col-12 back">
            <p class="text-gray">{{$product->subcategory->category->subject->name}} > {{$product->subcategory->category->name}} > {{$product->subcategory->name}} > {{$product->title}}</p>
            <a href="#"><p><span>&#8249;</span> Back to results</p></a>
        </div>

        <div class="d-none d-lg-block col-lg-6 col-xxl-5">
            <div class="container-fluid">
                <div class="row">
                    @php
                        $count=0;
                    @endphp
                    @foreach($images as $image)
                        @php
                            $count++;
                        @endphp
                        @if($count==1)
                            <div class="col-lg-12 col-xl-9 order-xl-1 product_image">
                                <img src="{{asset('storage/'.substr($image->file,7))}}" alt="img">
                            </div>
                            <div class="col-lg-12 col-xl-3 order-xl-0 offset-0 d-flex flex-wrap flex-lg-row justify-content-evenly align-content-start images">
                        @endif
                        <div class="image">
                            <img src="{{asset('storage/'.substr($image->file,7))}}" alt="img">
                        </div>
                    @endforeach
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xxl-7">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-xxl-8 order-xxl-first full_name">
                        <p><span>{{$product->title}}</span> {{$product->full_name}}</p>
                        <div class="d-flex flex-row align-content-center rate">
                            <input type="hidden" id="productId" value="{{$product->id}}">
                            <input type="hidden" id="rate" value="{{$rate}}">
                        @auth
                                <input type="hidden" id="userId" value="{{Auth::user()->id}}">
                            @else
                                <input type="hidden" id="userId" value="0">
                            @endauth
                            <div class="stars">
                                <i id="star1" class="fas fa-star"></i>
                                <i id="star2" class="fas fa-star"></i>
                                <i id="star3" class="fas fa-star"></i>
                                <i id="star4" class="fas fa-star"></i>
                                <i id="star5" class="fas fa-star"></i>
                            </div>
                            &nbsp;<p> 3 of 5 | 55 Rates</p>
                        </div>
                        <hr>
                    </div>
                    @php
                        $count=0;
                    @endphp
                    @foreach($images as $image)
                        @php
                            $count++;
                        @endphp
                        @if($count==1)
                            <div class="col-12 d-lg-none product_image">
                                <img src="{{asset('storage/'.substr($image->file,7))}}" alt="img">
                            </div>
                            <div class="col-12 d-lg-none offset-0 d-flex flex-wrap justify-content-evenly align-content-around images">
                        @endif
                            <div class="image">
                                <img src="{{asset('storage/'.substr($image->file,7))}}" alt="img">
                            </div>
                    @endforeach
                    </div>
                    <div class="col-12 col-xxl-4 offset-0 order-xxl-0 mt-lg-1 mb-lg-1 mt-xl-0 mb-xl-0 align-self-center shop">
                        <h2>${{$product->price}}</h2>
                        <i class="fas fa-map-marker-alt">&nbsp;</i><span>Deliver To :</span> Iran , Tehran , khazaneh Bokharei
                        <div class="d-flex justify-content-evenly mt-3">
                            <a class="text-decoration-none add-product-to-basket cartBtn{{$product->id}} @auth{{\App\Helpers\AppHelper::instance()->is_cart2($product->id,auth()->id())}} @endauth"
                               @auth onclick="tocartPr({{auth()->id()}},{{$product->id}})" @endauth href="#">Buy</a>
                            <a class="text-decoration-none add-product-to-favourites favouriteBtn{{$product->id}} @auth{{\App\Helpers\AppHelper::instance()->is_favourite2($product->id,auth()->id())}} @endauth"
                               @auth onclick="favouritePr({{auth()->id()}},{{$product->id}})" @endauth href="#">Like</a>
                        </div>
                    </div>
                    <div class="col-12 col-xxl-10 p-3">
                        <h4>Details</h4>
                    </div>
                    <div class="col-6 col-xxl-4 ps-4 details">
                        @foreach ($details as $detail)
                        <h6 class="text-secondary">{{$detail->key}}</h6>
                        @endforeach
                    </div>
                    <div class="col-6 col-xxl-4 details">
                        @foreach ($details as $detail)
                        <h6 class="text-dark">{{$detail->value}}</h6>
                        @endforeach
                    </div>
                    <div class="col-12 col-xxl-8 p-3">
                        <hr class="line">
                        <h5>About this item</h5>
                        <ul>
                            @foreach($abouts as $about)
                                    <li><p>{{$about->text}}</p></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="{{url('/asset/js/product_page.js')}}"></script>
@endsection

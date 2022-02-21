@extends('layout.master')
@section('style')
    <link rel="stylesheet" href="{{url('asset/css/result.css')}}">
@endsection
@section('title','Results')
@section('content')
    <div class="container-fluid">
    <div class="row">
        <div class="col-12 result-count">
            <p class="d-inline-block mb-0">1-30 of over 4,000 results</p>
        </div>
        <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xxl-2 all-filter">
            <div class="filters">
                <p>Filters<span>(2)</span></p>
                <a href="#">Clear all</a>
            </div>
            <div class="filter align-items-center">
                <div class="filter-title">
                    <p>Brands</p>
                    <i class="me-2 bi bi-caret-up-fill"></i>
                </div>
                <ul>
                    <li><a href="#">Apple</a></li>
                    <li class="selected-filter-li"><a class="selected-filter-link" href="#">Motorola</a></li>
                    <li><a href="#">Samsung Electronics</a></li>
                    <li><a href="#">TracFone</a></li>
                    <li><a href="#">Nokia</a></li>
                    <li><a href="#">ONEPLUS</a></li>
                    <li><a href="#">Huawei</a></li>
                </ul>
            </div>
            <div class="filter align-items-center">
                <div class="filter-title">
                    <p>Price & Deals</p>
                    <i class="me-2 bi bi-caret-up-fill"></i>
                </div>
                <ul>
                    <li class="selected-filter-li"><a class="selected-filter-link" href="#">All Prices</a></li>
                    <li><a href="#">Up to $50</a></li>
                    <li><a href="#">$50 to $100</a></li>
                    <li><a href="#">$100 to $150</a></li>
                    <li><a href="#">$150 to $250</a></li>
                    <li><a href="#">$250 to $400</a></li>
                    <li><a href="#">$400 to $600</a></li>
                    <li><a href="#">$600 & above</a></li>
                </ul>
            </div>
            <div class="filter align-items-center">
                <div class="filter-title">
                    <p>Cellular Technology</p>
                    <i class="me-2 bi bi-caret-up-fill"></i>
                </div>
                <ul>
                    <li class="selected-filter-li"><a class="selected-filter-link" href="#">2G</a></li>
                    <li><a href="#">3G</a></li>
                    <li><a href="#">4G</a></li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-sm-7 col-md-8 col-lg-9 col-xxl-10">
            <div class="container-fluid p-5">
                <div class="row">
                    @foreach($product as $pro)
                        <div class="col-12 col-md-6 col-lg-4 col-xxl-3 search_result position-relative">
                            <div class="p-0 mt-3 result_image_wrapper">
                                <a href="/product/{{$pro->product_id}}" class="product-link">
                                    <img src="{{asset('storage/'.substr($pro->file,7))}}" alt="img">
                                </a>
                            </div>
                            <a href="/product/{{$pro->product_id}}" class="product-link">
                                <p class="name_rate">{{$pro->title}}</p>
                            </a>
                            <div class="d-flex flex-row justify-content-center align-content-center rate">
                                <div class="stars d-flex justify-content-center align-items-center">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <a href="#" class="product-link">
                                <h2 class="price-result d-flex justify-content-center align-items-center">${{$pro->price}}</h2>
                            </a>
                            <div @auth onclick="tocart({{auth()->id()}},{{$pro->product_id}})" @endauth
                            class="@auth cartBtn{{$pro->product_id}} {{\App\Helpers\AppHelper::instance()->is_cart($pro->product_id,auth()->id()) }} @endauth add-to-cart-btn">
                                <i class="bi bi-cart"></i>
                            </div>

                            <div @auth onclick="favourite({{auth()->id()}},{{$pro->product_id}})" @endauth
                            class="@auth favouriteBtn{{$pro->product_id}} {{\App\Helpers\AppHelper::instance()->is_favourite($pro->product_id,auth()->id()) }} @endauth add-to-favorite-btn">
                                <i class="bi bi-heart"></i>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12 paggination">
                        <ul class="d-flex justify-content-center align-items-center flex-wrap">
                            <li><a href="#">Previous</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <div class="d-flex justify-content-center align-items-center"><p class=" fs-3 p-0 mb-3">...</p></div>
                            <li><a href="#">11</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layout.master')
@section('style')
    <link rel="stylesheet" href="{{url('asset/css/index.css')}}">
    <link rel="stylesheet" href="{{url('asset/css/category.css')}}">
@endsection
@section('title','Category')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xxl-2 categories">
                @foreach($sub_categories as $sub_category)
                    <h3>{{$sub_category->name}}</h3>
                    <ul>
                        <li><a href="#">{{$sub_category->name}}</a></li>
                    </ul>
                @endforeach
            </div>
            <div class="col-12 col-sm-7 col-md-8 col-lg-9 col-xxl-10">
                <div class="container-fluid p-3">
                    <div class="row">
                        <div class="col-12 mt-5 top_products">
                            <h2>Top Sale's</h2>
                            <div class="top_products_holder d-flex justify-content-between">
                                <div class="top-products-1-left">
                                    <i class="fs-1 bi bi-caret-left-fill"></i>
                                </div>
                                <div class="container-fluid">
                                    <div class="row justify-content-evenly">
                                        @php($count=0)
                                        @foreach($top_sales as $sale)
                                        @php($count++)
                                        @switch($count)
                                            @case(1)
                                                <div class="col-12 col-lg-5 col-xl-4 col-xxl-3 top_product-holder d-flex flex-column justify-content-center align-items-center">
                                            @break
                                            @case(2)
                                                <div class="col-12 col-lg-5 col-xl-4 col-xxl-3 top_product-holder d-none d-lg-flex flex-column justify-content-center align-items-center">
                                            @break
                                            @case(3)
                                                <div class="col-12 col-xl-4 col-xxl-3 top_product-holder d-none d-xl-flex flex-column justify-content-center align-items-center">
                                            @break
                                            @case(4)
                                                <div class="col-12 col-xxl-3 top_product-holder d-none d-xxl-flex flex-column justify-content-center align-items-center">
                                            @break
                                        @endswitch
                                        <div class="top_products_img">
                                            <a class='text-decoration-none' href="/product/{{$sale->product_id}}">
                                                <img src="{{asset('storage/'.substr($sale->file,7))}}" alt="12">
                                            </a>
                                        </div>
                                        <a class='text-decoration-none' href="/product/{{$sale->product_id}}">
                                            <p class="m-1 p-0 top-product-title">{{$sale->title}}</p>
                                        </a>
                                        <p class="top-product-price">${{$sale->price}}</p>

                                        <div @auth onclick="tocart({{auth()->id()}},{{$sale->product_id}})" @endauth
                                        class="@auth cartBtn{{$sale->product_id}} {{\App\Helpers\AppHelper::instance()->is_cart($sale->product_id,auth()->id()) }} @endauth add-to-cart-btn">
                                            <i class="bi bi-cart"></i>
                                        </div>

                                        <div @auth onclick="favourite({{auth()->id()}},{{$sale->product_id}})" @endauth
                                        class="@auth favouriteBtn{{$sale->product_id}} {{\App\Helpers\AppHelper::instance()->is_favourite($sale->product_id,auth()->id()) }} @endauth add-to-favorite-btn">
                                            <i class="bi bi-heart"></i>
                                        </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="top-products-1-right">
                                    <i class="fs-1 bi bi-caret-right-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3 top_products">
                            <h2>Top Rated Products</h2>
                            <div class="top_products_holder d-flex justify-content-between">
                                <div class="top-products-1-left">
                                    <i class="fs-1 bi bi-caret-left-fill"></i>
                                </div>
                                <div class="container-fluid">
                                    <div class="row justify-content-evenly">
                                        @php($count=0)
                                        @foreach($top_rates as $sale)
                                        @php($count++)
                                        @switch($count)
                                            @case(1)
                                                <div class="col-12 col-lg-5 col-xl-4 col-xxl-3 top_product-holder d-flex flex-column justify-content-center align-items-center">
                                                @break
                                            @case(2)
                                                <div class="col-12 col-lg-5 col-xl-4 col-xxl-3 top_product-holder d-none d-lg-flex flex-column justify-content-center align-items-center">
                                                @break
                                            @case(3)
                                                <div class="col-12 col-xl-4 col-xxl-3 top_product-holder d-none d-xl-flex flex-column justify-content-center align-items-center">
                                                @break
                                            @case(4)
                                                <div class="col-12 col-xxl-3 top_product-holder d-none d-xxl-flex flex-column justify-content-center align-items-center">
                                                @break
                                        @endswitch
                                        <div class="top_products_img">
                                            <a class='text-decoration-none' href="/product/{{$sale->product_id}}">
                                                <img src="{{asset('storage/'.substr($sale->file,7))}}" alt="12">
                                            </a>
                                        </div>
                                        <a class='text-decoration-none' href="/product/{{$sale->product_id}}">
                                            <p class="m-1 p-0 top-product-title">{{$sale->title}}</p>
                                        </a>
                                        <p class="top-product-price">${{$sale->price}}</p>

                                        <div @auth onclick="tocart({{auth()->id()}},{{$sale->product_id}})" @endauth
                                        class="@auth cartBtn{{$sale->product_id}} {{\App\Helpers\AppHelper::instance()->is_cart($sale->product_id,auth()->id()) }} @endauth add-to-cart-btn">
                                            <i class="bi bi-cart"></i>
                                        </div>

                                        <div @auth onclick="favourite({{auth()->id()}},{{$sale->product_id}})" @endauth
                                        class="@auth favouriteBtn{{$sale->product_id}} {{\App\Helpers\AppHelper::instance()->is_favourite($sale->product_id,auth()->id()) }} @endauth add-to-favorite-btn">
                                            <i class="bi bi-heart"></i>
                                        </div>
                                    </div>
                                    @endforeach
                                    </div>
                                </div>
                                <div class="top-products-1-right">
                                    <i class="fs-1 bi bi-caret-right-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3 top_products">
                            <h2>Most Favourite</h2>
                            <div class="top_products_holder d-flex justify-content-between">
                                <div class="top-products-1-left">
                                    <i class="fs-1 bi bi-caret-left-fill"></i>
                                </div>
                                <div class="container-fluid">
                                    <div class="row justify-content-evenly">
                                        @php($count=0)
                                        @foreach($top_favs as $sale)
                                        @php($count++)
                                        @switch($count)
                                            @case(1)
                                                <div class="col-12 col-lg-5 col-xl-4 col-xxl-3 top_product-holder d-flex flex-column justify-content-center align-items-center">
                                                @break
                                            @case(2)
                                                <div class="col-12 col-lg-5 col-xl-4 col-xxl-3 top_product-holder d-none d-lg-flex flex-column justify-content-center align-items-center">
                                                @break
                                            @case(3)
                                                <div class="col-12 col-xl-4 col-xxl-3 top_product-holder d-none d-xl-flex flex-column justify-content-center align-items-center">
                                                @break
                                            @case(4)
                                                <div class="col-12 col-xxl-3 top_product-holder d-none d-xxl-flex flex-column justify-content-center align-items-center">
                                                @break
                                        @endswitch
                                        <div class="top_products_img">
                                            <a class='text-decoration-none' href="/product/{{$sale->product_id}}">
                                                <img src="{{asset('storage/'.substr($sale->file,7))}}" alt="12">
                                            </a>
                                        </div>
                                        <a class='text-decoration-none' href="/product/{{$sale->product_id}}">
                                            <p class="m-1 p-0 top-product-title">{{$sale->title}}</p>
                                        </a>
                                        <p class="top-product-price">${{$sale->price}}</p>

                                        <div @auth onclick="tocart({{auth()->id()}},{{$sale->product_id}})" @endauth
                                        class="@auth cartBtn{{$sale->product_id}} {{\App\Helpers\AppHelper::instance()->is_cart($sale->product_id,auth()->id()) }} @endauth add-to-cart-btn">
                                            <i class="bi bi-cart"></i>
                                        </div>

                                        <div @auth onclick="favourite({{auth()->id()}},{{$sale->product_id}})" @endauth
                                        class="@auth favouriteBtn{{$sale->product_id}} {{\App\Helpers\AppHelper::instance()->is_favourite($sale->product_id,auth()->id()) }} @endauth add-to-favorite-btn">
                                            <i class="bi bi-heart"></i>
                                        </div>
                                    </div>
                                    @endforeach
                                    </div>
                                </div>
                                <div class="top-products-1-right">
                                    <i class="fs-1 bi bi-caret-right-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

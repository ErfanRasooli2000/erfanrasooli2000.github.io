@extends('layout.master')
@section('style')
    <link rel="stylesheet" href="{{url('asset/css/index.css')}}">
@endsection
@section('title','Online Shop')
@section('content')
    <div class="slider_main_page d-none d-lg-block">
        <div id="slide-left" class="slide-left">
            <i class="bi bi-caret-left-fill"></i>
        </div>
        <div id="slide-right" class="slide-right">
            <i class="bi bi-caret-right-fill"></i>
        </div>
        <div id="slider-holder" class="slider_img_holder">
            <img src="{{url('asset/images/slide1.jpg')}}" alt="slider"><img src="{{url('asset/images/slide2.jpg')}}" alt="slider"><img src="{{url('asset/images/slide3.jpg')}}" alt="slider"><img src="{{url('asset/images/slide4.jpg')}}" alt="slider">
        </div>
    </div>
    <div class="container-fluid">
        <div class="row suggest">
            <div class="col-12 col-md-6 col-lg-4 col-xxl-3 main_categories_box">
                <div class="main_categorie">
                    <h4>Shop by Category</h4>
                    <div class="category_img_holder">
                        <img class="w-100 mt-1" src="{{url('asset/images/category_img.jpg')}}" alt="category">
                    </div>
                    <a class="pt-3 text-decoration-none" href="/category/2">Show Now</a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xxl-3 main_categories_box">
                <div class="main_categorie">
                    <h4>Smartwatches</h4>
                    <div class="category_img_holder">
                        <img class="w-100 mt-1" src="{{url('asset/images/category_img1.jpg')}}" alt="category">
                    </div>
                    <a class="pt-3 text-decoration-none" href="/category/2">Show Now</a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xxl-3 main_categories_box">
                <div class="main_categorie">
                    <h4>Kindle E readers</h4>
                    <div class="category_img_holder">
                        <img class="w-100 mt-1" src="{{url('asset/images/category_img2.jpg')}}" alt="category">
                    </div>
                    <a class="pt-3 text-decoration-none" href="/category/2">Show Now</a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xxl-3 main_categories_box">
                <div class="main_categorie">
                    <h4>New arrivals in Toys</h4>
                    <div class="category_img_holder">
                        <img class="w-100 mt-1" src="{{url('asset/images/category_img3.jpg')}}" alt="category">
                    </div>
                    <a class="pt-3 text-decoration-none" href="/category/2">Show Now</a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xxl-3 main_categories_box">
                <div class="main_categorie">
                    <h4>Computers & Accessories</h4>
                    <div class="category_img_holder">
                        <img class="w-100 mt-1" src="{{url('asset/images/category_img4.jpg')}}" alt="category">
                    </div>
                    <a class="pt-3 text-decoration-none" href="/category/2">Show Now</a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xxl-3 main_categories_box">
                <div class="main_categorie">
                    <h4>For your Fitness Needs</h4>
                    <div class="category_img_holder">
                        <img class="w-100 mt-1" src="{{url('asset/images/category_img5.jpg')}}" alt="category">
                    </div>
                    <a class="pt-3 text-decoration-none" href="/category/2">Show Now</a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xxl-3 main_categories_box">
                <div class="main_categorie">
                    <h4>Shop Laptops & Tablets</h4>
                    <div class="category_img_holder">
                        <img class="w-100 mt-1" src="{{url('asset/images/category_img6.jpg')}}" alt="category">
                    </div>
                    <a class="pt-3 text-decoration-none" href="/category/2">Show Now</a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xxl-3 main_categories_box">
                <div class="main_categorie">
                    <h4>Shop Pet supplies</h4>
                    <div class="category_img_holder">
                        <img class="w-100 mt-1" src="{{url('asset/images/category_img7.jpg')}}" alt="category">
                    </div>
                    <a class="pt-3 text-decoration-none" href="/category/2">Show Now</a>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid top_products mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-5 col-lg-4 col-xxl-3 shadow position-relative top_products_box">
                <img src="{{url('asset/images/img1.jpg')}}" alt="img">
            </div>
            <div class="col-12 col-sm-5 col-lg-7 col-xxl-8 shadow top_products_box">
                <h4 class="top_products_header">Top of the CellPhone and Acsesories</h4>
                <div class="top_products_holder d-flex justify-content-between">
                    <div class="top-products-1-left">
                        <i class="fs-1 bi bi-caret-left-fill"></i>
                    </div>
                    <div class="container-fluid">
                        <div class="row justify-content-evenly">
                            @php $count=0; @endphp
                            @foreach($cellphone as $sale)
                                @php $count++; @endphp
                                @switch($count)
                                    @case(1)
                                        <div class="col-12 col-lg-5 col-xxl-3 top_product-holder d-flex flex-column justify-content-center align-items-center">
                                        @break
                                    @case(2)
                                        <div class="col-12 col-lg-5 col-xxl-3 top_product-holder d-none d-lg-flex flex-column justify-content-center align-items-center">
                                        @break
                                    @case(3)
                                        <div class="col-12 col-xxl-3 top_product-holder d-none d-xxl-flex flex-column justify-content-center align-items-center">
                                        @break
                                @endswitch
                                    <div class="top_products_img">
                                        <img src="{{asset('storage/'.substr($sale->file,7))}}" alt="img">
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
    <div class="container-fluid top_products mt-3">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-5 col-lg-7 col-xxl-8 shadow top_products_box">
                <h4 class="top_products_header">Top of the Laptop and Acssesories</h4>
                <div class="top_products_holder d-flex justify-content-between">
                    <div class="top-products-1-left">
                        <i class="fs-1 bi bi-caret-left-fill"></i>
                    </div>
                    <div class="container-fluid">
                        <div class="row justify-content-evenly">
                            @php $count=0; @endphp
                            @foreach($laptop as $sale)
                                @php $count++; @endphp
                                @switch($count)
                                    @case(1)
                                    <div class="col-12 col-lg-5 col-xxl-3 top_product-holder d-flex flex-column justify-content-center align-items-center">
                                        @break
                                        @case(2)
                                        <div class="col-12 col-lg-5 col-xxl-3 top_product-holder d-none d-lg-flex flex-column justify-content-center align-items-center">
                                            @break
                                            @case(3)
                                            <div class="col-12 col-xxl-3 top_product-holder d-none d-xxl-flex flex-column justify-content-center align-items-center">
                                                @break
                                                @endswitch
                                                <div class="top_products_img">
                                                    <img src="{{asset('storage/'.substr($sale->file,7))}}" alt="img">
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
            <div class="col-12 col-sm-5 col-lg-4 col-xxl-3 shadow position-relative top_products_box">
                <img src="{{url('asset/images/img2.jpg')}}" alt="img">
            </div>
        </div>
    </div>
    <div class="container-fluid top_products mt-3">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-5 col-lg-4 col-xxl-3 shadow position-relative top_products_box">
                <img src="{{url('asset/images/img3.jpg')}}" alt="img">
            </div>
            <div class="col-12 col-sm-5 col-lg-7 col-xxl-8 shadow top_products_box">
                <h4 class="top_products_header">Top of the Diplay's</h4>
                <div class="top_products_holder d-flex justify-content-between">
                    <div class="top-products-1-left">
                        <i class="fs-1 bi bi-caret-left-fill"></i>
                    </div>
                    <div class="container-fluid">
                        <div class="row justify-content-evenly">
                            @php $count=0; @endphp
                            @foreach($display as $sale)
                                @php $count++; @endphp
                                @switch($count)
                                    @case(1)
                                    <div class="col-12 col-lg-5 col-xxl-3 top_product-holder d-flex flex-column justify-content-center align-items-center">
                                        @break
                                        @case(2)
                                        <div class="col-12 col-lg-5 col-xxl-3 top_product-holder d-none d-lg-flex flex-column justify-content-center align-items-center">
                                            @break
                                            @case(3)
                                            <div class="col-12 col-xxl-3 top_product-holder d-none d-xxl-flex flex-column justify-content-center align-items-center">
                                                @break
                                                @endswitch
                                                <div class="top_products_img">
                                                    <img src="{{asset('storage/'.substr($sale->file,7))}}" alt="img">
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
    <div class="container-fluid top_products mt-3">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-5 col-lg-7 col-xxl-8 shadow top_products_box">
                <h4 class="top_products_header">Top of the Speakers And Sounds</h4>
                <div class="top_products_holder d-flex justify-content-between">
                    <div class="top-products-1-left">
                        <i class="fs-1 bi bi-caret-left-fill"></i>
                    </div>
                    <div class="container-fluid">
                        <div class="row justify-content-evenly">
                            @php $count=0; @endphp
                            @foreach($speaker as $sale)
                                @php $count++; @endphp
                                @switch($count)
                                    @case(1)
                                    <div class="col-12 col-lg-5 col-xxl-3 top_product-holder d-flex flex-column justify-content-center align-items-center">
                                        @break
                                        @case(2)
                                        <div class="col-12 col-lg-5 col-xxl-3 top_product-holder d-none d-lg-flex flex-column justify-content-center align-items-center">
                                            @break
                                            @case(3)
                                            <div class="col-12 col-xxl-3 top_product-holder d-none d-xxl-flex flex-column justify-content-center align-items-center">
                                                @break
                                                @endswitch
                                                <div class="top_products_img">
                                                    <img src="{{asset('storage/'.substr($sale->file,7))}}" alt="img">
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
            <div class="col-12 col-sm-5 col-lg-4 col-xxl-3 shadow position-relative top_products_box">
                <img src="{{url('asset/images/img4.jpg')}}" alt="img">
            </div>
        </div>
    </div>

@endsection
@section('javascript')
    <script src="asset/js/index.js"></script>
@endsection

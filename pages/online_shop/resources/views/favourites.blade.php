@extends('layout.master')
@section('style')
    <link rel="stylesheet" href="{{url('asset/css/index.css')}}">
@endsection
@section('title','Shop Cart')
@section('content')
    @if(is_null($favourites))
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12 col-md-4 col-xxl-3 offset-xxl-1 order-1 order-md-0 d-flex justify-content-center align-items-center p-4 bg-white">
                <img class="w-100" src="{{url('asset/images/shop.svg')}}" alt="shop">
            </div>
            <div class="col-12 col-md-8 col-xxl-6 order-0 order-md-1 p-4 bg-white">
                <h2 class="mt-2 empty-shop-header">Your Favourites is empty</h2>
                <a class="shop-today" href="#">Watch today's Products</a>
                <div class="mt-4 d-flex flex-column flex-sm-row justify-content-start align-items-center">
                    <a class="cart-sign-in m-2" href="#">Sign in to your account</a>
                    <a class="cart-sign-up m-2" href="#">Sign up now</a>
                </div>
            </div>
            <div class="d-none d-xxl-inline-block order-xxl-4 col-xxl-3"></div>
        </div>
    </div>
    @else
    <div class="container-fluid my-4">
        <div class="row justify-content-evenly">
            <div class="col-12 col-md-9 bg-white">
                <div class="col-12">
                    <p class="shoping-cart-tilte">Your Favourite Product's</p>
                    <p class="cart-price-title">Current Price</p>
                    <hr>
                </div>
                @foreach($favourites as $product)
                <div class="col-12">
                    <div class="container-fluid">
                    <div class="row shop-cart-products">
                        <div class="col-12 col-sm-4 col-md-3 d-flex flex-row justify-content-center align-items-center favourite_img_holder">
                            <a href="/product/{{$product->product_id}}" class="text-decoration-none m-3 p-2"><img src="{{asset('storage/'.substr($product->file,7))}}" alt="p"></a>
                        </div>
                        <div class="col-11 col-sm-7 col-md-8 mt-4">
                            <a href="/product/{{$product->product_id}}" class="shop-cart-fullname">{{$product->title}} {{$product->full_name}}</a>
                            <p class="shop-cart-lefts">Only {{$product->quantity}} left in stock - order soon. </p>
                            <div class="actions-shop-product">
                                <form method='post' class="p-0 m-0" action="/favourite/{{$product->product_id}}">
                                    @csrf
                                    @method('DELETE')
                                    <input class="m-2 p-0 bg-white border-0 text-primary" type="submit" value="Delete">
                                </form>
                            </div>
                            <a class="@auth{{\App\Helpers\AppHelper::instance()->is_cart3($product->product_id)}}@endauth" id="favouriteaddtocartbtn{{$product->product_id}}" onclick="favouriteAddToCart({{$product->product_id}})" href="#">
                                @auth{{\App\Helpers\AppHelper::instance()->is_cart4($product->product_id)}}@endauth</a>
                        </div>
                        <div class="col-1 mt-4">
                            <h4 class="product-cart-price">${{$product->price}}</h4>
                        </div>
                        <hr>
                    </div>
                </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
@endsection


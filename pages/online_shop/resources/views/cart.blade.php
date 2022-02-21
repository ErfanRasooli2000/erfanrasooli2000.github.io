@extends('layout.master')
@section('style')
    <link rel="stylesheet" href="{{url('asset/css/index.css')}}">
@endsection
@section('title','Shop Cart')
@section('content')
    @if($cart_products==null)
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12 col-md-4 col-xxl-3 offset-xxl-1 order-1 order-md-0 d-flex justify-content-center align-items-center p-4 bg-white">
                <img class="w-100" src="{{url('asset/images/shop.svg')}}" alt="shop">
            </div>
            <div class="col-12 col-md-8 col-xxl-6 order-0 order-md-1 p-4 bg-white">
                <h2 class="mt-2 empty-shop-header">Your Online Shop Cart is empty</h2>
                <a class="shop-today" href="#">Shop today's deals</a>
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
                    <p class="shoping-cart-tilte">Shoping Cart</p>
                    <a href="#" class="shoping-cart-link">Deselect all items</a>
                    <p class="cart-price-title">Price</p>
                    <hr>
                </div>
                @foreach($cart_products as $product)
                <div class="col-12">
                    <div class="container-fluid">
                    <div class="row shop-cart-products">
                        <div class="col-12 col-sm-4 col-md-3 d-flex flex-row justify-content-center align-items-center favourite_img_holder">
                            <input type="checkbox">
                            <img src="{{asset('storage/'.substr($product->file,7))}}" alt="p">
                        </div>
                        <div class="col-11 col-sm-7 col-md-8 mt-4">
                            <a href="/product/{{$product->product_id}}" class="shop-cart-fullname">{{$product->title}} {{$product->full_name}}</a>
                            <p class="shop-cart-lefts">Only {{$product->quantity}} left in stock - order soon. </p>
                            <div class="actions-shop-product">
                                <input type="hidden" class="product-in-cart-id" value="{{$product->product_id}}">
                                <input type="number" class="product-in-cart-count" id="product{{$product->product_id}}" placeholder="Count" value="{{$product->count}}">
                                <form method='post' class="p-0 m-0" action="/cart/{{$product->product_id}}">
                                    @csrf
                                    @method('DELETE')
                                    <input class="m-2 p-0 bg-white border-0 text-primary" type="submit" value="Delete">
                                </form>
                                <a href="#">Save For Later</a>
                            </div>
                        </div>
                        <div class="col-1 mt-4">
                            <input type="hidden" class="product-in-cart-price" value="{{$product->price}}">
                            <h4 class="product-cart-price"></h4>
                        </div>
                        <hr>
                    </div>
                </div>
                </div>
                @endforeach
            </div>
            <div class="col-12 col-md-2 bg-white final-price-cart">
                <p>Subtotal (3 items): <span id="final_price"></span></p>
                <a href="{{route('order.selectAddress')}}">Proceed to checkout</a>
            </div>
        </div>
    </div>
    <script src="{{url('asset/js/cart.js')}}"></script>
    @endif
@endsection


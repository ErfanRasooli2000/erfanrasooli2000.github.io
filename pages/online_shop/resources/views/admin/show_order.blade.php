@extends('layout.admin')
@section('style')
    <link rel="stylesheet" href="{{asset('asset/css/profile.css')}}">
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-evenly">
                <div class="col-12">
                    <div class="content-header">
                        <p>OVERVIEW</p>
                        <h4>Order</h4>
                    </div>
                </div>
                <div class="col-5 add-product">
                    <h3 class="text-center">Finall Bill</h3>
                    <hr>
                    <h6><strong>Final Price: </strong><span class="price-show">${{$price}}</span></h6>
                    <h6 class="mt-3"><strong>Address: </strong>{{$address->country}}, {{$address->city}}, {{$address->address}}</h6>
                    <h6 class="mt-3"><strong>Deliver Time: </strong>{{$order->deliver_time}}</h6>
                    @if($order_state==1)
                        <a class="send-to-client" href="/admin/order/send/{{$order_id}}">Send To Client</a>
                    @elseif($order_state==2)
                        <a class="delivered-to-client" href="/admin/order/deliver/{{$order_id}}">Deliverd To Client</a>
                    @endif
                </div>
                <div class="col-6 offset-1 add-product">
                    @foreach($products as $product)
                        <div class="w-100 address-box d-flex">
                            <div class="img-holder-final-bill">
                                <img src="{{asset('storage/'.substr($product->file,7))}}" alt="p">
                            </div>
                            <div class="d-flex flex-column">
                                <h6><a class="text-decoration-none text-body" href="/product/{{$product->product_id}}">{{$product->title}} {{$product->full_name}}</a></h6>
                                <h6><strong>Unit Price: </strong><span class="price-show">${{$product->price}}</span></h6>
                                <h6><strong>count: </strong><span class="price-show">{{$counts[$product->product_id]}}</span></h6>
                                <h6><strong>Final Price: </strong><span class="price-show">${{(($product->price) * ($counts[$product->product_id]))}}</span></h6>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection

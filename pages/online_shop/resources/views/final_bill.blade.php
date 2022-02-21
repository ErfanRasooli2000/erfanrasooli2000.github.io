@extends('layout.master')
@section('style')
    <link rel="stylesheet" href="{{url('asset/css/profile.css')}}">
@endsection
@section('title','Shop Cart')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-1 mt-5">
                <h3 class="text-center">Finall Bill</h3>
                <hr>
                <h5><strong>Final Price: </strong><span class="price-show">${{$price}}</span></h5>
                <h5 class="mt-3"><strong>Address: </strong>{{$address->country}}, {{$address->city}}, {{$address->address}}</h5>
                <h5 class="mt-3"><strong>Deliver Time: </strong>{{$order->deliver_time}}</h5>

                @foreach($products as $product)
                    <div class="w-100 address-box d-flex">
                        <div class="img-holder-final-bill">
                            <img src="{{asset('storage/'.substr($product->file,7))}}" alt="p">
                        </div>
                        <div class="d-flex flex-column">
                            <h6><a class="text-decoration-none text-body" href="/product/{{$product->product_id}}">{{$product->title}} {{$product->full_name}}</a></h6>
                            <h6><strong>Unit Price: </strong><span class="price-show">${{$product->price}}</span></h6>
                            <h6><strong>count: </strong>{{$counts[$product->product_id]}}</h6>
                            <h6><strong>Final Price: </strong><span class="price-show">${{(($product->price) * ($counts[$product->product_id]))}}</span></h6>
                        </div>
                    </div>
                @endforeach
                <form method="post" action="{{url('shop')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="price" value="2500000">
                    <button class="order-final" type="submit">Pay Zarinpal</button>
                </form>
                <a class="order-final me-4" href="/order/done/{{$order->id}}">Pay</a>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br>
@endsection


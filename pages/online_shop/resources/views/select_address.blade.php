@extends('layout.master')
@section('style')
    <link rel="stylesheet" href="{{url('asset/css/profile.css')}}">
@endsection
@section('title','Shop Cart')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-1 mt-5">
                <form action="{{route('order.create')}}" class="mx-auto" method="post">
                    @csrf
                    <input type="hidden" id="address-id" name="address" value="">
                    <label for="date-input" id="date-input-label">Select The Deliver Date: </label>
                    <input id="date-input" type="date" name="date" min="{{date('Y-m-d',(time()+259200))}}" max="{{date('Y-m-d',(time()+2851200))}}">
                @error('date')
                    <p class="error-alert">{{$errors->first('date')}}</p>
                @enderror
                @php
                    $count=-1;
                @endphp
                @if($addresses->count()==0)
                    <div class="no-address my-4 p-3 text-center border border-3 border-danger">
                        <h5>You Don't Have Address</h5>
                        <a class="text-decoration-none text-primary" href="{{route('addresses.create')}}"><h5>Click Here To Add Address</h5></a>
                    </div>
                @endif
                @foreach($addresses as $address)
                    @php
                        $count++;
                    @endphp
                    <div class="d-flex w-100 flex-row align-content-center address-box" onclick="selectAddress({{$address->id}},{{$count}})">
                        <i class="address-checkBox bi bi-check2-circle"></i>
                        <div class="w-100">
                            <h6><strong>Address: </strong>{{$address->country}} - {{$address->city}} - {{$address->address}}</h6>
                            <div class="d-flex w-100 flex-row justify-content-between mt-3">
                                <p class="p-0 m-0"><strong>Receiver Name: </strong>{{$address->receiver_name}}</p>
                                <p class="p-0 m-0"><strong>Receiver Number: </strong>{{$address->receiver_phone}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                    @error('address')
                    <p class="error-alert">{{$errors->first('address')}}</p>
                    @enderror
                    <input type="submit" class="buy-button-final" name="submit" value="Buy">
                </form>
            </div>
            <div class="col-6 offset-1">

            </div>
        </div>
    </div>
    <script src="{{url('asset/js/address.js')}}"></script>
@endsection

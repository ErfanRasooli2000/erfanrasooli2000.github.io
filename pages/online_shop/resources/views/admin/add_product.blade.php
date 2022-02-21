@extends('layout.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-evenly">
                <div class="col-12">
                    <div class="content-header">
                        <p>OVERVIEW</p>
                        <h4>Add Product</h4>
                    </div>
                </div>
                <div class="col-6 add-product">
                    <form action="{{route('product.store')}}" method="post">
                        @csrf
                        <div class="d-flex flex-row align-items-center mt-0 mb-3">
                            <input type="text" required name="title" value="{{old('title')}}" placeholder="Title">
                            @error('title')
                            <p class="alert-red">{{$errors->first('title')}}</p>
                            @enderror
                        </div>
                        <div class="d-flex flex-row align-items-center my-3">
                            <input type="text" required name="full_name" value="{{old('full_name')}}" placeholder="Name">
                            @error('full_name')
                                <p class="alert-red">{{$errors->first('full_name')}}</p>
                            @enderror
                        </div>
                        <div class="d-flex flex-row align-items-center my-3">
                            <input type="number"  required name="quantity" value="{{old('quantity')}}" placeholder="Quantity">
                            @error('quantity')
                            <p class="alert-red">{{$errors->first('quantity')}}</p>
                            @enderror
                        </div>
                        <div class="d-flex flex-row align-items-center my-3">
                            <input type="number" id="price" required name="price" value="{{old('price')}}" placeholder="Price (Dollar)">
                            @error('price')
                                <p class="alert-red">{{$errors->first('price')}}</p>
                            @enderror
                        </div>
                        <div class="d-flex flex-row align-items-center my-3">
                            <input type="number" id="discount" min="0" max="100" required name="discount" value="{{old('discount')}}" placeholder="0 - 100 Discount">
                            @error('discount')
                                <p class="alert-red">{{$errors->first('discount')}}</p>
                            @enderror
                        </div>
                        <h6 id="finalPrice"></h6>
                        <div class="d-flex flex-row align-items-center my-3">
                            <select name="subject" required id="subject">
                            </select>
                            @error('subject')
                            <p class="alert-red">{{$errors->first('subject')}}</p>
                            @enderror
                        </div>
                        <div class="d-flex flex-row align-items-center my-3">
                            <select name="category" required  id="category">
                            </select>
                            @error('category')
                            <p class="alert-red">{{$errors->first('category')}}</p>
                            @enderror
                        </div>
                        <div class="d-flex flex-row align-items-center my-3">
                            <select name="subcategory_id" class="subcategory_id" required  id="sub-category">
                            </select>
                            @error('subcategory_id')
                            <p class="alert-red">{{$errors->first('subcategory_id')}}</p>
                            @enderror
                        </div>
                        <div id="details">
                        </div>
                        <input type="hidden" value="0" name="detailcounter" id="detailcounter">
                        <input type="hidden" value="1" name="aboutcounter" id="aboutcounter">
                        <br><br><br>
                        <h4>Add About This Item</h4>
                        <hr>
                        <div id="aboutThisItem">
                            <input class="w-100 aboutThis" name="about1" type="text" placeholder="About This item">
                        </div>
                        <i id="addItemBox" class="add-btn bi bi-plus-circle"></i>
                        <input type="submit" style="width: 300px" name="submit" class="submit-product-btn" value="Add Product & Upload Images"/>
                    </form>
                </div>
                <div class="col-5 last_products">
                    <h4>Last Products</h4>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Show</th>
                            <th>Edit</th>
                        </tr>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->price}}</td>
                                <td><a class="text-decoration-none" href="#">Show</a></td>
                                <td><a class="text-decoration-none" href="#">Edit</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{url('asset/js/addproduct.js')}}"></script>
@endsection

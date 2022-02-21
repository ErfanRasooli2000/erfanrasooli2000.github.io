@extends('layout.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-evenly">
                <div class="col-12">
                    <div class="content-header">
                        <p>OVERVIEW</p>
                        <h4>ADD Image For Your Product</h4>
                    </div>
                </div>
                <div class="col-6 last_products">
                    <h4 class="d-inline-block">{{$product->title}} </h4>
                    <p class="d-inline-block">{{$product->full_name}}</p><br>
                    <p class="text-gray">{{$product->subcategory->category->subject->name}} > {{$product->subcategory->category->name}} > {{$product->subcategory->name}} > {{$product->title}}</p>
                    <p><strong>Price : $</strong>{{$product->price}}</p>
                    <input type="hidden" id="product_id" value="{{$product->id}}">
                    <hr>
                    <h4>Import Product Images</h4>
                    <form id="imageUpload" class="mt-2 p-3 d-flex flex-row justify-content-center align-items-center" enctype="multipart/form-data" method="post">
                        @csrf
                        <input class="upload-btn pt-1" type="file" accept=".jpg,.jpeg,.png" name="product_image" id="product_image" value="Upload Product Image">
                        <div id="spinnerHolder">
                            <img id="spinner" width="50" height="50" src="{{url('asset/images/spinner.gif')}}">
                        </div>
                        <div id="uploadBtnHolder">
                            <a id="submitImageUpload" href="#">Upload Image</a>
                        </div>
                    </form>
                </div>
                <div class="col-4 last_products">
                    <div class="container-fluid p-0">
                        <div id="allImagesProduct" class="row justify-content-evenly p-0">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{url('asset\js\upload.js')}}"></script>
@endsection

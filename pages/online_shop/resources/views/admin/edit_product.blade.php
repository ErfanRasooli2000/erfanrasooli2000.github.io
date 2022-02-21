@extends('layout.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-evenly">
                <div class="col-12">
                    <div class="content-header">
                        <p>OVERVIEW</p>
                        <h4>Edit Product</h4>
                    </div>
                </div>
                <div class="col-6 add-product">
                    <form action="/product" method="post">
                        @csrf
                        <div class="d-flex flex-row align-items-center mt-0 mb-3">
                            <input type="text" required name="title" value="{{$product->title}}" placeholder="Title">
                            @error('title')
                            <p class="alert-red">{{$errors->first('title')}}</p>
                            @enderror
                        </div>
                        <div class="d-flex flex-row align-items-center my-3">
                            <input type="text" required name="full_name" value="{{$product->full_name}}" placeholder="Name">
                            @error('full_name')
                            <p class="alert-red">{{$errors->first('full_name')}}</p>
                            @enderror
                        </div>
                        <div class="d-flex flex-row align-items-center my-3">
                            <input type="number"  required name="quantity" value="{{$product->quantity}}" placeholder="Quantity">
                            @error('quantity')
                            <p class="alert-red">{{$errors->first('quantity')}}</p>
                            @enderror
                        </div>
                        <div class="d-flex flex-row align-items-center my-3">
                            <input type="number" id="price" required name="price" value="{{$product->price}}" placeholder="Price (Dollar)">
                            @error('price')
                            <p class="alert-red">{{$errors->first('price')}}</p>
                            @enderror
                        </div>
                        <div class="d-flex flex-row align-items-center my-3">
                            <input type="number" id="discount" min="0" max="100" required name="discount" value="{{$product->discount}}" placeholder="0 - 100 Discount">
                            @error('discount')
                            <p class="alert-red">{{$errors->first('discount')}}</p>
                            @enderror
                        </div>
                        <h6 id="finalPrice"></h6>
                        <div class="d-flex flex-row align-items-center my-3">
                            <select name="subject" required id="subject2">
                                @foreach($subjects as $subject)
                                    @if($product->subcategory->category->subject->id==$subject->id)
                                        <option selected value="{{$subject->id}}">{{$subject->name}}</option>
                                    @else
                                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('subject')
                            <p class="alert-red">{{$errors->first('subject')}}</p>
                            @enderror
                        </div>
                        <div class="d-flex flex-row align-items-center my-3">
                            <select name="category" required  id="category2">
                                @foreach($categories as $category)
                                    @if($product->subcategory->category->id==$category->id)
                                        <option selected value="{{$category->id}}">{{$category->name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category')
                            <p class="alert-red">{{$errors->first('category')}}</p>
                            @enderror
                        </div>
                        <div class="d-flex flex-row align-items-center my-3">
                            <select name="subcategory_id" class="subcategory_id" required  id="sub-category2">
                                @foreach($subcategories as $subcategoriy)
                                    @if($product->subcategory->id==$subcategoriy->id)
                                        <option selected value="{{$subcategoriy->id}}">{{$subcategoriy->name}}</option>
                                    @else
                                        <option value="{{$subcategoriy->id}}">{{$subcategoriy->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('subcategory_id')
                            <p class="alert-red">{{$errors->first('subcategory_id')}}</p>
                            @enderror
                        </div>

                        <div id="details">
                            <h4>Add Details to This Item</h4>
                            <hr>
                            <div id="detailsHolder">
                                @php
                                    $counter2 = 0;
                                @endphp
                            @foreach($details as $detail)
                                @php
                                    $counter2++;
                                @endphp
                                <div class="d-flex mt-2 justify-content-evenly align-items-center">
                                    <select name="detail{{$counter2}}" class="selectInput" required id="detail2">
                                        @foreach($alldetails as $key)
                                            {{$key->id}}
                                        {{$detail->detail_id}}
                                            @if($key->id==$detail->detail_id)
                                                <option selected value="{{$key->id}}">{{$key->key}}</option>
                                            @else
                                                <option value="{{$key->id}}">{{$key->key}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <input name="detailvalue{{$counter2}}" type="text" value="{{$detail->value}}">
                                </div>
                            @endforeach
                            </div>
                            <i id="addDetailBox" class="mt-2 add-btn bi bi-plus-circle"></i>
                        </div>

                        <br><br><br>
                        <h4>Add About This Item</h4>
                        <hr>

                        <div id="aboutThisItem">
                            @php
                                $count = 0;
                            @endphp
                            @foreach($abouts as $about)
                                @php
                                    $count++
                                @endphp
                                <input class="w-100 mt-1 aboutThis" name="about{{$count}}" type="text" placeholder="About This item" value="{{$about->text}}">
                            @endforeach
                        </div>

                        <input type="hidden" value="{{$counter2}}" name="detailcounter" id="detailcounter">
                        <input type="hidden" value="{{$count}}" name="aboutcounter" id="aboutcounter">
                        <i id="addItemBox" class="add-btn bi bi-plus-circle"></i>
                        <input type="submit" style="width: 200px" name="submit" class="submit-product-btn mt-5" value="Edit Product"/>
                    </form>
                </div>
                <div class="col-4 last_products">
                    <div class="container-fluid p-0">
                        <div id="allImagesProduct" class="row justify-content-evenly p-0">

                        </div>
                        <input type="hidden" id="product_id" value="{{$product->id}}">
                        <form id="imageUpload" class="mt-2 p-3 d-flex flex-column justify-content-center align-items-center" enctype="multipart/form-data" method="post">
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
                </div>
            </div>
        </div>
    </div>
    <script src="{{url('asset/js/edit_product.js')}}"></script>
@endsection

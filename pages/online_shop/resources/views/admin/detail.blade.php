@extends('layout.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-evenly">
                <div class="col-12">
                    <div class="content-header">
                        <p>OVERVIEW</p>
                        <h4>Details</h4>
                    </div>
                </div>
                <div class="col-5 last_products">
                    <form action="{{route('admin.detail.store')}}" method="post">
                        @csrf
                        <div class="d-flex flex-row align-items-center mt-0 mb-3">
                            <input type="text" required name="key" value="{{old('key')}}" placeholder="Name">
                            @error('key')
                            <p class="alert-red">{{$errors->first('key')}}</p>
                            @enderror
                        </div>
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
                            <select name="subcategory_id" required  id="sub-category">
                            </select>
                            @error('subcategory_id')
                            <p class="alert-red">{{$errors->first('subcategory_id')}}</p>
                            @enderror
                        </div>
                        <input type="submit" style="width: 150px" name="submit" class="submit-product-btn" value="Add Detail"/>
                    </form>
                </div>
                <div class="col-6 last_products">
                    <table>
                        <tr>
                            <th>Key Name</th>
                            <th>Parent Sub Category</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($details as $detail)
                            <tr>
                                <td>{{$detail->key}}</td>
                                <td>{{$detail->subcategory->name}}</td>
                                <td>
                                    <form action="{{route('admin.detail.destroy',['id'=>$detail->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="no-button" type="submit" value="DELETE" name="submit">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

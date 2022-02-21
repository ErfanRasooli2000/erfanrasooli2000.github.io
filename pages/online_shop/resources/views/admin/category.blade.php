@extends('layout.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-evenly">
                <div class="col-12">
                    <div class="content-header">
                        <p>OVERVIEW</p>
                        <h4>Categories</h4>
                    </div>
                </div>
                <div class="col-5 last_products">
                    <h4>Add Category</h4>
                    <form action="{{route('admin.category.store')}}" class="mt-4" method="post">
                        @csrf
                        <input type="text" required name="name" value="{{old('name')}}" placeholder="Category Name"><br>
                        @error('name')
                        <p class="alert-red">{{$errors->first('name')}}</p>
                        @enderror
                        <div class="d-flex flex-row align-items-center my-3">
                            <select name="subject" style="width: 220px" required id="subject">
                                <option selected disabled>Select Subject</option>
                                @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>
                            @error('subject')
                                <p class="alert-red">{{$errors->first('subject')}}</p>
                            @enderror
                        </div>
                        <input type="submit" name="submit" value="Add Category" class="submit-product-btn mt-3">
                    </form>
                </div>
                <div class="col-7 last_products">
                    <h4>ALL Categories</h4>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Sub Categories</th>
                            <th>Parent Subject</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>{{$category->subcategories()->count()}}</td>
                                <td>{{$category->subject->name}}</td>
                                <td><a class="text-decoration-none" href="/admin/category/{{$category->id}}/edit">Edit</a></td>
                                <td>
                                    <form action="/admin/category/{{$category->id}}" method="post">
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

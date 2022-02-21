@extends('layout.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-evenly">
                <div class="col-12">
                    <div class="content-header">
                        <p>OVERVIEW</p>
                        <h4>Edit Subject</h4>
                    </div>
                </div>
                <div class="col-5 d-flex flex-column last_products">
                    <h4>Edit Subject</h4>
                    <form action="{{route('admin.subject.update',['id'=>$subject->id])}}" class="mt-4" method="post">
                        @csrf
                        @method('PUT')
                        <input type="text" required name="name" value="{{$subject->name}}" placeholder="Subject Name"><br>
                        @error('name')
                        <p class="alert-red">{{$errors->first('name')}}</p>
                        @enderror
                        <input type="submit" name="submit" value="Edit Subject" class="submit-product-btn mt-3">
                    </form>
                    <form action="/admin/subject/{{$subject->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input class="delete-button" type="submit" value="DELETE" name="submit">
                    </form>
                </div>
                <div class="col-6 last_products">
                    <h4>ALL Categories</h4>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Categories</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($subject->categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>{{$category->subcategories->count()}}</td>
                                <td><a class="text-decoration-none" href="/admin/category/{{$category->id}}/edit">Edit</a></td>
                                <td><a class="text-decoration-none" href="#">Delete</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

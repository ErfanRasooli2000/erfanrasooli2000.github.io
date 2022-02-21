@extends('layout.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-evenly">
                <div class="col-12">
                    <div class="content-header">
                        <p>OVERVIEW</p>
                        <h4>Edit Sub Category</h4>
                    </div>
                </div>
                <div class="col-5 d-flex flex-column last_products">
                    <h4>Edit Sub Category</h4>
                    <form action="{{route('admin.subcategory.update',['id'=>$subcategory->id])}}" class="mt-4" method="post">
                        @csrf
                        @method('PUT')
                        <input type="text" required name="name" value="{{$subcategory->name}}" placeholder="Category Name"><br>
                        @error('name')
                        <p class="alert-red">{{$errors->first('name')}}</p>
                        @enderror
                        <div class="d-flex flex-row align-items-center my-3">
                            <select name="subject_id" style="width: 220px" required id="subject_edit">
                                <option disabled>Select</option>
                                @foreach($subjects as $subject)
                                    @if($subject->id==$subcategory->category->subject_id)
                                        <option selected value="{{$subject->id}}">{{$subject->name}}</option>
                                    @else
                                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('subject_id')
                            <p class="alert-red">{{$errors->first('subject_id')}}</p>
                            @enderror
                        </div>
                        <div class="d-flex flex-row align-items-center my-3">
                            <select name="category_id" style="width: 220px" required id="category_edit">
                                <option disabled>Select</option>
                                @foreach($categories as $category)
                                    @if($category->id==$subcategory->category_id)
                                        <option selected value="{{$category->id}}">{{$category->name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="alert-red">{{$errors->first('category_id')}}</p>
                            @enderror
                        </div>
                        <input type="submit" name="submit" value="Edit Category" class="submit-product-btn mt-3">
                    </form>
                    <form action="/admin/subcategory/{{$subcategory->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input class="delete-button" type="submit" value="DELETE" name="submit">
                    </form>
                </div>
                <div class="col-6 last_products">
                    <h4>ALL Sub Categories</h4>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($subcategories as $subcategory)
                            <tr>
                                <td>{{$subcategory->name}}</td>
                                <td><a class="text-decoration-none" href="/admin/subcategory/{{$subcategory->id}}/edit">Edit</a></td>
                                <td>
                                    <form action="/admin/subcategory/{{$subcategory->id}}" method="post">
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
    <script src="{{url('asset/js/admin_edit.js')}}"></script>
@endsection

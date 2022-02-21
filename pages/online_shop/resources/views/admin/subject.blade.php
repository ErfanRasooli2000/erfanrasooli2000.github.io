@extends('layout.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-evenly">
                <div class="col-12">
                    <div class="content-header">
                        <p>OVERVIEW</p>
                        <h4>Subjects</h4>
                    </div>
                </div>
                <div class="col-5 last_products">
                    <h4>Add Subject</h4>
                    <form action="{{route('admin.subject.store')}}" class="mt-4" method="post">
                        @csrf
                        <input type="text" required name="name" value="{{old('name')}}" placeholder="Subject Name"><br>
                        @error('name')
                            <p class="alert-red">{{$errors->first('name')}}</p>
                        @enderror
                        <input type="submit" name="submit" value="Add Subject" class="submit-product-btn mt-3">
                    </form>
                </div>
                <div class="col-6 last_products">
                    <h4>ALL Subject's</h4>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Categories</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($subjects as $subject)
                            <tr>
                                <td>{{$subject->name}}</td>
                                <td>{{$subject->categories()->count()}}</td>
                                <td><a class="text-decoration-none" href="/admin/subject/{{$subject->id}}/edit">Edit</a></td>
                                <td>
                                    <form action="/admin/subject/{{$subject->id}}" method="post">
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

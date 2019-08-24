@extends('admin.adminlayout')
@section('content')

<div class="col-xs-6">
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="cat_title"> Add Category </label>
            <input class="form-control input-background" type="=text" name="title">
        </div>
        <div class="form-group ">
            <input class="btn btn-success submit-buttons" type="submit" name="submit" value="Add Category">
        </div>
    </form>
    <form method="post" action="{{ route('categories.update', $category->id ) }}">
            @method("PATCH")
            @csrf
            <div class="form-group">
                <label for="cat_title"> Update Category </label>
            <input class="form-control input-background" type="=text" name="title" value="{{$category->title}}">
            </div>
            <div class="form-group ">
                <input class="btn btn-success submit-buttons" type="submit" name="submit" value="Update Category">
            </div>
    </form>
    @if (Request::is('*/edit'))
    aaaaaa
@endif
</div>
<form method="post">
    @csrf
<div class="col-xs-6">
    <table class="table table-bordered table-hover tr-background">
        <div class="row">
            <div id="bulkOptionsContainer" class="col-xs-4">
                <select class="form-control input-background" id="" name="bulk_options">
                    <option value="">Select Options</option>
                    <option value="Clone">Clone</option>
                    <option value="Delete">Delete </option>
                </select>
            </div>
            <div class="col-xs-4">
                <input type="submit" class="btn btn-success submit-buttons" value="Apply">
            </div>
            <thead>
                <th><input id="selectAllBoxes" type="checkbox"></th>
                <th>ID</th>
                <th>Category Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                <td><input class="checkBoxes" type="checkbox" name='checkBoxArray[]' value=''></td>
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
            </form>
            <td><a href="{{ route('categories.edit', $category->id ) }}" class='btn-xs btn-success submit-buttons edit_link' name='edit'>Edit</a></td>
            <form action="{{ route('categories.destroy', $category->id ) }}" method="POST">
                @csrf
                @method('DELETE')
                <td><input class='btn-xs btn-danger del_link' type='submit' value="Delete"></td>
            </form>
                </tr>
                @endforeach
            </tbody>
    </table>
</div>
@endsection


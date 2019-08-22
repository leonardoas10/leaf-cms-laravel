@extends('admin.adminlayout')
@section('content')

<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="" type="text" class="form-control input-background" name="title" required>
    </div>
    <div class="form-group">
        <label for="category_id">Categories</label>
        <select class="input-background" name="category_id" id="category_id">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="user">Users</label>
        <select name="user" id="id" class="input-background">
            @foreach ($users as $user)
                <option value="{{$user->username}}">{{$user->username}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <select name="status" id="" class="input-background">
            <option value="Draft">Draft</option>
            <option value="Published">Published</option>
        </select>
    </div>
    // Imagen //    
    {{-- <div class="form-group">
        <label for="image_box">Post Image</label>
        <input type="file" class="form-control input-background" name="image_box">
        <span class="btn-danger"></span>
        <br>
        <input class="btn btn-info" type="submit" name="update_image" value="Update Image">
        <img width="100" src="../images/">
    </div> --}}
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" class="form-control input-background" name="tags" value="" required>
    </div>
    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea type="text" class="form-control" id="body" cols="30" rows="10" name="content" required></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-success submit-buttons" type="submit" value="Publish Post">
    </div>
    @include('errors')
</form>
    
@endsection
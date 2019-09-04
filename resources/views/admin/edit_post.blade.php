@extends('admin.adminlayout')
@section('content')
<form action="{{ route('posts.update', $post->id ) }}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="form-group">
        <label for="title">Post Title</label>
    <input value="{{$post->title}}" type="text" class="form-control input-background" name="title">
    </div>
    <div class="form-group">
        <label for="category_id">Categories</label>
        <select class="input-background" name="category_id" id="category_id">
            <option selected value="{{$post->category->id}}">{{$post->category->title}}</option> 
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
            <option value="{{$post->status}}">{{$post->status}}</option>
            @if ($post->status === "Published")
                <option value="Draft">Draft</option>
            @else
                <option value="Published">Published</option>
            @endif
        </select>
    </div>
    <div class="form-group">
            <label for="image">Post Image</label>
            <input type="file" class="form-control input-background" name="image">
            <br>
            <img width="100" src="{{asset('images/' . $post->image)}}">
        </div>
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" class="form-control input-background" name="tags" value="{{$post->tags}}">
    </div>
    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea type="text" class="form-control" id="body" cols="30" rows="10" name="content">{{$post->content}}</textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-success submit-buttons" type="submit" name="update_post" value="Publish Post">
    </div>
</form>
@endsection
@extends('admin.adminlayout')
@section('content')
<form action="{{ route('posts.update', $post->id ) }}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="form-group">
        <label for="title">{{__('post.title')}}</label>
        <input value="{{$post->title}}" type="text" class="form-control input-background" name="title">
    </div>
    <div class="form-group">
        @error('title')
            <span class="invalid-feedback red-error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="category_id">{{__('post.category')}}</label>
        <select class="input-background" name="category_id" id="category_id">
            <option selected value="{{$post->category->id}}">{{$post->category->title}}</option> 
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach  
        </select>
    </div>
    <div class="form-group">
        @error('category_id')
            <span class="invalid-feedback red-error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        {{__('post.status')}} 
        <select name="status" id="" class="input-background">
            
            @if (App::isLocale('es') && $post->status === "Draft")
                <option value="{{$post->status}}">{{__('post.draft')}}</option>
                <option value="Published">{{__('post.publish')}}</option>
            @endif
            @if (App::isLocale('es') && $post->status === "Published")  
                <option value="{{$post->status}}">{{__('post.publish')}}</option>
                <option value="Draft">{{__('post.draft')}}</option>
            @endif
            @if (App::isLocale('en') && $post->status === "Draft")
            <option value="{{$post->status}}">{{__('post.draft')}}</option>
            <option value="Published">{{__('post.publish')}}</option>
            @endif
            @if (App::isLocale('en') && $post->status === "Published")  
                <option value="{{$post->status}}">{{__('post.publish')}}</option>
                <option value="Draft">{{__('post.draft')}}</option>
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="image">{{__('post.image')}}</label>
        <input type="file" class="form-control input-background" name="image">
        <br>
        <img width="100" src="{{asset('images/' . $post->image)}}">
    </div>
    <div class="form-group">
        <label for="tags">{{__('post.tags')}}</label>
        <input type="text" class="form-control input-background" name="tags" value="{{$post->tags}}">
    </div>
    <div class="form-group">
        @error('tags')
            <span class="invalid-feedback red-error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="content">{{__('post.content')}}</label>
        <textarea type="text" class="form-control" id="body" cols="30" rows="10" name="content">{{$post->content}}</textarea>
    </div>
    <div class="form-group">
        @error('content')
            <span class="invalid-feedback red-error" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <input class="btn btn-success submit-buttons" type="submit" name="update_post" value="{{__('post.update')}}">
    </div>
</form>
@endsection
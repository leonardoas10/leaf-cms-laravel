@extends('admin.adminlayout')
@section('content')

@if ($categories->count() === 0)
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-centered">
                <div class="panel panel-default">
                    <div class="panel-body login-card">
                        <div class="text-center">
                            <h3><i class="fa fa-gears fa-4x"></i></h3>
                            <h2 class="text-center"><i class="fa fa-quote-left"></i> Ups! First to all, create a category <i class="fa fa-quote-right "></i></h2>
                            <div class="row">
                                <div class="col-md-3 col-centered">
                                    <a href="{{ route('categories.index') }}" class="btn btn-primary btn-block submit-buttons ">{{ __('Go To Categories') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /.container -->
@else
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">{{__('post.title')}} </label>
            <input value="" type="text" class="form-control input-background" name="title" value="{{ old('title') }}">
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
                <option value=""></option>
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
                <option value="Draft">{{__('post.draft')}} </option>
                <option value="Published">{{__('post.publish')}} </option>
            </select>
        </div>  
        <div class="form-group">
            <label for="image">{{__('post.image')}}</label>
            <input type="file" class="form-control input-background" name="image">
        </div>
        <div class="form-group">
            <label for="tags">{{__('post.tags')}}</label>
            <input type="text" class="form-control input-background" name="tags" value="{{ old('tags') }}">
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
            <textarea type="text" class="form-control" id="body" cols="30" rows="10" name="content" value="{{ old('content') }}"></textarea>
        </div>
        <div class="form-group">
            @error('content')
                <span class="invalid-feedback red-error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input class="btn btn-success submit-buttons" type="submit" value="{{__('post.create_post')}}">
        </div>
    </form>        
@endif
@endsection
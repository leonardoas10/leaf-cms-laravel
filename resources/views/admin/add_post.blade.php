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
        <div class="form-group">
            <label for="image">Post Image</label>
            <input type="file" class="form-control input-background" name="image">
        </div>
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
@endif
@endsection
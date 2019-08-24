@extends('client.layout')

@section('content')
<div class="col-md-7">
    <h2>{{$post->title}}</a></h2>
    <p class="lead">Posted by: </p>
    <p><span class="glyphicon glyphicon-time time-icon"></span> Posted on {{$post->created_at}}</p>
    <hr>
    <a href="post.php?p_id=">
        <img class="img-responsive" src="{{asset('images/' . $post->image)}}" alt="/post_image">
    </a>
    <hr>
    <p>{{$post->content}}</p>
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        <form role="form" action="{{ route('comments.store', ['post_id'=> $post->id]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="Author">Author</label>
                <input class="form-control input-background" type="text" name="author">
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input class="form-control input-background" type="email" name="email">
            </div>
            <div class="form-group">
                <label for="Comment">Your Comment</label>
                <textarea type="text" class="form-control input-background" id="body" cols="30" rows="10" name="content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary comment-button" name="create_comment">Submit</button>
        </form>
    </div>

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">
                <small></small>
            </h4>
            <span>contenido</span>

            <!-- End Nested Comment -->
        </div>
    </div>
</div>
@include('client/sidebar')
@endsection
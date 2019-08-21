@extends('client.layout')
@section('content')

<!-- Page Content -->
        <!-- Blog Entries Column -->
        <div class="col-md-7">
            @foreach ($posts as $post)
            <!-- First Blog Post -->
            <h2><a class="post-title" href="{{ route('post.show', $post->id ) }}">{{$post->title}}</a></h2>
            <p class="lead">Posted by: </p>
            <p><span class="glyphicon glyphicon-time time-icon"></span> Posted on {{$post->created_at}}</p>
            <hr>
            <a href="post.php?p_id=">
                <img class="img-responsive" src="{{asset('images/' . $post->image)}}" alt="/post_image">
            </a>
            <hr>
            <p>{{$post->content}}</p>
            <a class="btn btn-primary read-more" href="{{ route('post.show', ['post' => $post->id ]) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            @endforeach
        </div>
        @include('client/sidebar')  
    <!-- /.row -->
    <ul class="pager">
        {{ $posts->links() }}
    </ul>

@endsection
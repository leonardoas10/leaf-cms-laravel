@extends('client.layout')

@section('content')
<div class="col-md-7">
    <h2>{{$post->title}}</a></h2>
    <p class="lead">{{__('index.posted_by')}} {{$post->user}}</p>
    <p><span class="glyphicon glyphicon-time time-icon"></span> {{__('index.posted_on')}} {{$post->created_at}}</p>
    <hr class="hr-post">
    <a href="post.php?p_id=">
        <img class="img-responsive" src="{{asset('images/' . $post->image)}}" alt="/post_image">
    </a>
    <br>
    <p>{{strip_tags(html_entity_decode($post->content))}}</p>
    <!-- Comments Form -->

    @guest
        <div class="panel panel-default">
            <div class="panel-body login-card">
                <div class="text-center">
                    <h1><i class="fa fa-commenting-o fa-3x"></i></h1>
                    <h1 class="text-center text-size"><i class="fa fa-quote-left"></i> {{__('index.if_you_want_to_comment')}} <i class="fa fa-quote-right "></i></h1>
                    <div class="form-group col-md-4 col-centered">
                        <div class="flex-row ">
                            <div class=" col-centered">
                                <a href="{{ route('register') }}" class="btn btn-success submit-buttons ">{{ __('index.join_us') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest
    @auth
        <div class="well">
            <h4>Leave a comment {{Auth::user()->username}}</h4>
            <form role="form" action="{{ route('post.comment.store', $post) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="content">Your Comment</label>
                    <textarea type="text" class="form-control input-background" id="body" cols="30" rows="10" name="content"></textarea>
                </div>
                <div class="form-group">
                    @error('content')
                        <span class="invalid-feedback red-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary comment-button" name="create_comment">Submit</button>
            </form>
        </div>   
    @endauth

    <!-- Comment -->
    @foreach ($post->comments as $comment)
        @if ($comment->status === "Approved")
            <div class="flex-row margin-bottom-more">

                @if ($comment->user->provider_id > 1)
                    <img class="img-profile-comment" src="{{$comment->user->image}}" alt="">
                @else
                    <img class="img-profile-comment" src="{{asset('images/' . $comment->user->image)}}" alt=""> 
                @endif
                <div class="margin-left-more">
                    <h4>{{$comment->user->username}}
                    <small>{{$comment->created_at}}</small>
                    </h4>
                    <span>{{$comment->content}}</span>
                </div>
            </div>
        @endif
    @endforeach    
</div>
@include('client/sidebar')
@endsection
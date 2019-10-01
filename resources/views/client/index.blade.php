@extends('client.layout')
@section('content')
<div class="col-md-7">
    @if (\Session::has('danger'))
        <div class="alert alert-danger success-timer margin-bottom-more padding-zero size-for-smarthphone text-center">
            {{Session::get('danger') }}
        </div>
    @endif
    @if (\Session::has('success'))
        <div class="alert alert-success success-timer margin-bottom-more padding-zero size-for-smarthphone text-center">
            {{Session::get('success') }}
        </div>
    @endif
    @guest
        <!-- Modal -->
        <div class="modal fade" id="test" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <h3 class="text-center navbar-title">{{ __('about.about') }} Leaf Shared</h3>
                    <div class="modal-body">
                        <div class="panel-body login-card links-color">
                            <div class="text-justify">
                                <h5>{{ __('about.purpose') }}</h5>
                                <h5 class="text-center">{{ __('about.below_you_find') }}</h5>
                                <a href="{{ route('about.index') }}">{{ __('sidebar.know_more_here') }}</a>
                            </div>
                        </div>     
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
    @endguest
    @foreach ($posts as $post)
        @if ($post->status === "Published" || Auth::check())
            <h2><a class="post-title" href="{{ route('post.show', $post->id ) }}">{{$post->title}}</a></h2>
            <p class="lead">{{__('index.posted_by')}} {{$post->user}}</p>
            <p><span class="glyphicon glyphicon-time time-icon"></span> {{__('index.posted_on')}} {{$post->created_at}}</p>
            <hr class="hr-post">
            <a href="{{ route('post.show', $post->id ) }}">
                <img class="img-responsive border-image" src="{{asset('images/' . $post->image)}}" alt="/post_image">
            </a>
            <br>
            <div class="text-justify">{!! Str::limit(strip_tags($post->content), 180) !!}</div>
            <br>

            <a class="btn btn-primary read-more" href="{{ route('post.show', ['post' => $post->id ]) }}">{{__('index.read_more')}} <span class="glyphicon glyphicon-chevron-right"></span></a>
        @endif
    @endforeach
</div>
@include('client/sidebar')  
<!-- /.row -->
<ul class="pager col-md-12">
    {{ $posts->links() }}
</ul>
@endsection
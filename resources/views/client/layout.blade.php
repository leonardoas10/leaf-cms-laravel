<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Leaf Shared</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/blog-home.css')}}" type="text/css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/home.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/common.css')}}" type="text/css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
    <link rel="shortcut icon" href="{{asset('images/leaf-icon.png')}}" />
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/"><span class="navbar-brand glyphicon glyphicon-leaf leaf-icon"></span></a>
                <a class=" navbar-brand navbar-title" href="/">Leaf Shared</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav menu-display-flex-row-iphone-6s">
                    <span class="nav navbar-nav menu-display-flex-column-iphone-6s menu-padding-left-right-iphone-6s">
                    @foreach ($categories as $category)
                        <li><a class="navbar-subtitles" href="{{route('category.index', ['category' => $category->id])}}">{{$category->title}}</a></li>
                    @endforeach
                    </span>
                    <span class="nav navbar-nav menu-display-flex-column-iphone-6s menu-padding-left-right-iphone-6s">
                        <li><a class="navbar-subtitles" href="{{ route('contact.index') }}">{{ __('navbar.contact') }}</a></li>
                        <li><a class="navbar-subtitles" href="{{ route('about.index') }}">{{ __('navbar.about') }}</a></li>
                    </span>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (auth()->user())
                    <span class="nav navbar-nav menu-display-flex-row-iphone-6s menu-padding-left-right-iphone-6s menu-margin-left-more-iphone-6s">
                        <li><a class="navbar-subtitles" href="{{ route('admin.index') }}">Admin</a></li>
                        <li><a class="navbar-subtitles" href="{{ route('logout') }}" 
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('navbar.logout') }}
                        </a></li>   
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </span>
                    @else
                    <span class="nav navbar-nav menu-display-flex-row-iphone-6s menu-padding-left-right-iphone-6s menu-margin-left-more-iphone-6s">
                        <li><a class="navbar-subtitles" href="{{ route('login') }}">{{ __('navbar.login') }}</a></li>
                        <li><a class="navbar-subtitles" href="{{ route('register') }}">{{ __('navbar.register') }}</a></li>
                    </span>
                    @endif
                    <li>
                        @if (App::isLocale('en'))
                            <div id="toggle" class="lang-en position-for-iphone-6s">
                                <input class="toggle" type="checkbox" checked data-toggle="toggle" data-on="English" data-off="Español" data-width="100" data-onstyle="dark">
                            </div>
                        @else
                            <div id="toggle" class="lang-es position-for-iphone-6s">
                                <input class="toggle" type="checkbox" data-toggle="toggle" data-on="English" data-off="Español" data-width="100" data-onstyle="dark">
                            </div>
                        @endif
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
            <div class="row">
                @yield('content')
            </div>
            <hr class="hr-post">
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>{{ __('auth.developed_by') }} Leonardo AS /
                        <a class="linkedin-link" href="https://www.linkedin.com/in/leonardoas10/" target="_blank">Linkedin Profile</a>
                        <img width="18" src="{{asset('images/linkedin.png')}}" alt="icon_linkedin"></a>
                    </p>
                    <p><span class="linkedin-text">{{ __('auth.copyright') }} &copy; Leaf Shared 2019 /</span> <a class="linkedin-link" href="{{route('privacy-policy')}}">{{ __('auth.privacy_policy') }}</a></p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>
    </div>
    <!-- /.container -->

    <!-- Custom JS-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="{{asset('js/lang.js')}}"></script>
    <script>lang("{{ csrf_token() }}");</script>
    <script src="{{asset('js/common.js')}}"></script>
    <script src="{{asset('js/client.js')}}"></script>
    <!-- jQuery -->
    <script src="{{asset('js/jquery.js')}}"></script>
    <!-- CKEditor-->
    <script src="{{asset('js/ckeditor.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/js/bootstrap4-toggle.min.js"></script>
</body>

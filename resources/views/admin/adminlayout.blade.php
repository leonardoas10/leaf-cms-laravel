<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Leaf Shared ADMIN</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.minadmin.css')}}" type="text/css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/sb-admin.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/common.css')}}" type="text/css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
    <link rel="shortcut icon" href="{{asset('images/leaf-icon.png')}}" />
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href=" {{ route('admin.index') }}"><span class="navbar-brand glyphicon glyphicon-leaf leaf-icon"></span></a>
                <a class="navbar-brand navbar-title" href=" {{ route('admin.index') }}">Leaf Shared ADMIN</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a class="navbar-subtitles" href="{{ route('users.index') }}">{{__('navbar.users_online')}}: <span id="usersonline" class="usersonline"></span></a></li>
                <li><a class="navbar-subtitles" href="/">{{__('navbar.home_site')}}</a></li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle " data-toggle="dropdown"><i
                            class="fa fa-user navbar-subtitles"></i>
                            <span id="username"></span>
                 
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="{{ route('user.profile', 1) }}"><i class="fa fa-fw fa-user navbar-subtitles"></i> {{__('navbar.profile')}}</a>
                        </li>
                        <li class="divider"></li>
                        <li><a class="navbar-subtitles" href="{{ route('logout') }}" 
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('navbar.logout') }}
                        </a></li>   

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav navbar-vertical">
                    <li><a href=" {{ route('admin.index') }}"><i class="fa fa-fw fa-dashboard"></i>{{__('navbar.my_data')}}</a></li>
                    @if (Auth::user()->role === "Admin")
                        <li><a href=" {{ route('admin.dashboard') }}"><i class="fa fa-fw fa-dashboard"></i>{{__('navbar.dashboard')}}</a></li>
                    @endif
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i
                                class="fa fa-fw fa-arrows-v "></i>{{__('navbar.posts')}}<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse navbar-vertical">
                            <li><a href="{{ route('posts.index') }}">{{__('navbar.view_all_posts')}}</a></li>
                            <li><a href="{{ route('posts.create') }}">{{__('navbar.add_post')}}</a></li>
                        </ul>
                    </li>
                    @if (Auth::user()->role === "Admin")
                        <li><a href="{{ route('categories.index') }}"><i class="fa fa-fw fa-wrench"></i> {{__('navbar.categories')}}</a></li>
                    @endif
                    
                    <li class=""><a href="{{ route('comments.index') }}"><i class="fa fa-fw fa-comment"></i> {{__('navbar.comments')}}</a></li>
            
                    @if (Auth::user()->role === "Admin")
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i
                                    class="fa fa-users"></i> {{__('navbar.users')}} <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo" class="collapse navbar-vertical">
                                <li><a href="{{ route('users.index') }}">{{__('navbar.view_all_users')}}</a></li>
                                <li><a href="{{ route('users.create') }}">{{__('navbar.add_user')}}</a></li>
                            </ul>
                        </li>
                    @endif
                    
                    <li class="active"><a href="{{ route('user.profile', 1) }}"><i class="fa fa-address-card-o"></i> {{__('navbar.profile')}}</a></li> 
                    {{-- TODO PARAMETER PROFILE ROUTE --}}
                    <li>
                        @if (App::isLocale('en'))
                            <div id="toggle" class="lang-en margin-left-more-lang-buttom position-for-iphone-admin">
                                <input class="toggle" type="checkbox" checked data-toggle="toggle" data-on="English" data-off="Español" data-width="100" data-onstyle="dark">
                            </div>
                        @else
                            <div id="toggle" class="lang-es margin-left-more-lang-buttom position-for-iphone-admin">
                                <input class="toggle" type="checkbox" data-toggle="toggle" data-on="English" data-off="Español" data-width="100" data-onstyle="dark">
                            </div>
                        @endif 
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <h1 class="page-header col-lg-12">
                    <div class="col-lg-4">
                        <div>{{ucwords(auth()->user()->username)}}</div>    
                    </div>
                        @if (\Session::has('success'))
                            <div class="alert alert-success success-timer margin-bottom-zero padding-zero size-for-smarthphone">
                                {{Session::get('success') }}
                            </div>
                        @endif
                    </h1>
                </div>
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Custom JS-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="{{asset('js/lang.js')}}"></script>
    <script>lang("{{ csrf_token() }}");</script>
    <script src="{{asset('js/admin.js')}}"></script>
    <script src="{{asset('js/common.js')}}"></script>
    <script>
        var locale = '{{ config('app.locale') }}';
        checkOrUncheck(locale);

        const username_for_smarthphone = "<?php echo str_limit(ucwords(auth()->user()->username), $limit = 8, $end = '') ?>";
        const username = "<?php echo str_limit(ucwords(auth()->user()->username), $limit = 20, $end = '...') ?>";
        if (screen.width <= 450 ) 
            $('#username').prepend(username_for_smarthphone);
        else {
            $('#username').prepend(username);
        }
    </script>
    <!-- jQuery -->
    <script src="{{asset('js/jquery.js')}}"></script>
    <!-- CKEditor-->
    <script src="{{asset('js/ckeditor.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    @stack('scripts')
    @stack('google_chars')

    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/js/bootstrap4-toggle.min.js"></script> 
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMS Laravel PROYECT</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/blog-home.css')}}" type="text/css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
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
                <a class=" navbar-brand navbar-title" href="/">Leaf Laravel CMS</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    @foreach ($categories as $category)
                    <li class=""><a class="navbar-subtitles" href="{{route('category.index', ['category' => $category->id])}}">{{$category->title}}</a></li>
                    @endforeach
                    <li class=""><a class="navbar-subtitles" href='/contact'>Contact Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class=""><a class="navbar-subtitles" href="/admin">Admin</a></li>
                    <li class=""><a class="navbar-subtitles" href="/login">Login</a></li>
                    <li class=""><a class="navbar-subtitles" href="/registration">Registration</a></li>
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
            <hr>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Developed By: Leonardo AS /
                        <a class="linkedin-link" href="https://www.linkedin.com/in/leonardoas10/" target="_blank">Linkedin
                            Profile</a>
                        <img width="18" src="{{asset('images/linkedin.png')}}" alt="icon_linkedin"></a>
                    </p>
                    <p class="linkedin-text">Copyright &copy; Leaf Laravel CMS 2019</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="{{asset('js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
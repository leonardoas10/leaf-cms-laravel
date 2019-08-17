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

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/blog-home.css')}}" type="text/css">
</head>

<body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container"> 
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="/leaf-cms-php"><span class="navbar-brand glyphicon glyphicon-leaf leaf-icon"></span></a>
                        <a class=" navbar-brand navbar-title" href="/leaf-cms-php">Leaf Laravel CMS</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                   
                            <li class="" ><a class="navbar-subtitles" href='/leaf-cms-php/contact'>Contact Us</a></li>
                        </ul>    
                        <ul class="nav navbar-nav navbar-right">
                       
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container -->
            </nav>
    @yield('content')
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Developed By: Leonardo AS /
                    <a class="linkedin-link" href="https://www.linkedin.com/in/leonardoas10/" target="_blank">Linkedin
                        Profile</a>
                    <img width="18" src="/leaf-cms-php/images/linkedin.png" alt="icon_linkedin">
                </p>
                <p class="linkedin-text">Copyright &copy; Leaf CMS 2019</p>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laravel ADMIN</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.minadmin.css')}}" type="text/css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/sb-admin.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/loader.css')}}" type="text/css">
    <!-- Custom Fonts -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">

    <script src="js/jquery.js"></script>
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
                <a class="navbar-brand navbar-title" href=" {{ route('admin.index') }}">Leaf Laravel ADMIN</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a class="navbar-subtitles" href="">Users Online: <span class="usersonline"></span></a></li>
                <li><a class="navbar-subtitles" href="/">Home Site</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="fa fa-user navbar-subtitles"></i>
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="../admin/profile.php"><i class="fa fa-fw fa-user navbar-subtitles"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav navbar-vertical">
                    <li><a href=" {{ route('admin.index') }}"><i class="fa fa-fw fa-dashboard"></i> My Data</a></li>
                    <li><a href=" {{ route('admin.dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i
                                class="fa fa-fw fa-arrows-v "></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse navbar-vertical">
                            <li><a href="{{ route('posts.index') }}">View All Posts</a></li>
                            <li><a href="{{ route('posts.create') }}">Add Posts</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('categories.index') }}"><i class="fa fa-fw fa-wrench"></i> Categories</a></li>
                    <li class=""><a href="{{ route('comments.index') }}"><i class="fa fa-fw fa-file"></i> Comments</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i
                                class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse navbar-vertical">
                            <li><a href="{{ route('users.index') }}">View All Users</a></li>
                            <li><a href="{{ route('users.create') }}">Add User</a></li>
                        </ul>
                    </li>
                    <li class="active"><a href="{{ route('profile.show', 1) }}"><i class="fa fa-fw fa-file"></i> Profile</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <div>Username</div>
                        </h1>
                   
                    </div>
                </div>
                @yield('content')
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

      <!-- jQuery -->
      <script src="{{asset('js/jquery.js')}}"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
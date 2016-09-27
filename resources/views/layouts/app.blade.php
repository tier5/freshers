<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf_token" content="{{csrf_token()}}" />

        <title>Laravelsite | @yield('title')</title>

        <!-- Styles -->
        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/password.css" rel="stylesheet">
        <!-- Custom CSS -->
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        
        <script src="//cdn.jsdelivr.net/emojione/2.2.6/lib/js/emojione.min.js"></script>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/emojione/2.2.6/assets/css/emojione.min.css"/>
        <!-- last 2 links added for emoji support -->
        <style>
            body {
                font-family: 'Lato';
                margin-top: 60px;
            }

            .fa-btn {
                margin-right: 6px;
            }
        </style>
        @yield('style')
        @yield('extended-style')
        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container-fluid">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            <li><a class="navbar-brand" href="{{ route('app.index') }}">Home</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/article') }}">Blogs</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('meme') }}">Memes</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('about')}}">About</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('getcontact')}}">Contact</a></li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->first_name }} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('profile') }}"><i class="fa fa-img fa-fw"></i><img src="{{URL::to('uploads/profile_pic/'.Auth::user()->profile_picture)}}" class="img-circle" alt="Cinque Terre" width="42" height="42"> Profile</a></li>
                                        <li><a href="{{route('editprofile')}}"><i class="fa fa-btn fa-wrench fa-fw"></i> Update Profile</a> </li>
                                        <li><a href="{{route('view.meme')}}"><i class="fa fa-picture fa-fw"></i> Meme</a> </li>
                                        <li><a href="{{route('getsubdomain')}}"><i class="fa fa-link fa-fw"></i> Subdomain</a></li>
                                        <li><a href="{{ route('logout') }}"><i class="fa fa-btn fa-sign-out fa-fw"></i> Logout</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            <!-- /.container -->
            </nav>

            <!-- Page Content -->
            <div class="container">
                @yield('content')
            </div>
            <!-- /.row -->
            <hr>
        </div>

        <!-- /.container -->
        <!-- Footer -->


        <!-- JavaScripts -->
        <!-- jQuery -->
        <!--script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></--script>
        <!-- Bootstrap Core JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <!-- Custom Scripts -->
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
        @yield('script')
        @yield('extended-script')
    </body>
    <footer>
        <div class="row text-center">
            <div class="col-lg-12">
                <p>Copyright &copy; Laravelsite {{ date('Y') }}</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </footer>
</html>

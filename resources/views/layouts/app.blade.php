<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Stay and Park</title>
    <link rel="shortcut icon" href="{{ asset('/img/favicon.png') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css"
          integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{--silk--}}
<!-- Add the slick-theme.css if you want default styling -->
    {{--<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.9.0/slick/slick.css"/>--}}
    <!-- Add the slick-theme.css if you want default styling -->
    {{--<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.9.0/slick/slick-theme.css"/>--}}

</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img height="35px" src="/img/logo1.png">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class=""></span>
                            </a>

                            <ul class="dropdown-menu">
                                @if(Auth::user()->type=='Host')
                                    <li>
                                        <a href="{{ route('submitlisting') }}">
                                            Submit Listing
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('profile') }}">
                                            Profile
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>

                            </ul>
                        </li>
                        @endguest
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
    <hr>
    <div class="footer">
        <div class="row align-items-end">

            <div class="col-md-4">


                <b><p>Useful Links</p></b>

                <p><a style="text-decoration: none;" href="{{ route('howitworks') }}">How it Works</a></p>
                <p><a style="text-decoration: none;" href="{{ route('whylease') }}">Why lease your space?</a></p>
                <p><a style="text-decoration: none;" href="{{ route('privacypolicy') }}">Privacy Policy</a></p>
                <p><a style="text-decoration: none;" href="{{ route('FAQ') }}">FAQ's</a></p>

            </div>
            <div class="col-md-4">
                <b><p>Contact Information</p></b>
                <i class="fa fa-envelope" aria-hidden="true">&nbsp;&nbsp;mhhammza@gmail.com</i><br><br>
                <i class="fa fa-phone" aria-hidden="true">&nbsp;&nbsp;0343-0503931</i><br>
            </div>
            <div class="col-md-4">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/img/logo1.png" style="width:200px;height: 45px;"/>
                </a>
            </div>

        </div>
        <hr size="50%">
        <b><p><i class="fa fa-copyright"></i> Stay and Park 2018</p></b>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
{{--silk script--}}
<script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.9.0/slick/slick.min.js"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

</head>
<body>
    <div id="app">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('photos') }}">WallPaPers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('photos/home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('photos/latestwallpaper') }}">Latest Wallpapers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('photos/randomwallpaper') }}">Random Wallpepers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('photos/categories') }}">Categories
                    </a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 mr-2" action="{{ url('photos/abc') }}" method="get">
                {{csrf_field()}}
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </li>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('photos/walldetail')}}">Wallpaper Deatils</a>
                        <a class="dropdown-item" href="{{ url('photos/categorydetail')}}">Categories Deatils</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>
<footer style="background-color:rgb(52, 144, 220); ">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3 mt-3">
                <h5>Quick links</h5>
                <ul class="list-unstyled quick-links">
                    <li><a style="color:white;" href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                    <li><a style="color:white;" href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
                    <li><a style="color:white;" href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                    <li><a style="color:white;" href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                    <li><a style="color:white;" href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 mt-3">
                <h5>Quick links</h5>
                <ul class="list-unstyled quick-links">
                    <li><a style="color:white;" href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                    <li><a style="color:white;" href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
                    <li><a style="color:white;" href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                    <li><a style="color:white;" href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                    <li><a style="color:white;" href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 mt-3">
                <h5>Quick links</h5>
                <ul class="list-unstyled quick-links">
                    <li><a style="color:white;" href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
                    <li><a style="color:white;" href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
                    <li><a style="color:white;" href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
                    <li><a style="color:white;" href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
                    <li><a style="color:white;" href="https://wwwe.sunlimetech.com" title="Design and developed by"><i class="fa fa-angle-double-right"></i>Imprint</a></li>
                </ul>
            </div>

            <div class="col-xs-12 col-sm-3 col-md-3 mt-3">
                <ul class="list-unstyled list-inline social text-center ">
                    <h5>Quick links</h5>
                    <li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-twitter-square"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-google-plus-g"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <p class="h6">&copy All right Reversed.</p>
            </div>
        </hr>
    </div>  
</div>
</footer>
</div>
</body>
</html>

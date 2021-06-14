<!doctype html>
@php
        
@endphp

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Annual Training Planner</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style type="text/css">
        /* Footer */
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
section {
    padding: 25px 0;
}

section .section-title {
    text-align: center;
    color: white;
    margin-bottom: 0px;
    text-transform: uppercase;
}
#footer {
    background: white !important;
}
#footer h5{
    padding-left: 10px;
    border-left: 3px solid #eeeeee;
    padding-bottom: 6px;
    margin-bottom: 20px;
    color:#ffffff;
}
#footer a {
    color: #ffffff;
    text-decoration: none !important;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
#footer ul.social li{
    padding: 3px 0;
}
#footer ul.social li a i {
    margin-right: 5px;
    font-size:25px;
    -webkit-transition: .5s all ease;
    -moz-transition: .5s all ease;
    transition: .5s all ease;
}
#footer ul.social li:hover a i {
    font-size:30px;
    margin-top:-10px;
}
#footer ul.social li a,
#footer ul.quick-links li a{
    color:#ffffff;
}
#footer ul.social li a:hover{
    color:#eeeeee;
}
#footer ul.quick-links li{
    padding: 3px 0;
    -webkit-transition: .5s all ease;
    -moz-transition: .5s all ease;
    transition: .5s all ease;
}
#footer ul.quick-links li:hover{
    padding: 3px 0;
    margin-left:5px;
    font-weight:700;
}
#footer ul.quick-links li a i{
    margin-right: 5px;
}
#footer ul.quick-links li:hover a i {
    font-weight: 700;
}

@media (max-width:767px){
    #footer h5 {
    padding-left: 0;
    border-left: transparent;
    padding-bottom: 0px;
    margin-bottom: 10px;
}
}

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Annual Training Planner
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if(!session()->has('LoggedUser'))
        
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                        @endif


                        @if(session()->has('LoggedUser'))  
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

         <div class="container">
            <div class="main-body">
                <nav aria-label="breadcrumb" class="main-breadcrumb">
                  <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ URL('admin/dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{URL('admin/dashboard') }}">Admin Dashboard</a></li>
                 </ol>
                </nav>
           </div>
        </div>
            @yield('content')
        </main>
    </div>

    <section id="footer">
        <div class="container">
              
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                    <p style="color: black !important;"><a style="color: blue !important;" href="{{ route('home') }}">Annual Training Planner</a> is the most flexible tool to ease the planning of Annual Training </p>
                    <p style="color: black !important;" class="h6">© All right Reversed.<a style="color: blue !important;" class="text-green ml-2" href="https://amar.bio/salman" target="_blank">Maj Farhana | Lt Salman</a></p>
                </div>
                <hr>
            </div>  
        </div>
    </section>
</body>
</html>

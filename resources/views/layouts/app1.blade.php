<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Monitor</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDThRZPvgjX8DkANVhL_PK1v3aV5Iu8TiA&libraries=places"
            type="text/javascript"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

    <style>
        .navbar {
    margin-bottom: 0;
    background-color: #739D34;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
}
.dropdown-menu {
  background-color: #739D34;
}

.navbar li a, .navbar .navbar-brand {
    color: #fff !important;
}

.navbar-nav li a:hover, .navbar-nav li.active a {
    color: #00CC33 !important;
    background-color: #fff !important;
}

.navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
}
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Monitor
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                      <li><a href="#about">About</a></li>
                      <li><a href="#portfolio">Portfolio</a></li>
                      <li><a href="#contact">Contact</a></li>
                      <li><a href="{{ url('map') }}">Map</a></li>
                      <li><a href="{{ url('registration/create') }}">Register</a></li>
                      <li><a href="{{ url('/login') }}">Login</a></li>
                    @else
                        <li><a href="#about">About</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li <?=echoActiveClassIfRequestMatches("map")?>><a href="{{ url('map') }}">Map</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul id="dropdown-menu" class="dropdown-menu" role="menu">
                                <li <?=echoActiveClassIfRequestMatches("registration")?>><a href="{{ url('registration') }}">Devices</a></li>
                                <li <?=echoActiveClassIfRequestMatches("contact")?>><a href="{{ url('contact') }}">Questions</a></li>
                                <li <?=echoActiveClassIfRequestMatches("register")?>><a href="{{ url('/register') }}">Register new admin</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out fa-lg"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
              </ul>
            </div>
        </div>
    </nav>
    <div class="container">
      @if(session('message'))
        <div class="alert alert-success">
          {{ session('message')}}
      @endif
    </div>
    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <?php
    function echoActiveClassIfRequestMatches($requestUri)
    {
        $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

        if ($current_file_name == $requestUri)
            echo 'class="active"';
    }
    ?>
</body>
</html>

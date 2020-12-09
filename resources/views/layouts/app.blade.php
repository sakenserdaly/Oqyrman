<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Arunachol.com</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    @yield('other_styles')

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top" style="background-color: white;margin-bottom:0px;">
        <div class="container" style="margin-bottom:0px;padding-bottom: 0px;">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand"  href="{{ url('/') }}">
                    <font color="green" style="font-weight: bold;" face="Papyrus" size="6px">Arunachol.com</font>
                </a>
                
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if (Auth::guest())
                @else

                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/books') }}">Buy books</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/global/ads_by_user') }}">Ads by users</a></li>
                </ul>
                
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/auctions') }}">Auctions</a></li>
                </ul>

                
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else




                        <!-- search bar -->
                        <div
                            style=" float: left;
                                    padding: 5px;
                                    vertical-align: bottom;
                                    margin: 5px auto;
                                    margin-right: 40px;"
                        >
                        <form id="search_get_form" method="get" action="/search">
                        <style type="text/css">
                            input:focus {
                                outline:none;
                            }
                        </style>
                            <img src="{{URL::asset('images/searchicon.png')}}"
                                height="20px" width="20px" onclick="submitSearch()">
                            <input name="search_word" placeholder="  search here" value="" 
                                style="
                                width: 200px;
                                height: 30px;
                                border: 0px;
                                margin-left: 5px;
                                background-color: #fbfbfb;
                                border-radius: 5px;" 
                            >
                            <script type="text/javascript">
                                function submitSearch()
                                {
                                    document.getElementById("search_get_form").submit();
                                }
                            </script>
                            <br>



                        </form>
                        </div>




                        <!-- check if the user is a worker -->
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/inbox') }}">
                                <img src="{{URL::asset('images/msg_icon.png')}}"
                                width="25px" height="25px" />
                            </a></li>
                            <li><a href="{{ url('/notification') }}">
                                <img src="{{URL::asset('images/notification_icon.png')}}"
                                width="25px" height="25px" />
                            </a></li>

                        </ul>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-sign-out"></i>Profile</a></li>

                                <li><a href="{{ url('/settings') }}"><i class="fa fa-btn fa-sign-out"></i>Settings</a></li>

                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <?php
    App\Cart::where('status','paid')->delete();
    App\Books::where('status','sold')->delete();
    App\AdvertisedBooks::where('status','sold')->delete();
    ?>

    @yield('content')

    
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>

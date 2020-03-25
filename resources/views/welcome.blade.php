<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .full-height .top-right {
            z-index: 100;
            color: #fff;
        }

        .full-height .top-right a {
            color: #fff !important;
        }

    </style>
</head>

<body>
        @if (Route::has('login'))
        <!-- <div class="top-right links">
            @auth
            <a href="{{ url('/admin') }}">Dashboard</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div> -->
        @endif
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm" style="z-index: 1;">
            <div class="container">
                <a class="navbar-brand text-bold" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/students') }}">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/gym-ownners') }}">Gym Owners</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/pricing') }}">Pricing</a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="/admin" class="dropdown-item">{{__('Dashboard')}}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="simpleslide100">
            <div class="simpleslide100-item bg-img1" style="background-image: url({{asset('images/gym-2.jpg')}});">
            </div>
            <div class="simpleslide100-item bg-img1" style="background-image: url({{asset('images/gym-1.jpg')}});">
            </div>
            <div class="simpleslide100-item bg-img1" style="background-image: url({{asset('images/gym-3.jpg')}});">
            </div>
            <div class="size1 overlay1">
                <!--  -->
                <div class="size1 flex-col-c-m p-l-15 p-r-15 p-t-50 p-b-50">
                    <h3 class="l1-txt1 txt-center p-b-25">
                        GYM VIDEO
                    </h3>
                </div>
            </div>
        </div>
</body>
       <!--===============================================================================================-->
       <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('vendor/select2/select2.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('vendor/countdowntime/moment.min.js')}}"></script>
        <script src="{{ asset('vendor/countdowntime/moment-timezone.min.js')}}"></script>
        <script src="{{ asset('vendor/countdowntime/moment-timezone-with-data.min.js')}}"></script>
        <script src="{{ asset('vendor/countdowntime/countdowntime.js')}}"></script>
        <script>
            $('.cd100').countdown100({
                /*Set Endtime here*/
                /*Endtime must be > current time*/
                endtimeYear: 0,
                endtimeMonth: 0,
                endtimeDate: 35,
                endtimeHours: 18,
                endtimeMinutes: 0,
                endtimeSeconds: 0,
                timeZone: ""
                // ex:  timeZone: "America/New_York"
                //go to " http://momentjs.com/timezone/ " to get timezone
            });

        </script>
        <!--===============================================================================================-->
        <script src="vendor/tilt/tilt.jquery.min.js"></script>
        <script>
            $('.js-tilt').tilt({
                scale: 1.1
            })

        </script>
        <!--===============================================================================================-->
        <script src="{{ asset('js/main.js')}}"></script>
</html>

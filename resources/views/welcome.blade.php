<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <!-- Styles -->
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
<section id="header" class="fixed-top">
    <div class="container">
        
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="./">
                <span class="logo-default">
                    <img src="{{ asset('images/logo-default.png') }}" alt=""/>
                </span>
                <span class="logo-alt">
                    <img src="{{ asset('images/logo-alt.png') }}" alt="">
                </span>	
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/student') }}">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/gymowner') }}">Gym Owner</a>
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
                        <a class="nav-link menu-button" href="{{ route('register') }}">{{ __('GET STARTED') }}</a>
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
        </nav>

    </div><!-- //.container -->
 </section><!-- //Section Header End -->
 <section id="hero" class="bg-trans">
		<div class="hero-inner">
			<div class="hero-content">
				<div class="container">
					
					<div class="row">
						
						<div class="col-md-12 text-center">
							<div class="hero-text">
								<h1>{{__("Can't leave the house to train?")}}</h1>
								<p>{{ __('Now you can train online in the comfort of your own home.') }}</p>
								<a href="{{ route('register') }}"" class="btn my-btn btn-large">{{ __('Sign up now for Free') }}</a>
							</div>
						</div>

					</div><!-- //.row -->

				</div><!-- //.container -->		
			</div>
		</div>
	</section><!-- //Section Hero End -->

	<!-- Section Gym Owner Start -->
	<section class="bg-white">
		<div class="container">
			
			<div class="row">
				
				<div class="col-md-12">
					<div class="gym-owner">
						<h2 class="title-default">Gym Owner?</h2>
						<p class="title-helper">Continue to service your students by providing them easy to use and structured content.</p>
						<a href="{{ route('register') }}" class="btn my-btn">Register your gym</a>
					</div>
				</div>

			</div><!-- //.row -->

		</div><!-- //.container -->
	</section><!-- //Section Gym Owner End -->

	<!-- Section Footer Top Start -->
	<section id="footer_top">
		<div class="container">
			
			<div class="row align-items-center">
				
				<div class="col-lg-6">
					<div class="footer-top-about">
						<img src="{{ asset('/images/logo-alt.png')}}" alt="">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem eum alias quasi eaque. Fugit beatae sapiente libero atque consequuntur iusto!</p>
					</div>
				</div>

				<div class="col-lg-6 mt-4 mt-lg-0">
					<div class="quick-links">
						<h3>Quick Links</h3>
						<nav class="nav flex-column">
							<a class="nav-link" href="{{ url('/student') }}">Student</a>
							<a class="nav-link" href="{{ url('/gymowner') }}">Gym Owner</a>
							<a class="nav-link" href="{{ url('/pricing') }}">Pricing</a>
							<a class="nav-link" href="#">About Us</a>
						</nav>
					</div>
				</div>

			</div><!-- //.row -->

		</div><!-- //.container -->
	</section><!-- //Section Footer Top End -->
	
	<!-- Section Footer Bottom Start -->
	<section id="footer_bottom">
		<div class="container">
			
			<div class="row align-items-center">
				
				<div class="col-lg-6">
					<div class="copyright-text">
						<p>&copy; 2020 - Online Training</p>
					</div>
				</div>

				<div class="col-lg-6 mt-4 mt-lg-0">
					<div class="social-media">
						<ul class="nav justify-content-end">
							<li class="nav-item">
								<a class="nav-link" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" target="_blank"><i class="fab fa-twitter"></i></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" target="_blank"><i class="fab fa-instagram"></i></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a>
							</li>
						</ul>
					</div>
				</div>

			</div><!-- //.row -->

		</div><!-- //.container -->
	</section><!-- //Section Footer Bottom End -->

</body>
       <!--===============================================================================================-->
       <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('js/popper.min.js')}}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('/js/theme.js')}}"></script>
        <!--===============================================================================================-->
</html>

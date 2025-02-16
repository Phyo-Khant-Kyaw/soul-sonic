<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>SoulSonic</title>
	<meta charset="UTF-8">
	<meta name="description" content="SolMusic HTML Template">
	<meta name="keywords" content="music, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{csrf_token()}} ">
	
	<!-- Favicon -->
	<link href="{{asset('logo/sslogo.png')}}" rel="shortcut icon"/>

	<!-- Google font -->
	<link href="{{asset('https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap')}}" rel="stylesheet">
 
	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('frontend/css/slicknav.min.css')}}"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}"/>

   {{-- comment --}}
			<script src="{{asset('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
		<script src="{{asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
	

</head>
<body>
		<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section clearfix">
		<a href="{{asset('frontend/index.html')}}" class="site-logo">
			<img src=" {{asset('logo/sslogo.png')}} " style="width: 100px; height: 100px;" alt="">
		</a>
		<div class="header-right">
			@guest
			<a href="{{route('register')}} "><i class="fa fa-user"></i> Register</a>
			<span>|</span>
			<a href="{{route('login')}} "><i class="fa fa-user"></i> Login</a>
				
					
					
				@else

			<div class="user-panel">	
				<div>
					
					<div class="dropdown ">

						<img src="{{asset(Auth::user()->profile)}}" alt="" class="userprofile" style="width: 50px;height: 50px;border-radius: 100%;">
						<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							{{Auth::user()->name}}
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item text-dark " href="#">Profile</a>
						<a href="javascript:void(0)" class="text-dark  dropdown-item" onclick="event.preventDefault();
						document.getElementById('logout-form').submit();"> Sign Out </a></li>
						<form id="logout-form" action="{{route('logout')}} " method="POST"style="display: none;">
							@csrf
						</form>
						</div>
					</div>

				</div>
				@endif
			</div> 
		</div>
		</div>
		@php
		
		@endphp
		<ul class="main-menu">
			<li><a href="{{route('index')}}">Home</a></li>
			<li><a href="{{route('about')}}">About</a></li>
			<li><a href="#">Pages</a>
				<ul class="sub-menu">
					<li><a href="{{route('category')}}">Category</a></li>
					@if(Auth::check())
					<li><a href="{{route('allfavorite')}}">Playlist</a></li>
					@endif

					<li><a href="{{route('artist')}}">Artist</a></li>
					<li><a href="{{route('album')}}">Album</a></li>
				
					<li><a href="{{route('content')}}">Contact</a></li>
				</ul>
			</li>
			<li><a href="{{route('song')}}">Songs</a></li>
			<li><a href="{{route('content')}}">Contact</a></li>
		</ul>
	</header>
	<!-- Header section end -->



	{{$slot}}

	<!-- Footer section -->
	<footer class="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 col-lg-7 order-lg-2">
					<div class="row">
						<div class="col-sm-4">
							<div class="footer-widget">
								<h2>About us</h2>
								<ul>
									<li><a href="">Our Story</a></li>
									<li><a href="">Sol Music Blog</a></li>
									<li><a href="">History</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="footer-widget">
								<h2>Products</h2>
								<ul>
									<li><a href="">Music</a></li>
									<li><a href="">Subscription</a></li>
									<li><a href="">Custom Music</a></li>
									<li><a href="">Footage</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="footer-widget">
								<h2>Playlists</h2>
								<ul>
									<li><a href="">Newsletter</a></li>
									<li><a href="">Careers</a></li>
									<li><a href="">Press</a></li>
									<li><a href="">Contact</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-5 order-lg-1">
					<img src="{{asset('frontend/img/logo.png')}}" alt="">
					<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
					<div class="social-links">
						<a href=""><i class="fa fa-instagram"></i></a>
						<a href=""><i class="fa fa-pinterest"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer section end -->
	
	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('frontend/js/jquery-3.2.1.min.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.slicknav.min.js')}}"></script>
	<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('frontend/js/mixitup.min.js')}}"></script>
	<script src="{{asset('frontend/js/main.js')}}"></script>

        @yield('script');
            

	</body>
</html>

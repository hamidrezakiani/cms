<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="description" content="{{ __('BodyShape - Coach, Speaker & Motivation HTML Template') }}">
	<meta property="og:title" content="{{ __('BodyShape - Coach, Speaker & Motivation HTML Template') }}">
	<meta property="og:description" content="{{ __('BodyShape - Coach, Speaker & Motivation HTML Template') }}">
	<meta property="og:image" content="https://w3cms.dexignzone.com/laravel/social-image.png">
	<meta name="format-detection" content="telephone=no">

	<!-- FAVICONS ICON -->
	@if(config('Site.favicon'))
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/configuration-images/'.config('Site.favicon')) }}">
    @else
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.png') }}">
    @endif

	<!-- PAGE TITLE HERE -->
	<title>{{ config('Site.title') ? config('Site.title') : __('W3CMS Laravel') }}</title>

	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{theme_asset('assets/images/fav.png')}}" type="image/gif" sizes="20x20">

	<!-- Box Icon CSS -->
	<link rel="stylesheet" href="{{theme_asset('assets/css/boxicons.min.css')}}">
	<!-- Bootstrap Icon CSS -->
	<link rel="stylesheet" href="{{theme_asset('assets/css/bootstrap-icons.css')}}">
	<!-- Swiper Carousel CSS -->
	<link rel="stylesheet" href="{{theme_asset('assets/css/swiper-bundle.min.css')}}">
	<!-- Magnific Popup CSS -->
	<link rel="stylesheet" href="{{theme_asset('assets/css/magnific-popup.css')}}">
	<!-- Odometer CSS -->
	<link rel="stylesheet" href="{{theme_asset('assets/css/odometer.css')}}">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{theme_asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{theme_asset('assets/css/meanmenu.min.css')}}">


	<!-- Main CSS -->
	<link rel="stylesheet" href="{{theme_asset('assets/css/style.css')}}">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="{{theme_asset('assets/css/responsive.css')}}">


	<!-- STYLESHEETS -->
	{{-- <link rel="stylesheet" href="{{ theme_asset('vendor/animate/animate.css') }}">
	<link rel="stylesheet" href="{{ theme_asset('vendor/magnific-popup/magnific-popup.min.css') }}">
	<link rel="stylesheet" href="{{ theme_asset('vendor/swiper/swiper-bundle.min.css') }}">
	<link rel="stylesheet" href="{{ theme_asset('vendor/rangeslider/rangeslider.css') }}">
	{{-- <link rel="stylesheet" href="{{ theme_asset('css/style.css') }}">
	<link class="skin" rel="stylesheet" type="text/css" href="{{ theme_asset('css/skin/skin-1.css') }}">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> --}}

</head>
<body id="bg" data-anm=".anm">
    <div class="cursor d-none d-lg-block"></div>

	<!-- Preloader -->

	<div id="preloader">
		<div class="loader_line"></div>
	</div>

	<!-- Preloader End -->

	<!-- back to to button start-->
	<a href="#" id="scroll-top" class="back-to-top-btn"><i class="bi bi-arrow-up"></i></a>
	<!-- back to to button end-->



	<div class="page-wraper">

		<!-- header -->
		@include('elements.header')
		<!-- header END -->
		<div class="page-content bg-white">

			@yield('content')

		</div>

		<!-- Footer -->
		@include('elements.footer')
		<!-- Footer END-->

		<button class="scroltop fa fa-chevron-up" ></button>

	</div>

	{{-- <!-- JAVASCRIPT FILES ========================================= -->
	<script src="{{ theme_asset('js/jquery.min.js') }}"></script>
	<script src="{{ theme_asset('vendor/wow/wow.js') }}"></script>
	<script src="{{ theme_asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ theme_asset('vendor/magnific-popup/magnific-popup.js') }}"></script>
	<script src="{{ theme_asset('vendor/counter/waypoints-min.js') }}"></script>
	<script src="{{ theme_asset('vendor/counter/counterup.min.js') }}"></script>
	<script src="{{ theme_asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
	<script src="{{ theme_asset('vendor/rangeslider/rangeslider.js') }}"></script>
	<script src="{{ theme_asset('vendor/anm/anm.js') }}"></script>
	<script src="{{ theme_asset('js/dz.carousel.js') }}"></script>
	<script src="{{ theme_asset('js/custom-min.js') }}"></script> --}}

    <!-- Jquery JS -->
	<script src="{{theme_asset('assets/js/jquery-3.6.0.min.js')}}"></script>
	<!-- Bootstrap JS -->
	<script src="{{theme_asset('assets/js/bootstrap.bundle.min.js')}}"></script>{{theme_asset('')}}
	<!-- Gsap -->
	<script src="{{theme_asset('assets/js/gsap.min.js')}}"></script>
	<script src="{{theme_asset('assets/js/ScrollTrigger.min.js')}}"></script>
	<script src="{{theme_asset('assets/js/ScrollSmoother.min.js')}}"></script>
	<script src="{{theme_asset('assets/js/SplitText.min.js')}}"></script>
	<!-- Swiper Carousel JS -->
	<script src="{{theme_asset('assets/js/swiper-bundle.min.js')}}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{theme_asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
	<!-- Odometer JS -->
	<script src="{{theme_asset('assets/js/odometer.min.js')}}"></script>
	<script src="{{theme_asset('assets/js/viewport.jquery.js')}}"></script>
	<!-- Mean menu JS -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- Main JS -->
	<script src="{{theme_asset('assets/js/main.js')}}"></script>
</body>
</html>

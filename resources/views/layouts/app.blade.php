<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/landing.js') }}"></script>
	<script src="{{ asset('js/manifest.js') }}" defer></script>
	<script src="{{ asset('js/vendor.js') }}" defer></script>
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/landing.css') }}" rel="stylesheet">
</head>
<body>
	<!-- HEADER -->
	@if (Route::current()->getName() !== 'login' && Route::current()->getName() !== 'register' && Route::current()->getName() !== 'password.request' && Route::current()->getName() !== 'password.reset')
		<header style="height: 64px;">
			<x-navigation/>
		</header>
	@endif
	<!-- MAIN -->
	<main class="relative">
		@yield('content')
	</main>

<?php /* 
	<ul class="navbar-nav ml-auto">
		<!-- Authentication Links -->
		@guest
			<li class="nav-item">
				<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
			</li>
			@if (Route::current()->getName() == 'register')
				<li class="nav-item">
					<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
				</li>
			@endif
		@else
			<li class="nav-item dropdown">
				<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
					{{ Auth::user()->name }}
				</a>

				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						{{ __('Logout') }}
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</div>
			</li>
		@endguest
	</ul>
*/ ?> 
</body>
</html>

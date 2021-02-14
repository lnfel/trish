<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ __('Admin |') }} {{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
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
	@if (Route::current()->getName() !== 'admin.login' && Route::current()->getName() !== 'admin.register' && Route::current()->getName() !== 'admin.password.request' && Route::current()->getName() !== 'admin.password.reset')
		<header style="height: 64px;">
			<x-navigation/>
		</header>
	@endif
	<!-- MAIN -->
	<main class="relative">
		@yield('content')
	</main>

	<script src="{{ asset('js/landing.js') }}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Angono Baranggay Services</title>

	<!-- Scripts -->
	<script src="{{ asset('js/landing.js') }}" defer></script>
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
	<div class="container mx-auto" style="color: #374151;">
		<img src="{{ asset('img/angono-file-header.png') }}">
		<!-- <p class="text-center text-sm" style="margin-top: .25rem;">REQUEST FORM FOR:</p> -->
		<h1 class="text-3xl text-center mb-2 mt-0" style="color: #ef4444; margin-top: 0px;">{{ $service->name }}</h1>
		<p class="mb-2">This is to certify that <b>{{ $user->name }}</b> is a bonafide resident of Angono. And as such this document be used for the following purpose: <b>{{ $purpose->name }}</b>.</p>
		<p class="mb-2"><b>Note:</b> Any Violation(s) or Illigal act(s) committed by this individual/group will be cause for invalidation of this Document.</p>
		<span class="block py-4">Issued this {{ date_format(now(), 'jS \d\a\y \of F Y') }}</span>
		<!-- <table class="min-w-full divide-y divide-gray-200" style="margin: 2rem;">
			<tbody>
				<tr>
					<td class="px-6 py-4">Full Name:</td>
					<td class="px-6 py-4"></td>
				</tr>
				<tr>
					<td class="px-6 py-4">Street Address:</td>
				</tr>
				<tr>
					<td class="px-6 py-4">Baranggay:</td>
					<td class="px-6 py-4"></td>
					<td class="px-6 py-4">City:</td>
					<td class="px-6 py-4"></td>
				</tr>
				<tr>
					<td class="px-6 py-4">Region:</td>
					<td class="px-6 py-4"></td>
					<td class="px-6 py-4">Postal Code:</td>
					<td class="px-6 py-4"></td>
				</tr>
				<tr>
					<td class="px-6 py-4">Reason for request:</td>
				</tr>
			</tbody>
		</table> -->

		<img src="{{ asset('img/angono-file-footer.png') }}">
	</div>
</body>
</html>
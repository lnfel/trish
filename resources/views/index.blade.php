@extends('layouts.app')

@section('content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0" nonce="Q9BTWUVJ"></script>

<section class="intro relative">
	<div class="intro-bg"></div>
	<!-- <div class="flex justify-between absolute bottom-0">
		<img src="{{ asset('img/angono_hall.png') }}" width="50%">
		<img class="self-center mx-auto" src="{{ asset('img/angono_logo.png') }}" style="height: 250px;">
	</div> -->
</section>

<section class="container mx-auto -mt-80" style="z-index: 9;">
	<!-- <div class="w-full" style="z-index: 9;"> -->
	<div class="backdrop-filter backdrop-blur rounded-lg p-8">
		<!-- <div class="overflow-hidden rounded-lg">
			<img src="{{ asset('img/angono-header.png') }}">
		</div> -->
		<div class="flex items-center justify-center mb-16">
			<h2 class="text-4xl text-gray-800 tracking-wide font-bold">Angono Baranggay Services &#12290;</h2>
		</div>
		<h4 class="text-2xl text-gray-800 my-4">Getting all your required government documents made easy.</h4>
		<ul class="list-decimal text-xl pl-5 space-y-2">
			<li>
				<div class="flex items-center">
					<p>
						<a class="text-blue-500 border-b-2 border-transparent hover:border-blue-500 transition duration-500" href="{{ route('register') }}">Create an account</a> <span>first.</span>
					</p>
					<!-- <a href="{{ route('register') }}" class="px-4 py-1 mr-2 text-sm text-white rounded bg-blue-500 hover:bg-blue-700 ml-2">Register</a> -->
				</div>
			</li>
			<li>Once registered, complete your <a class="text-blue-500 border-b-2 border-transparent hover:border-blue-500 transition duration-500" href="{{ route('client.profile') }}">Profile</a> address and upload a valid id for verification. Once verified you will gain a verified badge and would allow you to request forms and documents through <a class="text-blue-500 border-b-2 border-transparent hover:border-blue-500 transition duration-500" href="{{ route('client.services') }}">Services</a> page.</li>
			<li>More services to come so stay tuned!</li>
			<li>For more details you may contact <a class="text-blue-500 border-b-2 border-transparent hover:border-blue-500 transition duration-500" href="tel:02-6513-355">02-6513-355</a> or <a class="text-blue-500 border-b-2 border-transparent hover:border-blue-500 transition duration-500" href="tel:09758504063">09758504063</a></li>
		</ul>
	</div>
	<!-- </div> -->
</section>

<!-- <section class="mt-80">
	<div class="w-full mt-4 md:mt-0 md:-mt-80" style="z-index: 9;">
		<div class="w-11/12 bg-white mx-auto rounded-lg mb-4 shadow-md p-2">
			<h3 class="rounded-t-lg text-xl bg-blue-400 text-white p-2">Municipality of Angono Facebook</h3>
			<div class="fb-post" data-href="https://www.facebook.com/AngonoRizalOfficial/posts/3731921680227787" data-width="750" data-show-text="true"><blockquote cite="https://www.facebook.com/AngonoRizalOfficial/posts/3731921680227787" class="fb-xfbml-parse-ignore">Posted by <a href="https://www.facebook.com/AngonoRizalOfficial/">Municipality of Angono, Rizal</a> on&nbsp;<a href="https://www.facebook.com/AngonoRizalOfficial/posts/3731921680227787">Saturday, February 27, 2021</a></blockquote></div>
		</div>

		<div class="w-11/12 h-32 bg-white mx-auto rounded-lg shadow-md p-2">
			
		</div>
	</div>
</section> -->
@endsection
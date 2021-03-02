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

<section class="relative md:flex" style="z-index: 9;">
	<div class="w-full md:w-8/12 -mt-80" style="z-index: 9;">
		<div class="w-11/12 bg-white mx-auto rounded-lg min-h-screen shadow-md p-2">
			<div class="overflow-hidden rounded-lg">
				<img src="{{ asset('img/angono-header.png') }}">
			</div>
			<h4 class="text-2xl my-4">Sample title</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</div>
	<div class="w-full md:w-4/12 mt-4 md:mt-0 md:-mt-80" style="z-index: 9;">
		<div class="w-11/12 bg-white mx-auto rounded-lg mb-4 shadow-md p-2">
			<h3 class="rounded-t-lg text-xl bg-blue-400 text-white p-2">Municipality of Angono Facebook</h3>
			<div class="fb-post" data-href="https://www.facebook.com/AngonoRizalOfficial/posts/3731921680227787" data-width="500" data-show-text="true"><blockquote cite="https://www.facebook.com/AngonoRizalOfficial/posts/3731921680227787" class="fb-xfbml-parse-ignore">Posted by <a href="https://www.facebook.com/AngonoRizalOfficial/">Municipality of Angono, Rizal</a> on&nbsp;<a href="https://www.facebook.com/AngonoRizalOfficial/posts/3731921680227787">Saturday, February 27, 2021</a></blockquote></div>
		</div>

		<div class="w-11/12 h-32 bg-white mx-auto rounded-lg shadow-md p-2">
			
		</div>
	</div>
</section>
@endsection
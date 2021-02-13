@extends('layouts.app')

@section('content')
<section class="intro relative">
	<div class="intro-bg"></div>
	<!-- <div class="flex justify-between absolute bottom-0">
		<img src="{{ asset('img/angono_hall.png') }}" width="50%">
		<img class="self-center mx-auto" src="{{ asset('img/angono_logo.png') }}" style="height: 250px;">
	</div> -->
</section>

<section class="relative md:flex" style="z-index: 9;">
	<div class="w-full md:w-3/4 -mt-80" style="z-index: 9;">
		<div class="w-11/12 h-12 bg-white mx-auto rounded-lg min-h-screen shadow-md p-2">
			<div class="h-24 overflow-hidden rounded-lg">
				<img src="https://picsum.photos/id/866/1000/300">
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
	<div class="w-full md:w-1/4 mt-4 md:mt-0 md:-mt-80" style="z-index: 9;">
		<div class="w-11/12 h-32 bg-white mx-auto rounded-lg mb-4 shadow-md">
			
		</div>

		<div class="w-11/12 h-32 bg-white mx-auto rounded-lg shadow-md">
			
		</div>
	</div>
</section>
@endsection
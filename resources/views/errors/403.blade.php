@extends('layouts.app')

@section('content')
<section class="intro relative">
  <div class="intro-bg"></div>
</section>

<div class="container mx-auto px-4 mb-4 -mt-80">
	<div class="relative p-4 backdrop-filter backdrop-blur shadow-md rounded-lg h-64">
		<div class="absolute inset-0 flex items-center justify-center">
			<div>
				<span class="block text-2xl text-gray-800 mb-4">You must verify the account first before making a document request.</span>
				<div class="flex justify-center">
					<a class="px-4 py-2 text-white font-semibold tracking-wide rounded-lg bg-blue-500 hover:bg-blue-400" href="{{ route('client.profile') }}">Update your profile now!</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
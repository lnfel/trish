@extends('layouts.admin-app')

@section('content')
@if (session('status'))
	<div class="relative pt-4 -mb-20 z-10">
		<div class="bg-green-200 px-6 py-4 mx-2 rounded-md text-lg flex items-center mx-auto w-3/4 xl:w-2/4">
			<svg viewBox="0 0 24 24" class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
				<path fill="currentColor" d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z"></path>
			</svg>
			<span class="text-green-800">{{ session('status') }}</span>
		</div>
	</div>
@endif

<section class="intro relative">
  <div class="intro-bg"></div>
</section>

<section class="relative container bg-white shadow-md rounded-lg p-4 mx-auto mb-4 -mt-80" style="z-index: 9;">
	<div class="flex items-center justify-between">
		<h2 class="inline text-3xl border-b-4 border-green-500">Create Service</h2>
		
	</div>

	<form method="post" action="{{ route('services.store') }}" class="mt-4">
		@csrf
		<div class="mb-4">
			<label for="name" class="block text-gray-700 text-md font-bold mb-2 @error('name') is-invalid @enderror">{{ __('Name') }}</label>
      <input id="name" type="text" name="name" class="block shadow appearance-none border rounded py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50" autofocus>
      @error('name')
        <span class="is-invalid" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
		</div>

		<div class="mb-4">
			<label for="description" class="block text-gray-700 text-md font-bold mb-2 @error('description') is-invalid @enderror">{{ __('Description') }}</label>
			<textarea id="description" name="description" class="block shadow appearance-none border rounded py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50" rows="4" cols="50" placeholder="Describe the service..."></textarea>
			@error('description')
        <span class="is-invalid" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
		</div>

		<div class="mb-4">
			<label for="price" class="block text-gray-700 text-md font-bold mb-2 @error('price') is-invalid @enderror">{{ __('Price in pesos') }}</label>
      <input id="price" type="number" name="price" class="block shadow text-right appearance-none border rounded py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50" placeholder="00.00">
      @error('price')
        <span class="is-invalid" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
		</div>

		<div class="flex items-center justify-between mb-6">
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">{{ __('Submit') }}</button>
    </div>
	</form>
</section>
@endsection
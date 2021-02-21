<section x-data="" class="relative container mx-auto px-4 mb-4 -mt-80" style="z-index: 9;">
	<div class="bg-white shadow-md rounded-lg p-4">
		<div class="flex items-center">
			<h2 class="inline text-3xl border-b-4 border-green-500 mr-4">{{ $title }}</h2>
			<ol class="list-none p-0 inline-flex" style="color: #ff6126;">
				<li class="flex items-center">
					<a href="{{ route('admin.dashboard') }}">Dashboard</a>
					<svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
				</li>
				<li class="flex items-center">
					<a href="{{ url('/'.$route) }}">{{ ucfirst($route) }}</a>
					<svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
				</li>
				<li class="flex items-center">
					<span class="text-gray-500">{{ $title }}</span>
				</li>
			</ol>
		</div>

		<form method="post" action="{{ url('/'.$route) }}" class="mt-4" x-cloak>
			@csrf
			@foreach($columns as $column)
				<div class="mb-4">
					<label for="{{ $column['key'] }}" class="block text-gray-700 text-md font-bold mb-2 @error($column['key']) is-invalid @enderror">{{ $column['value'] }}</label>	

					@switch($column['type'])
						@case("text")
							<input id="name" type="text" name="{{ $column['key'] }}" class="block shadow appearance-none border rounded py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50" {{ $column['first'] ?? '' }}>
							@break

						@case("date")
							<x-input.datepicker action="create"/>
							@break

						@case("time")
							<x-input.timepicker action="create"/>
							@break

						@case("number")
							<input id="{{ $column['key'] }}" type="number" name="{{ $column['key'] }}" class="block shadow text-right appearance-none border rounded py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50" placeholder="00.00">
							@break

						@case("textarea")
							<textarea id="{{ $column['key'] }}" name="{{ $column['key'] }}" class="block resize-y w-full md:w-1/4 shadow appearance-none border rounded py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50" rows="4" placeholder="Describe the service..."></textarea>
							@break
					@endswitch

					@error($column['key'])
		        <span class="is-invalid" role="alert">
		          <strong>{{ $message }}</strong>
		        </span>
		      @enderror
				</div>
			@endforeach

			<div class="flex items-center justify-between mb-6">
	      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">{{ __('Submit') }}</button>
	    </div>
		</form>
	</div>
</section>
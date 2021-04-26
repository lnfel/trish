<section class="relative container mx-auto px-4 mb-4 -mt-80" style="z-index: 9;">
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

		<form method="post" action="{{ url('/'.$route.'/'.$model->id) }}" class="mt-4">
			@csrf
			@method('PATCH')
			@foreach($columns as $column)
				<div class="mb-4">
					<label for="{{ $column['key'] }}" class="block text-gray-700 text-md font-bold mb-2 @error($column['key']) is-invalid @enderror">{{ $column['value'] }}</label>

					@switch($column['type'])
						@case("text")
							<input type="text" name="{{ $column['key'] }}" value="{{ $model->name }}" class="block shadow appearance-none border border-blue-400 rounded py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50" {{ $column['first'] ?? '' }}>
							@break

						@case("surname")
							<input type="text" name="{{ $column['key'] }}" value="{{ $model->surname }}" class="block shadow appearance-none border border-blue-400 rounded py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">
							@break

						@case("date")
							<x-input.date-picker action="edit" :model="$model"/>
							@break

						@case("time")
							<x-input.time-picker action="edit" :model="$model"/>
							@break

						@case("number")
							<input id="{{ $column['key'] }}" type="number" name="{{ $column['key'] }}" value="{{ $model->slots_left }}" class="block shadow text-right appearance-none border border-blue-400 rounded py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50" placeholder="00.00">
							@break

						@case("price")
							<input id="{{ $column['key'] }}" type="number" name="{{ $column['key'] }}" value="{{ $model->price }}" class="block shadow text-right appearance-none border border-blue-400 rounded py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50" placeholder="00.00">
							@break

						@case("textarea")
							<textarea id="{{ $column['key'] }}" name="{{ $column['key'] }}" class="block resize-y w-full md:w-1/4 shadow appearance-none border border-blue-400 rounded py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50" rows="4" placeholder="Describe the {{ rtrim($route, 's') }}...">{{ $model->description }}</textarea>
							@break

						@case("select2")
							<x-input.select2 action="edit" :options="$options" :model="$model" />
							@break

						@case('uneditable-text')
							<div class="flex items-center">
								<span class="mr-2">{{ $model->name.' '.$model->surname }}</span>
								@if($model->verified == 1) <i class="fa fa-check text-blue-500"></i> @endif
							</div>
							@break

						@case('address')
							@if($model->address != null)
								<span>{{ $model->address->street_address.' Brgy. '.$model->address->brgy->name.' ' .$model->address->city->name.', '.$model->address->province->name.' '.$model->address->zip_code }}</span>
							@else
								<span class="text-red-500">No address</span>
							@endif
							@break

						@case('email')
							<a class="hover:text-blue-500" href="mailto:{{ $model->email }}">{{ $model->email }}</a>
							@break

						@case('valid_id')
							@if($model->valid_id != null)
								<img class="w-48" src="{{ Storage::disk('image')->url($model->valid_id) }}">
							@else
								<span class="text-red-500">No valid id</span>
							@endif
							@break

						@case('verified')
							<label class="flex items-center space-x-2">
								<input type="checkbox" name="{{ $column['key'] }}" value="1" {{ $model->verified == 1 ? 'checked' : '' }} {{ $model->valid_id != null ? '' : 'disabled' }}>
								<span class="{{ $model->valid_id != null ? '' : 'disabled' }}">Verify user info</span>
							</label>
							@break

					@endswitch

					@error($column['key'])
		        <span class="is-invalid" role="alert">
		          <strong>{{ $message }}</strong>
		        </span>
		      @enderror
				</div>
			@endforeach

			@if($title === 'Edit Requirement')
				<div class="mb-4">
					<label for="" class="block text-gray-700 text-md font-bold mb-2">Current Purposes attached to {{ $model->name }}</label>
					<ul name="purposes[]" class="inline-block shadow appearance-none border border-blue-400 rounded py-3 px-4 pl-8 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 list-disc">
						@forelse($model->purposes as $purpose)
							<li>{{ $purpose->service->name }} {{ $purpose->name }}</li>
						@empty
							<span>No available options</span>
						@endforelse
					</ul>
				</div>

				<div class="mb-4">
					<label for="" class="block text-gray-700 text-md font-bold mb-2">Select purposes for {{ $model->name }}</label>
					<span class="block text-sm text-gray-700 mb-2">To select multiple options "Ctrl + left click" </span>
					<span class="block text-sm text-gray-700 mb-2">For keyboard users "Hold Ctrl then press up or down arrow key to navigate."</span>
					<span class="block text-sm text-gray-700 mb-2">Then press spacebar to select or deselect current highlighted option</span>
					<select name="purposes[]" class="shadow appearance-none border border-blue-400 rounded py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 h-64" multiple>
						@forelse($purposes as $purpose)
							<option value="{{ $purpose->id }}">{{ $purpose->service->name }} {{ $purpose->name }}</option>
						@empty
							<option hidden="">No available options</option>
						@endforelse
					</select>
				</div>
			@endif

			<div class="flex items-center justify-between mb-6">
	      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">{{ __('Submit') }}</button>
	    </div>
		</form>
	</div>
</section>
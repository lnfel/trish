<form method="post" action="{{ route('client.update.identification', auth()->user()->id) }}" enctype="multipart/form-data">
	@csrf
	@method('PATCH')
	<div class="mb-4">
		<label class="block text-gray-700 text-md font-bold mb-2 @error('valid_id') is-invalid @enderror">Valid ID</label>

		@if(Auth::user()->valid_id)
			<img src="{{ Storage::disk('image')->url(Auth::user()->valid_id) }}" class="h-36 p-2">
		@endif

		<input type="file" name="valid_id">
		@error('valid_id')
      <span class="is-invalid pt-2" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
	</div>
	
	<div class="mb-4">
		<label class="block text-gray-700 text-md font-bold mb-2 @error('avatar') is-invalid @enderror">Profile photo</label>

		@if(Auth::user()->avatar)
			<img src="{{ Storage::disk('image')->url(Auth::user()->avatar) }}" class="h-36 p-2">
		@endif

		<input type="file" name="avatar">	
		@error('avatar')
      <span class="is-invalid pt-2" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
	</div>

	<div class="flex items-center justify-between mb-6">
	  <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">{{ __('Upload') }}</button>
	</div>
</form>
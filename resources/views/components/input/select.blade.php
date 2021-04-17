<div>
    <select name="{{ $name }}" class="rounded shadow-md px-4 py-3 leading-none rounded-lg shadow border border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-gray-600 font-medium">
    	<option hidden="">{{ $label }}</option>
    	@forelse($options as $value)
    		<option value="{{ $value->id }}">{{ $value->name }}</option>
    	@empty
    		@if(Route::current()->getName() == 'client.profile')
    			<option hidden="">Select a {{ $parent }} first</option>
    		@else
    			<option hidden="">No data found</option>
    		@endif
    	@endforelse
    </select>
</div>
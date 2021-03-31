<div>
    <select name="{{ $name }}" class="rounded shadow-md px-4 py-3 leading-none rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-gray-600 font-medium">
    	<option hidden="">Select Purpose</option>
    	@forelse($options as $value)
    		<option value="{{ $value->id }}">{{ $value->name }}</option>
    	@empty
    		<option hidden="">No data found</option>
    	@endforelse
    </select>
</div>
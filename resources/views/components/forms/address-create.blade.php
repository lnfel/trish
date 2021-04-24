@props([
	'regions'
])

<form method="post" action="{{ route('client.store.address') }}">
	@csrf
	<div class="flex flex-col lg:flex-row lg:space-x-4">
		<div class="mb-4 flex-1">
			<label for="street_address" class="block text-gray-700 text-md font-bold mb-2 @error('street_address') is-invalid @enderror">{{ __('Street') }}</label>
			<input id="street_address" type="text" class="shadow appearance-none border border-blue-400 rounded-lg shadow-md w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 mb-2" name="street_address" value="{{ old('street_address') }}" autocomplete="street_address">
			@error('street_address')
	          <span class="is-invalid pt-2" role="alert">
	            <strong>{{ $message }}</strong>
	          </span>
	        @enderror
		</div>

		<div class="mb-4">
			<label for="region_code" class="block text-gray-700 text-md font-bold mb-2 @error('region_code') is-invalid @enderror">{{ __('Region') }}</label>
			<select x-on:change="fetchProvinces($refs.region.value)" x-ref="region" name="region_code" class="block rounded shadow-md px-4 py-3 leading-none rounded-lg shadow border border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 mb-2 text-gray-600 font-medium max-w-full">
		    	<option hidden="" value="">Select Region</option>
		    	@forelse($regions as $value)
		    		<option value="{{ $value->region_code }}">{{ $value->name }}</option>
		    	@empty
		    		<option hidden="" value="">No data found</option>
		    	@endforelse
		    </select>
			@error('region_code')
	          <span class="is-invalid pt-2" role="alert">
	            <strong>{{ $message }}</strong>
	          </span>
	        @enderror
		</div>
	</div>
		
	<div class="flex flex-col lg:flex-row lg:space-x-4">
		<div class="mb-4 flex-1">
			<label for="province_code" class="block text-gray-700 text-md font-bold mb-2 @error('province_code') is-invalid @enderror">{{ __('Province') }}</label>
			<select x-on:change="fetchCities($refs.province.value)" x-ref="province" name="province_code" class="block rounded shadow-md px-4 py-3 leading-none rounded-lg shadow border border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 mb-2 text-gray-600 font-medium min-w-full max-w-full">
		    	<option hidden="" value="">Select Province</option>
		    	<template x-for="(province, index) in provinces" :key="index">
		    		<option x-bind:value="province.province_code" x-text="province.name"></option>
		    	</template>
		    	<template x-if="provinces.length == 0">
		    		<option disabled="">Please select a region first</option>
		    	</template>
		    </select>
			@error('province_code')
	          <span class="is-invalid pt-2" role="alert">
	            <strong>{{ $message }}</strong>
	          </span>
	        @enderror
		</div>

		<div class="mb-4 flex-1">
			<label for="city_municipality_code" class="block text-gray-700 text-md font-bold mb-2 @error('city_municipality_code') is-invalid @enderror">{{ __('City / Municipality') }}</label>
			<select x-on:change="fetchBrgys($refs.city_municipality.value)" x-ref="city_municipality" name="city_municipality_code" class="block rounded shadow-md px-4 py-3 leading-none rounded-lg shadow border border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 mb-2 text-gray-600 font-medium min-w-full max-w-full">
		    	<option hidden="" value="">Select City / Municipality</option>
		    	<template x-for="(city, index) in cities" :key="index">
		    		<option x-bind:value="city.city_municipality_code" x-text="city.name"></option>
		    	</template>
		    	<template x-if="cities.length == 0">
		    		<option disabled="">Please select a province first</option>
		    	</template>
		    </select>
			@error('city_municipality_code')
	          <span class="is-invalid pt-2" role="alert">
	            <strong>{{ $message }}</strong>
	          </span>
	        @enderror
		</div>
	</div>

	<div class="flex flex-col lg:flex-row lg:space-x-4">
		<div class="mb-4 flex-1">
			<label for="baranggay_code" class="block text-gray-700 text-md font-bold mb-2 @error('baranggay_code') is-invalid @enderror">{{ __('Baranggay') }}</label>
			<select x-ref="brgy" name="baranggay_code" class="block rounded shadow-md px-4 py-3 leading-none rounded-lg shadow border border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 mb-2 text-gray-600 font-medium min-w-full max-w-full">
		    	<option hidden="" value="">Select Baranggay</option>
		    	<template x-for="(brgy, index) in brgys" :key="index">
		    		<option x-bind:value="brgy.baranggay_code" x-text="brgy.name"></option>
		    	</template>
		    	<template x-if="brgys.length == 0">
		    		<option disabled="">Please select a city first</option>
		    	</template>
		    </select>
			@error('baranggay_code')
	          <span class="is-invalid pt-2" role="alert">
	            <strong>{{ $message }}</strong>
	          </span>
	        @enderror
		</div>

		<div class="mb-4 flex-1">
			<label for="zip_code" class="block text-gray-700 text-md font-bold mb-2 @error('zip_code') is-invalid @enderror">{{ __('Zip Code') }}</label>
			<input id="zip_code" type="text" class="shadow appearance-none border border-blue-400 rounded-lg shadow-md w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 mb-2" name="zip_code" value="{{ old('zip_code') }}" autocomplete="zip_code">
			@error('zip_code')
	          <span class="is-invalid pt-2" role="alert">
	            <strong>{{ $message }}</strong>
	          </span>
	        @enderror
		</div>
	</div>

	<div class="flex items-center justify-between mb-6">
	  <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">{{ __('Save Address') }}</button>
	</div>
</form>
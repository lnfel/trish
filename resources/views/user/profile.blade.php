@extends('layouts.app')

@section('content')
<section class="intro relative">
  <div class="intro-bg"></div>
</section>

<section
	x-data="profile()"
	x-init="[
		login(),
		$watch(
			'form.region_code',
			() => { 
				fetchProvinces(form.region_code);
			},

		),
		$watch(
			'form.province_code',
			() => { 
				fetchCities(form.province_code);
			}
		),
		$watch(
			'form.city_municipality_code',
			() => { 
				fetchBrgys(form.city_municipality_code);
			}
		),
	]"
	class="relative container mx-auto px-4 -mt-80 mb-10">
	<div class="p-4 backdrop-filter backdrop-blur shadow-md rounded-lg">
		<div class="flex flex-col space-y-4">
			<div class="flex items-center">
				<img class="w-24 h-24 rounded-full overflow-hidden border border-gray-300 shadow mr-2" src="{{ Storage::disk('image')->url(Auth::user()->avatar) }}">
				<div>
					<div class="text-2xl text-gray-700 font-medium">{{ Auth::user()->name }} {{ Auth::user()->surname }}</div>
					@if(Auth::user()->verified)
						<div class="text-blue-500">Verified <i class="fas fa-check"></i></div>
					@else
						<div class="text-gray-400">Unverified <i class="fas fa-check"></i></div>
					@endif
				</div>
			</div>

			<div>
				<h3 class="text-xl font-bold text-gray-700 mb-4">Address</h3>
				<form method="post" action="{{ route('client.store.address') }}">
					@csrf
					<div class="mb-4">
						<label for="street_address" class="block text-gray-700 text-md font-bold mb-2 @error('street_address') is-invalid @enderror">{{ __('Street') }}</label>
						<input id="street_address" type="text" class="shadow appearance-none border border-blue-400 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50" name="street_address" value="{{ old('street_address') }}" required autocomplete="street_address">
						@error('street_address')
				          <span class="is-invalid" role="alert">
				            <strong>{{ $message }}</strong>
				          </span>
				        @enderror
					</div>

					<div class="mb-4">
						<label for="region_code" class="block text-gray-700 text-md font-bold mb-2 @error('region_code') is-invalid @enderror">{{ __('Region') }}</label>
						<select x-on:change="fetchProvinces($refs.region.value)" x-ref="region" name="region_code" class="rounded shadow-md px-4 py-3 leading-none rounded-lg shadow border border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-gray-600 font-medium">
					    	<option hidden="">Select Region</option>
					    	@forelse($regions as $value)
					    		<option value="{{ $value->region_code }}">{{ $value->name }}</option>
					    	@empty
					    		<option hidden="">No data found</option>
					    	@endforelse
					    </select>
						@error('region_code')
				          <span class="is-invalid" role="alert">
				            <strong>{{ $message }}</strong>
				          </span>
				        @enderror
					</div>

					<div class="mb-4">
						<label for="province_code" class="block text-gray-700 text-md font-bold mb-2 @error('province_code') is-invalid @enderror">{{ __('Province') }}</label>
						<select x-on:change="fetchCities($refs.province.value)" x-ref="province" name="province_code" class="rounded shadow-md px-4 py-3 leading-none rounded-lg shadow border border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-gray-600 font-medium">
					    	<option hidden="">Select Province</option>
					    	<template x-for="(province, index) in provinces" :key="index">
					    		<option x-bind:value="province.province_code" x-text="province.name"></option>
					    	</template>
					    	<template x-if="provinces.length == 0">
					    		<option disabled="">Please select a region first</option>
					    	</template>
					    </select>
						@error('province_code')
				          <span class="is-invalid" role="alert">
				            <strong>{{ $message }}</strong>
				          </span>
				        @enderror
					</div>

					<div class="mb-4">
						<label for="city_municipality_code" class="block text-gray-700 text-md font-bold mb-2 @error('city_municipality_code') is-invalid @enderror">{{ __('City / Municipality') }}</label>
						<select x-on:change="fetchBrgys($refs.city_municipality.value)" x-ref="city_municipality" name="city_municipality_code" class="rounded shadow-md px-4 py-3 leading-none rounded-lg shadow border border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-gray-600 font-medium">
					    	<option hidden="">Select City / Municipality</option>
					    	<template x-for="(city, index) in cities" :key="index">
					    		<option x-bind:value="city.city_municipality_code" x-text="city.name"></option>
					    	</template>
					    	<template x-if="cities.length == 0">
					    		<option disabled="">Please select a province first</option>
					    	</template>
					    </select>
						@error('city_municipality_code')
				          <span class="is-invalid" role="alert">
				            <strong>{{ $message }}</strong>
				          </span>
				        @enderror
					</div>

					<div class="mb-4">
						<label for="baranggay_code" class="block text-gray-700 text-md font-bold mb-2 @error('baranggay_code') is-invalid @enderror">{{ __('Baranggay') }}</label>
						<select x-ref="brgy" name="baranggay_code" class="rounded shadow-md px-4 py-3 leading-none rounded-lg shadow border border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-gray-600 font-medium">
					    	<option hidden="">Select Baranggay</option>
					    	<template x-for="(brgy, index) in brgys" :key="index">
					    		<option x-bind:value="brgy.baranggay_code" x-text="brgy.name"></option>
					    	</template>
					    	<template x-if="brgys.length == 0">
					    		<option disabled="">Please select a city first</option>
					    	</template>
					    </select>
						@error('baranggay_code')
				          <span class="is-invalid" role="alert">
				            <strong>{{ $message }}</strong>
				          </span>
				        @enderror
					</div>

					<div class="flex items-center justify-between mb-6">
					  <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">{{ __('Save Address') }}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<script>
	function profile() {
		return {
			isLoggedIn: false,
			provinces: [],
			cities: [],
			brgys: [],
			form: {
				region_code: '',
				province_code: '',
				city_municipality_code: '',
				baranggay_code: '',
			},
			login() {
				fetch('http://localhost/api/login', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json'
					},
					body: JSON.stringify({username: '{!! Auth::user()->email !!}', password: 'password'}),
				})
				.then(response => response.json())
				.then(data => {
				  console.log('Success:', data);
				  this.isLoggedIn = true;
				})
				.catch((error) => {
				  console.error('Error:', error);
				});
			},
			fetchProvinces(code) {
				if (code < 10) {
					//code = `0${code}`;
					//console.log(code);
				}
				fetch(`http://localhost/api/regions/${code}/provinces`, {
					method: 'GET',
				})
				.then(response => response.json())
				.then(data => {
				  console.log('Success:', data.data);
				  this.provinces = data.data;
				})
				.catch((error) => {
				  console.error('Error:', error);
				});
			},
			fetchCities(code) {
				if (code < 459) {
					//code = `0${code}`;
					//console.log(code);
				}
				fetch(`http://localhost/api/provinces/${code}/cities`, {
					method: 'GET',
				})
				.then(response => response.json())
				.then(data => {
				  console.log('Success:', data.data);
				  this.cities = data.data;
				})
				.catch((error) => {
				  console.error('Error:', error);
				});
			},
			fetchBrgys(code){
				if (code < 99702) {
					//code = `0${code}`;
					//console.log(code);
				}
				fetch(`http://localhost/api/cities/${code}/brgys`, {
					method: 'GET',
				})
				.then(response => response.json())
				.then(data => {
				  console.log('Success:', data.data);
				  this.brgys = data.data;
				})
				.catch((error) => {
				  console.error('Error:', error);
				});
			}
		}
	}
</script>
@endsection
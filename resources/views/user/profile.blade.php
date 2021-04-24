@extends('layouts.app')

@section('content')
@if (session('status'))
	<x-flash.alert :status="session('status')"/>
@endif

<section class="intro relative">
  <div class="intro-bg"></div>
</section>

<section
	x-data="profile()"
	x-init="[
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
				<img class="w-24 h-24 rounded-full overflow-hidden border border-gray-300 shadow mr-4" src="{{ Storage::disk('image')->url(Auth::user()->avatar) }}">
				<div>
					<div class="text-2xl text-gray-800 font-medium">{{ Auth::user()->name }} {{ Auth::user()->surname }}</div>
					@if(Auth::user()->verified)
						<div class="text-blue-500 font-medium">Verified <i class="fas fa-check"></i></div>
					@else
						<div class="text-red-500 font-medium">Unverified <i class="fas fa-times"></i></div>
					@endif
				</div>
			</div>

			<div class="mb-4">
				<h3 class="text-xl font-bold text-gray-700 mb-4">Address</h3>
				@if($user->address != null)
					<x-forms.address-edit :regions="$regions" :user="$user" />
				@else
					<x-forms.address-create :regions="$regions" />
				@endif
			</div>

			<div class="mb-4">
				<h3 class="text-xl font-bold text-gray-700 mb-4">Identification</h3>
					<x-forms.identification-create />
			</div>
		</div>
	</div>
</section>

<script>
	function profile() {
		return {
			isLoggedIn: false,
			region_code: '{!! $user->address->region_code ?? '' !!}',
			province_code: '{!! $user->address->province_code ?? '' !!}',
			city_municipality_code: '{!! $user->address->city_municipality_code ?? '' !!}',
			baranggay_code: '{!! $user->address->baranggay_code ?? '' !!}',
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
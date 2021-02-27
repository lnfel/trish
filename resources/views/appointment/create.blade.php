@extends('layouts.admin-app')

@section('content')
@if (session('status'))
	<x-flash.alert :status="session('status')"/>
@endif

<section class="intro relative">
  <div class="intro-bg"></div>
</section>

{{-- <x-service.create route="appointments" title="Create Appointment" :columns="$columns"/> --}}

<section class="relative container mx-auto px-4 mb-4 -mt-80" style="z-index: 9;">
	<div class="bg-white shadow-md rounded-lg p-4">
		<div class="flex items-center">
			<h2 class="inline text-3xl border-b-4 border-green-500 mr-4">Create Appointment</h2>
			<ol class="list-none p-0 inline-flex" style="color: #ff6126;">
				<li class="flex items-center">
					<a href="{{ route('client.index') }}">Home</a>
					<svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
				</li>
				<li class="flex items-center">
					<a href="{{ route('client.services') }}">Services</a>
					<svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
				</li>
				<li class="flex items-center">
					<span class="text-gray-500">Create Appointment</span>
				</li>
			</ol>
		</div>
		<!-- @submit.prevent="submit" -->
		<form x-data="slots()"
			x-init="[
				debug(),
				$watch(
					'form.date',
					() => { 
						fetchTimes(form.date);
					}
				)
			]"
			method="get" action="{{ route('appointments.store') }}" class="mt-4">
			@csrf
			<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
			<div class="mb-4">
				<label for="service" class="inline-block text-gray-700 text-md font-bold mb-2 @error('service') is-invalid @enderror">Service</label>
				<div class="w-64">
					<div class="relative">
						<input type="hidden" name="service" x-ref="service" value="{{ $service->id ?? '' }}">
						<input
							type="text"
							readonly
							x-model="serviceValue"
							@click="showServicepicker = !showServicepicker"
							@keydown.escape="showServicepicker = false"
							id="service"
							class="w-full pl-4 pr-10 py-3 leading-none rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-gray-600 font-medium"
							placeholder="Select Service">	

						<div class="absolute top-0 right-0 px-3 py-2">
	            <i class="relative h-6 w-6 far fa-file text-gray-400 text-xl"></i>
	          </div>

	          <div
	          	class="w-full bg-white mt-12 rounded-lg shadow absolute top-0 left-0 overflow-hidden z-10"
	          	x-show.transition="showServicepicker"
	          	@click.away="showServicepicker = false">
	          	<div class="flex flex-col items-base">
	          		<template x-for="(service, index) in services" :key="index">
	          			<div 
	          				@click="{$refs.service.value = service.id, serviceValue = service.name, servicepickerValue = service.name, showServicepicker = false}"
	          				x-text="service.name"
	          				class="cursor-pointer text-sm leading-none leading-loose transition ease-in-out duration-100 px-2 hover:bg-blue-500 hover:text-white">
									</div>
	          		</template>
	          	</div>
	          </div>
					</div>
				</div>
			</div>

			<div class="mb-4">
				<label for="date" class="inline-block text-gray-700 text-md font-bold mb-2 @error('date') is-invalid @enderror">Date</label>
				<div class="w-64">
					<div class="relative">
						<input type="hidden" name="date" x-ref="date">
						<input
							type="text"
							readonly
							x-model="datepickerValue"
							@click="showDatepicker = !showDatepicker"
							@keydown.escape="showDatepicker = false"
							id="date"
							class="w-full pl-4 pr-10 py-3 leading-none rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-gray-600 font-medium" placeholder="Select Date">	

						<div class="absolute top-0 right-0 px-3 py-2">
	            <svg class="h-6 w-6 text-gray-400"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
	              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
	            </svg>
	          </div>

	          <div
	          	class="w-full bg-white mt-12 rounded-lg shadow absolute top-0 left-0 overflow-hidden z-10"
	          	x-show.transition="showDatepicker"
	          	@click.away="showDatepicker = false">
	          	<div class="flex flex-col items-base">
	          		<template x-for="(slot, index) in slots" :key="index">
	          			<div 
	          				@click="{$refs.date.value = slot.date, datepickerValue = new Date(slot.date).toDateString(), form.date = slot.date, $dispatch('inputchange'), showDatepicker = false}"
	          				x-text="new Date(slot.date).toDateString()"
	          				class="cursor-pointer text-sm leading-none leading-loose transition ease-in-out duration-100 px-2 hover:bg-blue-500 hover:text-white">
									</div>
	          		</template>
	          	</div>
	          </div>
					</div>
				</div>
			</div>

			<template x-if="form.date">
				<div class="mb-4">
					<label for="time" class="inline-block text-gray-700 text-md font-bold mb-2 @error('time') is-invalid @enderror">Time</label>
					<div class="w-64">
						<div class="relative">
							<input type="hidden" name="time" x-ref="time">
							<input
								type="text"
								readonly
								x-bind:value="timepickerValue"
								@click="showTimepicker = !showTimepicker"
								@keydown.escape="showTimepicker = false"
								id="time"
								class="w-full pl-4 pr-10 py-3 leading-none rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-gray-600 font-medium" placeholder="Select Time">	

							<div class="absolute top-0 right-0 px-3 py-2">
		            <i class="relative h-6 w-6 far fa-clock text-gray-400 text-xl"></i>
		          </div>

		          <div
		          	class="w-full bg-white mt-12 rounded-lg shadow absolute top-0 left-0 overflow-hidden z-10"
		          	x-show.transition="showTimepicker"
		          	@click.away="showTimepicker = false">
		          	<div class="flex flex-col items-base">
		          		<template x-for="(slot, timeIndex) in availableTimeSlots" :key="timeIndex">
		          			<div 
		          				@click="{$refs.time.value = slot.time, timepickerValue = new Date(`2021-02-28 ${slot.time}`).toLocaleTimeString('en-US', {hour: '2-digit', minute: '2-digit', hour12: true}), showTimepicker = false}"
		          				x-text="new Date(`2021-02-28 ${slot.time}`).toLocaleTimeString('en-US', {hour: '2-digit', minute: '2-digit', hour12: true})"
		          				class="cursor-pointer text-sm leading-none leading-loose transition ease-in-out duration-100 px-2 hover:bg-blue-500 hover:text-white">
										</div>
		          		</template>
		          	</div>
		          </div>
						</div>
					</div>
				</div>
			</template>

			<div class="flex items-center justify-between mb-6">
	      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">{{ __('Submit') }}</button>
	    </div>
		</form>
		
	</div>
</section>

<script>
	//@inputchange.window="alert($event.detail)"
	window.inputchange = data => window.dispatchEvent(new CustomEvent('inputchange', function(data) {
		alert(data);
	}));
	
	function slots() {
		return {
			isLoading: false,
			isLoggedIn: false,
			showDatepicker: false,
			showTimepicker: false,
			showServicepicker: false,
			datepickerValue: '',
			timepickerValue: '',
			serviceValue: '{!! $service->name ?? "" !!}',
			services: {!! $services !!},
			slots: {!! $slots !!},
			availableTimeSlots: [],
			availableDates: [],
			form: {
				date: ''
			},
			debug() {
				//console.log(this.slots);
			},
			login() {
				fetch('http://localhost/api/login', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json'
					},
					body: JSON.stringify({username: 'succman@usa.com', password: '12345678'}),
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
			fetchDates() {
				fetch('http://localhost/api/all-slot-dates', {
					method: 'GET',
				})
				.then(response => response.json())
				.then(data => {
				  console.log('Success:', data.data);
				  this.availableDates = this.availableDates.concat(data.data);
				})
				.catch((error) => {
				  console.error('Error:', error);
				});
			},
			fetchTimes(selectedDate) {
				fetch(`http://localhost/api/all-slot-date-times/${selectedDate}`, {
					method: 'GET',
				})
				.then(response => response.json())
				.then(data => {
				  console.log('Success:', data.data);
				  this.availableTimeSlots = data.data;
				})
				.catch((error) => {
				  console.error('Error:', error);
				});
			},
			submit() {
				fetch('http://localhost:8000/api/slots', {
					method: 'GET',
					headers: {
						'Content-Type': 'application/json',
						'Accept': 'application/json'
					}
				})
				.then(response => response)
				.then(data => this.availableTimeSlots = data);
			}
		}
	}
</script>
@endsection
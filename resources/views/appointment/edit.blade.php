@extends('layouts.app')

@section('content')
@if (session('status'))
	<x-flash.alert :status="session('status')"/>
@endif
@if (session('error'))
	<x-flash.alert :status="session('error')" bg="bg-red-200" textColor="text-red-800"/>
@endif

<section class="intro relative">
  <div class="intro-bg"></div>
</section>

<section class="relative container mx-auto px-4 mb-4 -mt-80" style="z-index: 9;">
	<div class="bg-white shadow-md rounded-lg p-4">
		<div class="flex items-center">
			<h2 class="inline text-3xl border-b-4 border-green-500 mr-4">Edit Appointment</h2>
			<ol class="list-none p-0 inline-flex" style="color: #ff6126;">
				<li class="flex items-center">
					<a href="{{ route('client.index') }}">Home</a>
					<svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
				</li>
				<li class="flex items-center">
					<a href="{{ route('appointments.index') }}">My Appointments</a>
					<svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
				</li>
				<li class="flex items-center">
					<span class="text-gray-500">Edit Appointment</span>
				</li>
			</ol>
		</div>

		<form x-data="format()" method="post" action="{{ route('appointments.update', $appointment->id) }}" class="mt-4">
			@csrf
			@method('PATCH')
			<div class="mb-4">
				<label class="inline-block text-gray-500 text-md font-medium mb-2">Client</label>
				<p class="text-lg">{{ $appointment->user->name }}</p>
			</div>
			<div class="mb-4">
				<label class="inline-block text-gray-500 text-md font-medium mb-2">Service requested</label>
				<p class="text-lg">{{ $appointment->service->name }}</p>
			</div>
			<div class="mb-4">
				<label class="inline-block text-gray-500 text-md font-medium mb-2">Purpose of request</label>
				<p class="text-lg">{{ $appointment->purpose->name }}</p>
			</div>
			<div class="mb-4">
				<label class="inline-block text-gray-500 text-md font-medium mb-2">Appointment details</label>
				<p class="text-lg"><span x-text="new Date(date).toDateString()"></span> <span class="text-gray-500">at </span><span x-text="new Date(`2021-02-28 ${time}`).toLocaleTimeString('en-US', {hour: '2-digit', minute: '2-digit', hour12: true})"></span></p>
			</div>

			<!-- <div class="mb-4">
				<label for="paid" class="inline-block text-gray-500 text-md font-medium mb-2">Payment</label>
				<div class="w-64">
					<div class="relative">
						<input type="hidden" name="paid" x-ref="paid" value="{{ $appointment->paid == 0 ? 'Unpaid' : 'Paid' }}">
						<input
							type="text"
							readonly
							x-model="paidpickerValue"
							@click="showPaidpicker = !showPaidpicker"
							@keydown.escape="showPaidpicker = false"
							id="paid"
							class="w-full pl-4 pr-10 py-3 leading-none rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-gray-600 font-medium" placeholder="Paid?">

						<div class="absolute top-0 right-0 px-3 py-2">
	            <i class="relative h-6 w-6 fas fa-chevron-down text-gray-400 text-xl"></i>
	          </div>

	          <div
	          	class="w-full bg-white mt-12 rounded-lg shadow absolute top-0 left-0 overflow-hidden z-10"
	          	x-show.transition="showPaidpicker"
	          	@click.away="showPaidpicker = false">
	          	<div class="flex flex-col items-base">
	          		<template x-for="(status, index) in paid" :key="index">
	          			<div 
	          				@click="{$refs.paid.value = 1, paidpickerValue = status, showPaidpicker = false}"
	          				x-text="status"
	          				class="cursor-pointer text-sm leading-none leading-loose transition ease-in-out duration-100 px-2 hover:bg-blue-500 hover:text-white">
									</div>
	          		</template>
	          	</div>
	          </div>
					</div>
				</div>
				@error('paid')
	        <span class="is-invalid" role="alert">
	          <strong>{{ $message }}</strong>
	        </span>
	      @enderror
			</div> -->

			@if($appointment->status === 'Pending')
				<div class="mb-4">
					<label for="status" class="inline-block text-gray-500 text-md font-medium mb-2">Status</label>
					<div class="w-64">
						<div class="relative">
							<input type="hidden" name="status" x-ref="status" value="{{ $appointment->status }}">
							<input
								type="text"
								readonly
								x-model="statuspickerValue"
								@click="showStatuspicker = !showStatuspicker"
								@keydown.escape="showStatuspicker = false"
								id="status"
								class="w-full pl-4 pr-10 py-3 leading-none rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-gray-600 font-medium cursor-pointer" placeholder="Select Status">

							<div class="absolute top-0 right-0 px-3 py-2">
		            <i class="relative h-6 w-6 fas fa-chevron-down text-gray-400 text-xl"></i>
		          </div>

		          <div
		          	class="w-full bg-white mt-12 rounded-lg shadow absolute top-0 left-0 overflow-hidden z-10"
		          	x-show.transition="showStatuspicker"
		          	@click.away="showStatuspicker = false">
		          	<div class="flex flex-col items-base">
		          		<template x-for="(status, index) in statuses" :key="index">
		          			<div 
		          				@click="{$refs.status.value = status, statuspickerValue = status, showStatuspicker = false}"
		          				x-text="status"
		          				class="cursor-pointer text-sm leading-none leading-loose transition ease-in-out duration-100 px-2 hover:bg-blue-500 hover:text-white">
										</div>
		          		</template>
		          	</div>
		          </div>
						</div>
					</div>
					@error('status')
		        <span class="is-invalid" role="alert">
		          <strong>{{ $message }}</strong>
		        </span>
		      @enderror
				</div>

				<div class="flex items-center justify-between mb-6">
		      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">{{ __('Update') }}</button>
		    </div>
			@elseif($appointment->status === 'Complete')
				<div class="mb-4">
					<label for="status" class="inline-block text-gray-500 text-md font-medium mb-2">Status</label>
					<p class="text-lg text-green-500 font-medium">Complete</p>
				</div>

				<div class="flex items-center justify-between mb-6">
		      <a href="{{ route('appointments.create', '') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">{{ __('Renew') }}</a>
		    </div>
		  @else
		  	<div class="mb-4">
					<label for="status" class="inline-block text-gray-500 text-md font-medium mb-2">Status</label>
					<p class="text-lg text-red-500 font-medium">Cancelled</p>
				</div>

				<div class="flex items-center justify-between mb-6">
		      <a href="{{ route('appointments.create', '') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">{{ __('Set an appointment') }}</a>
		    </div>
			@endif
		</form>
	</div>
</section>

<script>
	function format() {
		return {
			paidpickerValue: '{!! $appointment->paid == 0 ? "Unpaid" : "Paid" !!}',
			statuspickerValue: '{!! $appointment->status !!}',
			showStatuspicker: false,
			showPaidpicker: false,
			statuses: [
			'Cancel',
			],
			paid: [
			'Paid',
			],
			date: '{!! $appointment->slot->date !!}',
			time: '{!! $appointment->slot->time !!}',
		}
	}
</script>

@endsection
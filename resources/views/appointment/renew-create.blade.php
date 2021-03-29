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
			<h2 class="inline text-3xl border-b-4 border-green-500 mr-4">Renew Document</h2>
			<ol class="list-none p-0 inline-flex" style="color: #ff6126;">
				<li class="flex items-center">
					<a href="{{ route('client.index') }}">Home</a>
					<svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
				</li>
				<li class="flex items-center">
					<span class="text-gray-500">Renew Document</span>
				</li>
			</ol>
		</div>

		<form x-data="data()" method="post" action="{{ route('appointments.renew.download') }}" class="mt-4">
			@csrf
			<input type="hidden" name="service_id" value="{{ $service->id }}">
			<input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
			<div class="mb-4">
				<label class="inline-block text-gray-500 text-md font-medium mb-2">Service</label>
				<p class="text-lg">{{ $service->name }}</p>

			</div>

			<div class="mb-4">
					<label for="purpose" class="inline-block text-gray-500 text-md font-medium mb-2 @error('purpose_id') is-invalid @enderror">Purpose</label>
					<div class="w-64">
						<div class="relative">
							<input type="hidden" name="purpose_id" x-ref="purpose">
							<input
								type="text"
								readonly
								x-model="purposePickerValue"
								@click="showPurposePicker = !showPurposePicker"
								@keydown.escape="showPurposePicker = false"
								id="purpose"
								class="w-full pl-4 pr-10 py-3 leading-none rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-gray-600 font-medium cursor-pointer" placeholder="Select Purpose">

							<div class="absolute top-0 right-0 px-3 py-2">
		            <i class="relative h-6 w-6 fas fa-chevron-down text-gray-400 text-xl"></i>
		          </div>

		          <div
		          	class="w-full bg-white mt-12 rounded-lg shadow absolute top-0 left-0 overflow-hidden z-10"
		          	x-show.transition="showPurposePicker"
		          	@click.away="showPurposePicker = false">
		          	<div class="flex flex-col items-base">
		          		<template x-for="(purpose, index) in purposes" :key="index">
		          			<div 
		          				@click="{$refs.purpose.value = purpose.id, purposePickerValue = purpose.name, showPurposePicker = false}"
		          				x-text="purpose.name"
		          				class="cursor-pointer text-sm leading-none leading-loose transition ease-in-out duration-100 px-2 hover:bg-blue-500 hover:text-white">
										</div>
		          		</template>
		          	</div>
		          </div>
						</div>
					</div>
					@error('purpose_id')
		        <span class="is-invalid" role="alert">
		          <strong>{{ $message }}</strong>
		        </span>
		      @enderror
				</div>

				<div class="flex items-center justify-between mb-6">
		      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">{{ __('Renew') }}</button>
		    </div>
		</form>

	</div>
</section>

<script>
	function data() {
		return {
			purposePickerValue: '',
			showPurposePicker: false,
			purposes: {!! $service->purposes !!},
		}
	}
</script>
@endsection
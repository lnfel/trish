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

<section class="relative container mx-auto px-4 -mt-80 mb-10">
	<div class="p-4 bg-white shadow-md rounded-lg">
		<div class="flex items-center mb-4">
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

    <article class="mb-4 text-gray-700">
    	<p>Previously completed document requests can be processed for renewal in this page.</p>
    	<p>If you don't have any previously completed document request please proceed to <a href="{{  url('/appointments/create') }}" class="text-blue-400 hover:text-blue-600 hover:underline">request for an Appointment</a>.</p>
    </article>

    <div class="flex flex-col">
    	<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    		<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
    			<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
				    <table class="min-w-full divide-y divide-gray-200">
						  <thead class="bg-blue-400">
						    <tr>
						      <th scope="col" class="px-6 py-3 text-left font-medium text-white uppercase tracking-wider">Document</th>
						      <th scope="col" class="px-6 py-3 text-left font-medium text-white uppercase tracking-wider">
						      	Status
						      	<span class="sr-only">Status</span>
						      </th>
						      <th scope="col" class="relative px-6 py-3 text-left font-medium text-white uppercase tracking-wider">
						      	Renew
						      	<span class="sr-only">Renew</span>
						      </th>
						    </tr>
						  </thead>
						  <tbody class="bg-white divide-y divide-gray-200">

						  	@forelse($appointments as $item)
							    <tr>
							      <td class="px-6 py-4 whitespace-nowrap">{{ $item['service']['name']  }}</td>
							      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
							      	{{ __('Issued ') }}
							      	{{ \Carbon\Carbon::createFromTimeStamp(strtotime($item['updated_at']))->diffInDays().' days ago' }}
							      	{{ 'on '.date_format(\Carbon\Carbon::createFromTimeStamp(strtotime($item['updated_at'])), 'D M d, Y') }}
							      </td>
							      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
							      	<a href="{{ route('appointments.renew.create', $item['id']) }}" class="text-blue-400 hover:text-blue-600 hover:underline">Renew now</a>
							      </td>
							    </tr>
						    @empty
						    	<tr>
						    		<td colspan="3">
						    			<span class="flex flex-col py-8">
						    				<span class="flex items-center justify-center mb-4">
						    					Nothing to renew at the moment.
						    					@if($pendingCount > 0)
							    					<span class="ml-2">You still have ({{ $pendingCount }}) pending <a class="text-blue-500 border-b-2 border-transparent hover:border-blue-500" href="{{ route('appointments.index') }}">appointment(s)</a>.</span>
							    				@endif
						    				</span>
						    				<span class="flex items-center justify-center">
						    					<a href="{{  url('/appointments/create') }}" class="px-4 py-2 text-white bg-blue-400 rounded-lg hover:bg-blue-600">Request for another document.</a>
						    				</span>
						    			</span>
						    		</td>
						    	</tr>
						    @endforelse

						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
@endsection
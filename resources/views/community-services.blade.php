@extends('layouts.admin-app')

@section('content')
@if (session('status'))
	
@endif

<section class="intro relative">
  <div class="intro-bg"></div>
</section>

<section class="relative container mx-auto px-4 -mt-80 mb-10">
	<div class="p-4 bg-white shadow-md rounded-lg">
		<div class="flex items-center mb-4">
      <h2 class="inline text-3xl border-b-4 border-green-500 mr-4">Services</h2>
      <ol class="list-none p-0 inline-flex" style="color: #ff6126;">
				<li class="flex items-center">
					<a href="{{ route('client.index') }}">Home</a>
					<svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
				</li>
				<li class="flex items-center">
					<span class="text-gray-500">Services</span>
				</li>
			</ol>
    </div>

    <article class="mb-4 text-gray-700">
    	<p>Please <b>Download the corresponding form</b> before requesting for an appointment. <b>Fill up the downloaded form and bring required documents</b> before going to your respective baranggay hall on the date of your appointment.</p>
    </article>

    <div class="flex flex-col">
    	<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    		<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
    			<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
				    <table class="min-w-full divide-y divide-gray-200">
						  <thead class="bg-blue-400">
						    <tr>
						      <th scope="col" class="px-6 py-3 text-left font-medium text-white uppercase tracking-wider">Service</th>
						      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
						      	<span class="sr-only">Request appointment</span>
						      </th>
						      <th scope="col" class="relative px-6 py-3">
						      	<span class="sr-only">Download</span>
						      </th>
						    </tr>
						  </thead>
						  <tbody class="bg-white divide-y divide-gray-200">
						  	@forelse($services as $service)
						    <tr>
						      <td class="px-6 py-4 whitespace-nowrap">{{ $service->name }}</td>
						      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
						      	<a href="{{ route('appointments.create', $service->id) }}" class="text-blue-400 hover:text-blue-600 hover:underline">Request appointment</a>
						      </td>
						      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
						      	<a href="{{ route('pdf.download', $service->id) }}" class="text-blue-400 hover:text-blue-600 hover:underline">Download</a>
						      </td>
						    </tr>
						    @empty
						    <tr>
		              <td colspan="100%">
		                <span class="text-gray-400 font-medium py-8 flex items-center justify-center"><i class="fas fa-inbox text-2xl mr-2"></i> No Available data</span>
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
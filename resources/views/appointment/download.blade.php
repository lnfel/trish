@extends('layouts.app')

@section('content')
<section class="intro relative">
  <div class="intro-bg"></div>
</section>

<section class="relative container mx-auto px-4 -mt-80 mb-10">
	<div class="p-4 bg-white shadow-md rounded-lg">
		<div class="flex items-center mb-4">
			<h2 class="inline text-3xl border-b-4 border-green-500 mr-4">Document Download</h2>
			<ol class="list-none p-0 inline-flex" style="color: #ff6126;">
				<li class="flex items-center">
					<a href="{{ route('client.index') }}">Home</a>
					<svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
				</li>
				<li class="flex items-center">
					<span class="text-gray-500">Document Download</span>
				</li>
			</ol>
		</div>

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
										Download
										<span class="sr-only">Download</span>
									</th>
								</tr>
							</thead>

							<tbody class="bg-white divide-y divide-gray-200">
								@forelse($docs as $item)
									<tr>
										<td class="px-6 py-4 whitespace-nowrap">{{ $item->service->name  }}</td>
										@if($item->status == 'Pending')
											<td class="px-6 py-4 whitespace-nowrap text-red-500">{{ $item->status  }}</td>
										@else
											<td class="px-6 py-4 whitespace-nowrap text-green-500">{{ $item->status  }}</td>
										@endif
										<td class="px-6 py-4 whitespace-nowrap">
											
										</td>
									</tr>
								@empty
									<tr>
						    			<td colspan="3">
						    				<span class="flex flex-col py-8">
						    					<span class="flex items-center justify-center mb-4">
						    						You have no requested document(s) yet.
						    					</span>
						    					<span class="flex items-center justify-center">
						    						<a href="{{  url('/appointments/create') }}" class="px-4 py-2 text-white bg-blue-400 rounded-lg hover:bg-blue-600">Request a document.</a>
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
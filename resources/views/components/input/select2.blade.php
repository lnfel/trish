<div class="antialiased sans-serif">
	<div x-data="data()" x-cloak>
		<div>
			<div class="w-64">
				<div class="relative">
					<input type="hidden" name="service_id" x-ref="service">
					<input 
            type="text"
            readonly
            x-model="servicePickerValue"
            @click="showServicePicker = !showServicePicker"
            @keydown.escape="showServicePicker = false"
            class="w-full pl-4 pr-10 py-3 border border-transparent leading-none rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-gray-600 font-medium cursor-pointer"
            placeholder="Select Service">

          <div class="absolute top-0 right-0 px-3 py-2">
            <i class="relative h-6 w-6 fas fa-chevron-down text-gray-400 text-xl"></i>
          </div>

          <div
          	class="w-full bg-white mt-12 rounded-lg shadow absolute top-2 left-0 overflow-hidden z-10"
          	x-show.transition="showServicePicker"
          	@click.away="showServicePicker = false">
          	<div class="flex flex-col items-base">
          		<template x-for="(service, index) in services" :key="index">
          			<div 
          				@click="{$refs.service.value = service.id, servicePickerValue = service.name, showServicePicker = false}"
          				x-text="service.name"
          				class="cursor-pointer text-sm leading-none leading-loose transition ease-in-out duration-100 px-2 hover:bg-blue-500 hover:text-white">
								</div>
          		</template>
          	</div>
          </div>
				</div>
			</div>
		</div>
	</div>

	<script>
		let action = "{!! $action !!}";
		switch(action){
      case "create":

        break;
        
      case "edit":
        document.querySelector("[name='service_id']").defaultValue = "{!! $model != null ? $model->service_id : '' !!}";
        break;
    }

		function data() {
			return {
				servicePickerValue: '{!! $model != null ? $model->service->name : '' !!}',
				showServicePicker: false,
				services: {!! $options !!},
			}
		}
	</script>
</div>
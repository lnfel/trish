<section x-data="data()" {{ $attributes->merge(['class' => 'relative container mx-auto px-4 mb-10']) }}>
  <div class="p-4 bg-white shadow-md rounded-lg">
    <div class="flex justify-between mb-4">
      <div class="flex items-center">
        <h2 class="inline text-3xl border-b-4 border-green-500 mr-4">{{ $title }}</h2>
        <ol class="list-none p-0 inline-flex" style="color: #ff6126;">
          <li class="flex items-center">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
          </li>
          <li class="flex items-center">
            <span class="text-gray-500">{{ $title }}</span>
          </li>
        </ol>
      </div>
      
    </div>
    <div class="flex flex-wrap">
      <div class="max-w-sm">
        <h3 class="text-lg tracking-wide bg-gray-200 mb-2 px-2 rounded-lg">Select report</h3>
        <div class="flex flex-col space-y-2 mb-4">
          <div>
            <label class="flex items-center relative pl-6 text-gray-700 cursor-pointer">
            <input type="radio" name="category" value="appointments" class="absolute opacity-0" style="z-index: -1;">
            <span class="control-indicator absolute left-0 w-4 h-4 rounded-full bg-gray-300"></span>
            Appointments</label>
          </div>
          <div>
            <label class="flex items-center relative pl-6 text-gray-700 cursor-pointer">
            <input type="radio" name="category" value="services" class="absolute opacity-0" style="z-index: -1;">
            <span class="control-indicator absolute left-0 w-4 h-4 rounded-full bg-gray-300"></span>
            Services</label>
          </div>
        </div>

        <h3 class="text-lg tracking-wide bg-gray-200 mb-2 px-2 rounded-lg">Filter</h3>
        <div class="flex flex-col space-y-2 mb-4">
          <div class="space-y-2">
            <label>From</label>
            <x-input.date-picker-dynamic action="create" name="from" />
          </div>
          <div class="space-y-2">
            <label>To</label>
            <x-input.date-picker-dynamic action="create" name="to" />
          </div>
        </div>
      </div>

      <div class="flex-1 p-4">
        Report preview here
      </div>
    </div>
  </div>
</section>

<script>
  function data() {
    return {

    }
  }
</script>
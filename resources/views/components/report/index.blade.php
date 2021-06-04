@props([
  'reports', 'data'
])

<section x-data="data()" x-init="addListener(), $watch('reportSelected', value => console.log(value))" {{ $attributes->merge(['class' => 'relative container mx-auto px-4 mb-10']) }}>
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
      <form action="{{ route('reports.generate') }}" method="post" class="max-w-sm">
        @csrf
        <h3 class="text-lg tracking-wide text-white font-semibold tracking-wide bg-blue-500 mb-2 px-4 py-1 rounded-lg" style="min-width: 256px;">
          Select report
        </h3>
        <div class="flex flex-col space-y-2 mb-4">
        @forelse($reports as $report)
        <div>
          <label class="flex items-center relative pl-6 text-gray-700 cursor-pointer">
            <input type="radio" name="report" x-model="reportSelected" value="{{ $report['name'] }}" {!! session('report') == $report['name'] ? 'checked' : '' !!} class="absolute opacity-0" style="z-index: -1;">
            <span class="control-indicator absolute left-0 w-4 h-4 rounded-full bg-gray-300"></span>
            <span style="text-transform: capitalize;">{{ $report['name'] }}</span>
          </label>
        </div>
        @empty

        @endforelse
        @error('report')
          <span class="is-invalid" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
          <!-- <template x-for="report in reports">
            <div>
              <label class="flex items-center relative pl-6 text-gray-700 cursor-pointer">
                <input type="radio" name="report" x-bind:value="report.name" x-model="reportSelected" class="absolute opacity-0" style="z-index: -1;">
                <span class="control-indicator absolute left-0 w-4 h-4 rounded-full bg-gray-300"></span>
                <span x-text="report.name" style="text-transform: capitalize;"></span>
              </label>
            </div>
          </template> -->
          
          <!-- <div>
            <label class="flex items-center relative pl-6 text-gray-700 cursor-pointer">
            <input type="radio" name="category" value="services" class="absolute opacity-0" style="z-index: -1;">
            <span class="control-indicator absolute left-0 w-4 h-4 rounded-full bg-gray-300"></span>
            Services</label>
          </div> -->
        </div>

        {{--@if(old('report') == 'appointments')--}}
        <div x-show.transition="reportSelected == 'appointments'">
          <h3 class="text-lg tracking-wide text-white font-semibold tracking-wide bg-blue-500 mb-2 px-4 py-1 rounded-lg">
            Filter
          </h3>
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
        {{--@endif--}}

        <button class="px-4 py-2 text-white tracking-wide bg-blue-500 rounded-md shadow hover:bg-blue-400 focus:outline-none focus:bg-blue-500">
          {{ old('report') == '' ? 'Select report' : 'Generate' }}
        </button>
      </form>

      <div class="flex-1 p-4">
        {{ $data ?? '' }}
        
      </div>
    </div>
  </div>
</section>

<script>
  // https://flaviocopes.com/how-to-add-event-listener-multiple-elements-javascript/
  
  /* document.querySelector('').addEventListener('change', function() {
    let value = this.value;
    console.log(value)
  }); */
  function data() {
    return {
      reports: {!! $reports !!},
      reportSelected: '{!! session('report') !!}',

      addListener() {
        document.querySelectorAll('input[type="radio"]').forEach(item => {
          item.addEventListener('change', event => {
            let value = item.value;
            console.log(value);
          })
        })
      }
    }
  }
</script>
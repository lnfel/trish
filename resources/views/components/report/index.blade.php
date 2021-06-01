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
    <div class="flex flex-col">
      <div>
        <label for="appointments">
        <input type="radio" name="category" value="appointments">
        Appointments</label>
      </div>
      <div>
        <input type="radio" name="category" value="services">
        <label for="services">Services</label>
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
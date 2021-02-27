<section x-data="datatables()" {{ $attributes->merge(['class' => 'relative container mx-auto px-4']) }}>
  <div class="p-4 bg-white shadow-md rounded-lg">
    <div class="flex justify-between mb-4">
      <h2 class="inline text-3xl border-b-4 border-green-500">{{ $title }}</h2>
      <div class="flex items-center justify-end">
        <a href="{{ url('/'.strtolower($title).'/create') }}" class="p-2 bg-green-400 text-white hover:bg-green-500 rounded"><i class="fas fa-plus mr-2"></i>Create</a>
      </div>
    </div>

    <div x-show="selectedRows.length" class="bg-blue-200 fixed top-0 left-0 right-0 z-40 w-full shadow" style="display: none;">
      <div class="container mx-auto px-4 py-4">
        <div class="flex md:items-center">
          <div class="mr-4 flex-shrink-0">
            <svg class="h-8 w-8 text-blue-600" viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
          </div>
          <div x-html="selectedRows.length + ' rows are selected'" class="text-blue-800 text-lg">0 rows are selected</div>
        </div>
      </div>
    </div>

    <div class="mb-4 flex justify-between items-center">
      <div class="flex-1 pr-4">
        <div class="relative md:w-1/3">
          <input 
            x-ref="searchField"
            x-model.debounce="search"
            x-on:keydown.window.prevent.slash="$refs.searchField.focus()"
            type="search" name="search" class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium" placeholder="search...">
          <div class="absolute top-0 left-0 inline-flex items-center p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
              <circle cx="10" cy="10" r="7"></circle>
              <line x1="21" y1="21" x2="15" y2="15"></line>
            </svg>
          </div>
        </div>
      </div>

      <div>
        <div class="shadow rounded-lg flex">
          <div class="relative">
            <button @click.prevent="open = !open" class="rounded-lg inline-flex items-center bg-white hover:text-blue-500 focus:outline-none focus:shadow-outline text-gray-500 font-semibold py-2 px-2 md:px-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 md:hidden" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                <path d="M5.5 5h13a1 1 0 0 1 0.5 1.5L14 12L14 19L10 16L10 12L5 6.5a1 1 0 0 1 0.5 -1.5"></path>
              </svg>
              <span class="hidden md:block">Display</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                <polyline points="6 9 12 15 18 9"></polyline>
              </svg>
            </button>

            <div x-show="open" @click.away="open = false" class="z-40 absolute top-0 right-0 w-40 bg-white rounded-lg shadow-lg mt-12 -mr-1 block py-1 overflow-hidden" style="display: none;">
              <template x-for="heading in headings">
                <label
                  class="flex justify-start items-center text-truncate hover:bg-gray-100 px-4 py-2">
                  <div class="text-blue-600 mr-3">
                    <input type="checkbox" class="form-checkbox focus:outline-none focus:shadow-outline" checked @click="toggleColumn(heading.key)">
                  </div>
                  <div class="select-none text-gray-700" x-text="heading.value"></div>
                </label>
              </template>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- TABLES -->
    <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative" style="max-height: 405px;">
      <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
        <thead>
          <tr class="text-left">
            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-blue-100">
              <label
                class="text-blue-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                <input type="checkbox" class="form-checkbox focus:outline-none focus:shadow-outline" @click="selectAllCheckbox($event);">
              </label>
            </th>
            <template x-for="heading in headings">
              <th class="bg-blue-500 sticky top-0 border-b border-gray-200 px-6 py-2 text-white font-bold tracking-wider uppercase text-xs"
                x-text="heading.value" :x-ref="heading.key" :class="{ [heading.key]: true }"></th>
            </template>
          </tr>
        </thead>
        <tbody>
          <template x-if="model.length > 0" x-for="item in filteredData" :key="item">
            <tr>
              <td class="border-dashed border-t border-gray-200 px-3">
                <label
                  class="text-blue-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                  <input type="checkbox" class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline" :name="item.id"
                      @click="getRowDetail($event, item.id)">
                </label>
              </td>
              <td class="border-dashed border-t border-gray-200 id">
                <span class="text-gray-700 px-6 py-3 flex items-center" x-text="item.id"></span>
              </td>
              @switch($title)
                @case("Services")
                  <td class="border-dashed border-t border-gray-200 name">
                    <span class="text-gray-700 px-6 py-3 flex items-center" x-text="item.name"></span>
                  </td>
                  <td class="border-dashed border-t border-gray-200 description">
                    <span class="text-gray-700 px-6 py-3 flex items-center" x-text="item.description ?? 'No description'"></span>
                  </td>
                  <td class="border-dashed border-t border-gray-200 price">
                    <span class="text-gray-700 px-6 py-3 flex items-center">
                      <div class="flex-shrink-0" x-text="item.price != null ? '&#8369; ' + item.price : '&#8369; 00.00'"></div>
                    </span>
                  </td>
                  @break

                @case("Slots")
                  <td class="border-dashed border-t border-gray-200 name">
                    <!-- <span class="text-gray-700 px-6 py-3 flex items-center" x-text="new Date(item.date).toDateString()"></span> -->
                    <span class="text-gray-700 px-6 py-3 flex items-center" x-text="item.date"></span>
                  </td>
                  <td class="border-dashed border-t border-gray-200 name">
                    <span class="text-gray-700 px-6 py-3 flex items-center" x-text="new Date(`2021-02-28 ${item.time}`).toLocaleTimeString('en-US', {hour: '2-digit', minute: '2-digit', hour12: true})"></span>
                  </td>
                  <td class="border-dashed border-t border-gray-200 name">
                    <span class="text-gray-700 px-6 py-3 flex items-center" x-text="item.slots_left"></span>
                  </td>
                  @break
              @endswitch
              
              <td class="border-dashed border-t border-gray-200 action px-3">
                <div class="flex items-center">
                  <a class="text-sm inline px-3 py-2 bg-blue-400 text-white hover:bg-blue-500 rounded mr-2" x-bind:href="'{{ url('/'.strtolower($title)) }}'+ '/' + item.id + '/edit'"><i class="fas fa-edit"></i></a>
                  <form class="text-sm inline" method="post" x-bind:action="'{{ url('/'.strtolower($title)) }}'+ '/' + item.id">
                    @csrf
                    @method('DELETE')
                    <button class="px-4 py-2 bg-gray-400 text-white hover:bg-gray-500 rounded focus:outline-none focus:shadow-outline"><i class="fas fa-times"></i></button>
                  </form>
                </div>
              </td>
            </tr>
          </template>

          <template x-if="model.length == 0">
            <tr>
              <td class="border-dashed border-t border-gray-200" colspan="6">
                <span class="text-gray-700 py-3 flex items-center justify-center">No Available data</span>
              </td>
            </tr>
          </template>
        </tbody>
      </table>
    </div>
  </div>
</section>

<script>
  function datatables() {
    return {
      search: "",
      model: {!! $model !!},
      headings: {!! $headings !!},
      selectedRows: [],

      open: false,

      get filteredData() {
        // filtered search
        if (this.search === "") {
          return this.model;
        }

        return this.model.filter((item) => {
          let title = "{!! strtolower($title) !!}";
          switch(title) {
            case "services":
              return item.name
                .toLowerCase()
                .includes(this.search.toLowerCase());
              break;

            case "slots":
              return item.date
                .toLowerCase()
                .includes(this.search.toLowerCase());
              break;
          }
        });
      },
      
      toggleColumn(key) {
        // Note: All td must have the same class name as the headings key! 
        let columns = document.querySelectorAll('.' + key);

        if (this.$refs[key].classList.contains('hidden') && this.$refs[key].classList.contains(key)) {
          columns.forEach(column => {
            column.classList.remove('hidden');
          });
        } else {
          columns.forEach(column => {
            column.classList.add('hidden');
          });
        }
      },

      getRowDetail($event, id) {
        let rows = this.selectedRows;

        if (rows.includes(id)) {
          let index = rows.indexOf(id);
          rows.splice(index, 1);
        } else {
          rows.push(id);
        }
      },

      selectAllCheckbox($event) {
        let columns = document.querySelectorAll('.rowCheckbox');

        this.selectedRows = [];

        if ($event.target.checked == true) {
          columns.forEach(column => {
            column.checked = true
            this.selectedRows.push(parseInt(column.name))
          });
        } else {
          columns.forEach(column => {
            column.checked = false
          });
          this.selectedRows = [];
        }
      }
    }
  }
</script>
<section x-data="datatables()" {{ $attributes->merge(['class' => 'relative container mx-auto px-4 mb-10']) }}>
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
      <!-- <h2 class="inline text-3xl border-b-4 border-green-500">{{ $title }}</h2> -->
      <div class="flex items-center justify-end">
        @if($title == 'Appointments')
          @if(Auth::getDefaultDriver() == 'web')
            <a href="{{ url('/'.strtolower($title).'/create') }}" class="p-2 bg-green-400 text-white hover:bg-green-500 rounded"><i class="fas fa-plus mr-2"></i>Create</a>
          @endif

          @if(Auth::getDefaultDriver() == 'admin')
            <a href="{{ route('client.user.appointments.report') }}" class="p-2 px-4 bg-green-400 text-white hover:bg-green-500 rounded" title="Report"><i class="fas fa-file"></i></a>
          @endif          
        @elseif($title == 'Users')

        @else
          <a href="{{ url('/'.strtolower($title).'/create') }}" class="p-2 bg-green-400 text-white hover:bg-green-500 rounded"><i class="fas fa-plus mr-2"></i>Create</a>
        @endif
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
    <!-- MODAL -->
    <div
      x-cloak
      x-show.transition="showModal"
      class="flex items-center justify-center fixed left-0 bottom-0 w-full bg-gray-200 bg-opacity-75 h-full z-40">
      <div class="bg-white rounded-lg w-1/2 overflow-hidden shadow">
        <div class="flex flex-col items-start p-4">
          <div class="flex items-center w-full">
            <div class="text-gray-900 font-medium text-lg">GCash</div>
            <svg @click="showModal = false" class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
            </svg>
          </div>
          <hr>
          <div>Continue payment with GCash? Amount to be paid: &#8369; <span x-text="amount"></span></div>
          <hr>
          <div class="ml-auto">
            <form method="POST" action="{{ route('ewallet.pay') }}">
              @csrf
              <input type="hidden" name="type" value="gcash">
              <input type="hidden" name="amount" value="10000">
              <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Continue
              </button>
            </form>
            <!-- <button class="bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
              Close
            </button> -->
          </div>
        </div>
      </div>
    </div>
    <!-- TABLES -->
    <div x-cloak class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative" style="max-height: 405px;">
      <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
        <thead>
          <tr class="text-center">
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
                  class="text-blue-500 flex justify-center items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                  <input type="checkbox" class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline" :name="item.id"
                      @click="getRowDetail($event, item.id)">
                </label>
              </td>
              <td class="border-dashed border-t border-gray-200 id">
                <span class="text-gray-700 px-6 py-3 flex items-center justify-center" x-text="item.id"></span>
              </td>
              @switch($title)
                @case("Services")
                  <td class="border-dashed border-t border-gray-200 name">
                    <span class="text-gray-700 px-6 py-3 flex items-center justify-center" x-text="item.name"></span>
                  </td>
                  <td class="border-dashed border-t border-gray-200 description">
                    <span class="text-gray-700 px-6 py-3 flex items-center justify-center" x-text="item.description ?? 'No description'"></span>
                  </td>
                  <td class="border-dashed border-t border-gray-200 price">
                    <span class="text-gray-700 px-6 py-3 flex items-center justify-center">
                      <div class="flex-shrink-0" x-text="item.price != null ? '&#8369; ' + item.price : '&#8369; 00.00'"></div>
                    </span>
                  </td>
                  @break

                @case("Slots")
                  <td class="border-dashed border-t border-gray-200 date">
                    <!-- <span class="text-gray-700 px-6 py-3 flex items-center justify-center" x-text="new Date(item.date).toDateString()"></span> -->
                    <span class="text-gray-700 px-6 py-3 flex items-center justify-center" x-text="item.date"></span>
                  </td>
                  <td class="border-dashed border-t border-gray-200 time">
                    <span class="text-gray-700 px-6 py-3 flex items-center justify-center" x-text="new Date(`2021-02-28 ${item.time}`).toLocaleTimeString('en-US', {hour: '2-digit', minute: '2-digit', hour12: true})"></span>
                  </td>
                  <td class="border-dashed border-t border-gray-200 slots_left">
                    <span class="text-gray-700 px-6 py-3 flex items-center justify-center" x-text="item.slots_left"></span>
                  </td>
                  @break

                @case("Appointments")
                  <td class="border-dashed border-t border-gray-200 service">
                    <span class="text-gray-700 px-6 py-3 flex items-center justify-center" x-text="item.service.name"></span>
                  </td>
                  <td class="border-dashed border-t border-gray-200 purpose">
                    <span class="text-gray-700 px-6 py-3 flex items-center justify-center" x-text="item.purpose.name"></span>
                  </td>
                  <td class="border-dashed border-t border-gray-200 requirements">
                    <ul class="list-disc text-gray-700 px-6 py-3 flex flex-col max-h-24 overflow-y-auto">
                    <template x-for="(requirement, index) in item.purpose.requirements" :key="index">
                      <li x-text="requirement.name"></li>
                    </template>
                    </ul>
                  </td>
                  <td class="border-dashed border-t border-gray-200 slotDate">
                    <span class="whitespace-nowrap text-gray-700 px-6 py-3 flex items-center justify-center" x-text="item.slot.date"></span>
                  </td>
                  <td class="border-dashed border-t border-gray-200 slotTime">
                    <span class="whitespace-nowrap text-gray-700 px-6 py-3 flex items-center justify-center" x-text="new Date(`2021-02-28 ${item.slot.time}`).toLocaleTimeString('en-US', {hour: '2-digit', minute: '2-digit', hour12: true})"></span>
                  </td>
                  @auth('admin')
                  <td class="border-dashed border-t border-gray-200 user">
                    <span class="text-gray-700 px-6 py-3 flex items-center justify-center" x-text="item.user.name"></span>
                  </td>
                  @endauth
                  <td class="border-dashed border-t border-gray-200 status">
                    <span x-bind:class="item.status == 'Cancel' || item.status == 'Pending' ? 'text-gray-700 px-6 py-3 flex items-center justify-center text-red-500' : 'text-gray-700 px-6 py-3 flex items-center justify-center text-green-500'" x-text="item.status == 'Cancel' ? 'Cancelled' : item.status "></span>
                  </td>
                  @break

                @case("Requirements")
                  <td class="border-dashed border-t border-gray-200 name">
                    <span class="text-gray-700 px-6 py-3 flex items-center max-w-sm" x-text="item.name"></span>
                  </td>
                  <td class="border-dashed border-t border-gray-200 purposes">
                    <ul class="list-disc text-gray-700 px-6 py-3 flex flex-col max-h-24 overflow-y-auto">
                    <template x-for="(purpose, index) in item.purposes" :key="index">
                      <li x-text="`${purpose.service.name} ${purpose.name}`"></li>
                    </template>
                    <template x-if="item.purposes.length == 0">
                      <li>No purpose attached yet</li>
                    </template>
                    </ul>
                  </td>
                  @break
                @case("Purposes")
                  <td class="border-dashed border-t border-gray-200 name">
                    <span class="text-gray-700 px-6 py-3 flex items-center max-w-sm" x-text="item.name"></span>
                  </td>
                  <td class="border-dashed border-t border-gray-200 service">
                    <span class="text-gray-700 px-6 py-3 flex items-center justify-center" x-text="item.service.name"></span>
                  </td>
                  @break
                @case("Users")
                  <td class="border-dashed border-t border-gray-200 avatar">
                    <div class="flex items-center justify-center py-2">
                      <img class="h-24 rounded-full overflow-hidden border shadow" x-bind:src="`/storage/img/${item.avatar}`">
                    </div>
                  </td>
                  <td class="border-dashed border-t border-gray-200 fullname">
                    <span class="text-gray-700 px-6 py-3 flex items-center max-w-sm" x-text="item.name + ' ' + item.surname"></span>
                  </td>
                  <td class="border-dashed border-t border-gray-200 email">
                    <span class="text-gray-700 px-6 py-3 flex items-center max-w-sm" x-text="item.email"></span>
                  </td>
                  <td class="border-dashed border-t border-gray-200 address">
                    <div class="max-w-xs">
                      <template x-if="item.address">
                        <span class="break-words text-gray-700 px-6 py-3 flex items-center max-w-sm" x-text="item.address.street_address + ' Brgy. ' + item.address.brgy.name + ' ' + item.address.city.name + ', ' + item.address.province.name + ' ' + item.address.zip_code"></span>
                      </template>
                      <template x-if="!item.address">
                        <span class="flex items-center justify-center text-red-500 text-center">No address</span>
                      </template>
                    </div>
                  </td>
                  <td class="border-dashed border-t border-gray-200 valid_id">
                    <div class="flex items-center justify-center py-2">
                      <template x-if="item.valid_id">
                        <img class="h-24 rounded overflow-hidden border shadow" x-bind:src="`/storage/img/${item.valid_id}`">
                      </template>
                      <template x-if="!item.valid_id">
                        <span class="w-full text-red-500 text-center">No valid id</span>
                      </template>
                    </div>
                  </td>
                  @break
              @endswitch
              
              <td class="border-dashed border-t border-gray-200 action px-3">
                <div class="flex items-center justify-center">
                  @if($title == 'Appointments')
                    @if(Auth::getDefaultDriver() == 'admin')
                      <a class="text-sm inline px-3 py-2 bg-blue-400 text-white hover:bg-blue-500 rounded mr-2" x-bind:href="'{{ url('/admin/'.strtolower($title)) }}'+ '/' + item.id + '/edit'"><i class="fas fa-edit"></i></a>
                    @else
                      <a class="text-sm inline px-3 py-2 bg-blue-400 text-white hover:bg-blue-500 rounded mr-2" x-bind:class="item.status == 'Pending' ? '' : 'hidden' " x-bind:href="'{{ url('/'.strtolower($title)) }}'+ '/' + item.id + '/edit'"><i class="fas fa-edit"></i></a>
                    @endif
                  @else
                    @if(Auth::getDefaultDriver() == 'web')
                      <a class="text-sm inline px-3 py-2 bg-blue-400 text-white hover:bg-blue-500 rounded mr-2" x-bind:class="item.status == 'Pending' ? '' : 'hidden' " x-bind:href="'{{ url('/'.strtolower($title)) }}'+ '/' + item.id + '/edit'"><i class="fas fa-edit"></i></a>
                    @else
                      <a class="text-sm inline px-3 py-2 bg-blue-400 text-white hover:bg-blue-500 rounded mr-2" x-bind:href="'{{ url('/'.strtolower($title)) }}'+ '/' + item.id + '/edit'"><i class="fas fa-edit"></i></a>
                    @endif
                  @endif

                  @if(Auth::getDefaultDriver() == 'web' && $title == 'Appointments')
                    <template x-if="item.status == 'Pending'">
                      <div
                        x-bind:class="item.paid == false ? '' : 'hidden'"
                        @click="showModal = !showModal, amount = item.service.price"
                        class="p-1 rounded bg-green-100 hover:bg-green-200 cursor-pointer" style="width: 36px;">
                        <img src="{{ asset('img/gcash.png') }}" width="40px">
                      </div>
                    </template>
                  @endif
                  
                  @if(Auth::getDefaultDriver() == 'admin' && Route::current()->getName() !== 'users.index')
                    <form class="text-sm inline" method="post" x-bind:action="'{{ url('/'.strtolower($title)) }}'+ '/' + item.id">
                      @csrf
                      @method('DELETE')
                      <button class="px-4 py-2 bg-gray-400 text-white hover:bg-gray-500 rounded focus:outline-none focus:shadow-outline"><i class="fas fa-times"></i></button>
                    </form>
                  @endif
                </div>
              </td>
            </tr>
          </template>

          <template x-if="model.length == 0">
            <!-- <td class="border-dashed border-t border-gray-200" x-bind:colspan="headings.length == '7' ? '8' : '6'"> -->
            <tr>
              <td colspan="100%">
                <span class="text-gray-400 font-medium py-8 flex items-center justify-center"><i class="fas fa-inbox text-2xl mr-2"></i> No Available data</span>
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
      auth: '{!! Auth::getDefaultDriver() !!}',
      selectedRows: [],
      amount: "",
      showModal: false,

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

            case "appointments":
              if (this.auth == 'admin') {
                return item.user.name
                  .toLowerCase()
                  .includes(this.search.toLowerCase());
              } else {
                return item.service.name
                  .toLowerCase()
                  .includes(this.search.toLowerCase());
              }
              break;

            case "requirements":
              return item.name
                .toLowerCase()
                .includes(this.search.toLowerCase());
              break;

            default:
              return item.name
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
      },

      pay() {
        fetch('http://localhost/e-wallet/pay', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(
            {
              type: 'gcash',
              amount: '10000',
            }
          ),
        })
        .then(response => console.log(response))
        .catch(err => console.error(err));
      }
    }
  }
</script>
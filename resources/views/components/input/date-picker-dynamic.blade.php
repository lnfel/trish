@props([
  'action', 'inputname', 'fromDate', 'toDate'
])

<div class="antialiased sans-serif">
  <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
    <div>
      <div class="w-64">
        <div class="relative">
          <input type="hidden" name="{{ $inputname }}" x-ref="date">
          <input 
            type="text"
            readonly
            x-model="datepickerValue"
            @click="showDatepicker = !showDatepicker"
            @keydown.escape="showDatepicker = false"
            class="w-full pl-4 pr-10 py-3 border border-blue-400 leading-none rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-gray-600 font-medium"
            placeholder="Select date">

          <div class="absolute flex items-center top-0 bottom-0 right-0 px-3 py-2">
            <svg class="h-6 w-6 text-gray-400"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
          </div>


          <!-- <div x-text="no_of_days.length"></div>
          <div x-text="32 - new Date(year, month, 32).getDate()"></div>
          <div x-text="new Date(year, month).getDay()"></div> -->

          <div 
            class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0" 
            style="width: 17rem; z-index: 2;" 
            x-show.transition="showDatepicker"
            @click.away="showDatepicker = false">

            <div class="flex justify-between items-center mb-2">
                <div>
                    <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                    <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                </div>
                <div>
                    <button 
                        type="button"
                        class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full" 
                        :class="{'cursor-not-allowed opacity-25': month == 0 }"
                        :disabled="month == 0 ? true : false"
                        @click="if (month == 0) { year--; month = 12; } month--; getNoOfDays()">
                        <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>  
                    </button>
                    <button 
                        type="button"
                        class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full" 
                        :class="{'cursor-not-allowed opacity-25': month == 11 }"
                        :disabled="month == 11 ? true : false"
                        @click="if (month == 11) { month = 0; year++; } else { month++; } getNoOfDays()">
                        <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>									  
                    </button>
                </div>
            </div>

            <div class="flex flex-wrap mb-3 -mx-1">
                <template x-for="(day, index) in DAYS" :key="index">	
                    <div style="width: 14.26%" class="px-1">
                        <div
                            x-text="day" 
                            class="text-gray-800 font-medium text-center text-xs"></div>
                    </div>
                </template>
            </div>

            <div class="flex flex-wrap -mx-1">
                <template x-for="blankday in blankdays">
                    <div 
                        style="width: 14.28%"
                        class="text-center border p-1 border-transparent text-sm"	
                    ></div>
                </template>	
                <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">	
                    <div style="width: 14.28%" class="px-1 mb-1">
                        <div
                            @click="getDateValue(date)"
                            x-text="date"
                            class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                            :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }"	
                        ></div>
                    </div>
                </template>
            </div>
          </div>

        </div>	 
      </div>

    </div>
  </div>

  <script>
      var MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
      var DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

      var action = "{!! $action !!}";

      console.log(action);
      document.querySelector("[name='{!! $inputname !!}']").defaultValue = new Date().toJSON().slice(0,10);'{!! $toDate !!}'
      /*switch(action){
        case "create":
          document.querySelector("[name='date']").defaultValue = new Date().toJSON().slice(0,10);
          break;

        case "edit":
          document.querySelector("[name='date']").defaultValue = "{-- $model != null ? $model->date : '' --}";
          break;
      }*/

      function app() {
          return {
              showDatepicker: false,
              datepickerValue: '',

              month: '',
              year: '',
              no_of_days: [],
              blankdays: [],
              days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

              initDate() {
                  let today = new Date();
                  this.month = today.getMonth();
                  this.year = today.getFullYear();
                  if ("{!! $inputname !!}" == 'from') {
                    //this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
                    this.datepickerValue = new Date('{!! $fromDate !!}').toDateString();
                  } else {
                    //this.datepickerValue = new Date("{-- $model != null ? $model->date : '' --}").toDateString();
                    this.datepickerValue = new Date('{!! $toDate !!}').toDateString();
                  }
              },

              isToday(date) {
                  const today = new Date();
                  const d = new Date(this.year, this.month, date);

                  return today.toDateString() === d.toDateString() ? true : false;
              },

              getDateValue(date) {
                  let selectedDate = new Date(this.year, this.month, date);
                  this.datepickerValue = selectedDate.toDateString();

                  this.$refs.date.value = selectedDate.getFullYear() +"-"+ ('0'+ (selectedDate.getMonth() + 1)).slice(-2) +"-"+ ('0' + selectedDate.getDate()).slice(-2);

                  console.log(this.$refs.date.value);

                  this.showDatepicker = false;
              },

              getNoOfDays() {
                  let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

                  // find where to start calendar day of week
                  let dayOfWeek = new Date(this.year, this.month).getDay();
                  let blankdaysArray = [];
                  for ( var i=1; i <= dayOfWeek; i++) {
                      blankdaysArray.push(i);
                  }

                  let daysArray = [];
                  for ( var i=1; i <= daysInMonth; i++) {
                      daysArray.push(i);
                  }

                  this.blankdays = blankdaysArray;
                  this.no_of_days = daysArray;
              }
          }
      }
  </script>
</div>
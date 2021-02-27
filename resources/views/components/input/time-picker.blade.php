<div x-data="timepicker()" x-init="timepicker().fill()" class="inline-flex border border-blue-400 rounded-md p-2 rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-gray-600 font-medium">
  <select name="hour" id="hour" class="px-2 outline-none appearance-none bg-transparent">
  	<template x-for="hour in hours">
  		<option x-bind:value="hour" x-text="hour"></option>	
  	</template>
  </select>
  <span class="px-2">:</span>
  <select name="minute" id="minute" class="px-2 outline-none appearance-none bg-transparent">
    <template x-for="minute in minutes">
  		<option x-bind:value="minute" x-text="minute"></option>	
  	</template>
  </select>
  <select name="meridiem" id="meridiem" class="px-2 outline-none appearance-none bg-transparent">
    <template x-for="midday in meridiem">
  		<option x-bind:value="midday" x-text="midday"></option>	
  	</template>
  </select>
</div>

<script>
	function timepicker() {
		Number.prototype.pad = function(size) {
			var s = String(this);
			while (s.length < (size || 2)) {s = "0" + s;}
			return s;
		}

		let hours = [];
		let minutes = [
			"00", "30"
		];
		let meridiem = [
			"AM", "PM"
		];

		for (let i = 1; i < 13; i++) {
			let hour = (i).pad();
			hours.push(hour);
		}

		return {
			hours: hours,
			minutes: minutes,
			meridiem: meridiem,
			fill() {
				if ("{!! $action !!}" == "edit") {
					let time = "{!! $model != null ? $model->time : '' !!}";
					let timeParts = time.split(":");
					let hour = timeParts[0];
					timeParts = timeParts[1].split(" ");
					let minute = timeParts[0];
					//let meridiem = timeParts[1].toUpperCase();
					let meridiem = new Date(`2021-02-28 ${time}`).toLocaleTimeString('en-US', {hour: '2-digit', minute: '2-digit', hour12: true}).slice(-2);
					
					function selectElement(id, valueToSelect) {    
						let element = document.getElementById(id);
						element.value = valueToSelect;
					}
					console.log(hour, minute, meridiem);

					let customInterval = setInterval(function(){
						let len = document.querySelector("#hour").length;
						if (len > 0) {
							return {
								editHour: selectElement("hour", hour),
								editMinute: selectElement("minute", minute),
								editMeridiem: selectElement("meridiem", meridiem),
								stop: clearInterval(customInterval)
							}
						} else {
							console.log("customInterval len:", len);
						}
					}, 3000);
				}
			}
		}
	}

	timepicker();
</script>
@extends('layouts.admin-app')

@section('content')
<section class="intro relative">
  <div class="intro-bg"></div>
</section>

<section class="relative container mx-auto -mt-80 mb-4 px-4" style="z-index: 9;">
  <div class="grid grid-cols-2 gap-4">
    <div class="bg-white shadow-md rounded-lg border-b-4 border-green-500 hover:bg-green-600 hover:text-white">
      <a href="{{ route('services.index') }}" class="block p-8 text-xl font-bold"><i class="far fa-file-alt mr-2"></i>Services</a>
    </div>

    <div class="bg-white shadow-md rounded-lg border-b-4 border-red-500 hover:bg-red-600 hover:text-white">
      <a href="{{ route('slots.index') }}" class="block p-8 text-xl font-bold"><i class="fas fa-calendar-alt mr-2"></i>Slots</a>
    </div>

    <div class="bg-white shadow-md rounded-lg border-b-4 border-blue-500 hover:bg-blue-600 hover:text-white">
      <a href="{{ route('client.user.appointments') }}" class="block p-8 text-xl font-bold"><i class="fas fa-calendar-check mr-2"></i>Appointments</a>
    </div>

    <div class="bg-white shadow-md rounded-lg border-b-4 border-yellow-500 hover:bg-yellow-600 hover:text-white">
      <a href="{{ route('requirements.index') }}" class="block p-8 text-xl font-bold"><i class="fas fa-copy mr-2"></i>Requirements</a>
    </div>

    <div class="bg-white shadow-md rounded-lg border-b-4 border-indigo-500 hover:bg-indigo-600 hover:text-white">
      <a href="{{ route('purposes.index') }}" class="block p-8 text-xl font-bold"><i class="fas fa-question mr-2"></i>Purposes</a>
    </div>

    <div class="bg-white shadow-md rounded-lg border-b-4 border-indigo-500 hover:bg-indigo-600 hover:text-white">
      <a href="{{ route('users.index') }}" class="block p-8 text-xl font-bold"><i class="fas fa-user-shield mr-2"></i>User Verification</a>
    </div>
  </div>
</section>

<div id="js-dynamic-content-target">
  
</div>

<script type="text/javascript">
  //function fetchServices() {
  //  fetch('/services')
  //    .then(response => response.text())
  //    .then(html => {
  //      document.querySelector('#js-dynamic-content-target').innerHTML = html;
  //    })
  //}

  fetchServices();
</script>
@endsection
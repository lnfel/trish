@extends('layouts.app')

@section('content')
<div class="flex items-center items-stretch min-h-screen">
  <div class="w-full">
    <a href="{{ URL::to('/') }}">
      <div class="flex items-center justify-center p-4">
        <img src="{{ asset('img/angono_logo.png') }}" width="70px">
        <h1 class="login text-2xl ml-4">{{ config('app.name', 'Laravel') }} &#12290;</h1>
      </div>
    </a>
    <form class="px-8 pt-6 pb-8 mb-4 mx-auto" method="POST" action="{{ route('register') }}" style="width: 70%;">
      @csrf
      <h3 class="text-xl font-bold text-gray-700 mb-4">Register</h3>
      <div class="mb-4">
        <label for="name" class="block text-gray-700 text-md font-bold mb-2 @error('name') is-invalid @enderror">{{ __('Name') }}</label>
        <input id="name" type="text" class="shadow appearance-none border border-blue-400 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
          <span class="is-invalid" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="mb-4">
        <label for="email" class="block text-gray-700 text-md font-bold mb-2 @error('email') is-invalid @enderror">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" name="email" class="shadow appearance-none border border-blue-400 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50" value="{{ old('email') }}" required>
        @error('email')
          <span class="is-invalid" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="mb-4">
        <label for="password" class="block text-gray-700 text-md font-bold mb-2 @error('password') is-invalid @enderror">{{ __('Password') }}</label>
        <input id="password" type="password" name="password" class="shadow appearance-none border border-blue-400 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50" required="">
        @error('password')
          <span class="text-red-400" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="mb-4">
        <label for="password-confirm" class="block text-gray-700 text-md font-bold mb-2">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" class="shadow appearance-none border border-blue-400 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50" name="password_confirmation" required autocomplete="new-password">
      </div>

      <div class="flex items-center justify-between mb-6">
        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">{{ __('Register') }}</button>
      </div>
    </form>
  </div>
  <div class="splash flex-col items-center justify-center p-4 hidden lg:flex">
    <img class="rounded-lg shadow-md mb-2" src="{{ asset('img/higantes.jpg') }}">
    <span class="font-medium tracking-wider">Angono is known for its Higantes Festival</span>
  </div>
</div>
@endsection

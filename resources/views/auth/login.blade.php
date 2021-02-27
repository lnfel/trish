@extends('layouts.app')

@section('content')
<div class="flex items-center items-stretch min-h-screen">
  <div class="w-full">
    <a href="{{ URL::to('/') }}">
      <div class="flex items-center justify-center p-4">
        <img src="{{ asset('img/angono_logo.png') }}" width="70px">
        <h1 class="text-2xl ml-4">{{ config('app.name', 'Laravel') }} &#12290;</h1>
      </div>
    </a>
    <form class="px-8 pt-6 pb-8 mb-4 mx-auto" method="POST" action="{{ route('login') }}" style="width: 70%;">
      @csrf
      <div class="mb-4">
        <label for="email" class="block text-gray-700 text-md font-bold mb-2 @error('email') is-invalid @enderror">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" name="email" class="shadow appearance-none border border-blue-400 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50" required="" autofocus="">
        @error('email')
          <span class="is-invalid" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="mb-4">
        <label for="password" class="block text-gray-700 text-md font-bold mb-2">{{ __('Password') }}</label>
        <input id="password" type="password" name="password" class="shadow appearance-none border border-blue-400 rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50" required="">
        @error('password')
          <span class="is-invalid" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="flex items-center block text-gray-500 font-bold mb-6">
        <input id="remember" type="checkbox" name="remember" class="mr-2">
        <label for="remember">{{ __('Remember Me') }}</label>
      </div>

      <div class="flex items-center justify-between mb-6">
        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">{{ __('Login') }}</button>
      </div>

      <div class="">
        <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
      </div>

      <div style="border-top: 1px solid #cbd2d6; position: relative; margin: 25px 0 10px; text-align: center;">
        <span style="background-color: #fff; padding: 0 .5em; position: relative; color: #6c7378; top: -.7em;">
          or
        </span>
      </div>

      <a class="block text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:text-white" href="{{ route('register') }}">{{ __('Sign up') }}</a>
    </form>
  </div>
  <div class="splash flex-col items-center justify-center p-4 hidden lg:flex">
    <img src="{{ asset('img/higantes.jpg') }}">
    <span>Angono is known for its Higantes Festival</span>
  </div>
</div>
@endsection

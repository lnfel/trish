@extends('layouts.admin-app')

@section('content')
@if (session('status'))
	<x-flash.alert :status="session('status')"/>
@endif

<section class="intro relative">
  <div class="intro-bg"></div>
</section>

<x-service.create route="services" title="Create Service" :columns="$columns"/>
@endsection
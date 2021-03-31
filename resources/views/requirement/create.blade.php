@extends('layouts.admin-app')

@section('content')
@if (session('status'))
	<x-flash.alert :status="session('status')"/>
@endif

<section class="intro relative">
  <div class="intro-bg"></div>
</section>

<x-service.create route="requirements" title="Create Requirement" :columns="$columns" :services="$services"/>
@endsection
@extends('layouts.admin-app')

@section('content')
@if (session('status'))
	<x-flash.alert :status="session('status')"/>
@endif

<section class="intro relative">
  <div class="intro-bg"></div>
</section>

<x-service.edit route="requirements" title="Edit Requirement" :model="$model" :columns="$columns" :purposes="$purposes"/>
@endsection
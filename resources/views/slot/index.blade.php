@extends('layouts.admin-app')

@section('content')
@if (session('status'))
	<x-flash.alert :status="session('status')"/>
@endif

<section class="intro relative">
  <div class="intro-bg"></div>
</section>

<x-service.index :model="$model" :headings="$headings" title="Slots" class="-mt-80"/>
{{--
@php
	$months = array();
	$days = array();
@endphp
<div class="container p-4">
	@foreach($slots as $slot)
		@php
			$timestamp = strtotime($slot->date);
			$php_date = getdate($timestamp);
			$date = date("Y/m/d", $timestamp);
			$month = date("m", $timestamp);
			$day = date("d", $timestamp);
			array_push($months, $month);
			array_push($days, $day);
		@endphp

		<ul class="flex">
			<li class="mr-4">Date: {{ $slot->date }}</li>
			<li class="mr-4">Time: {{ $slot->time }}</li>
			<li class="mr-4">Timestamp: {{ $timestamp }}</li>
			<li class="mr-4">Strtotime: {{ $date }}</li>
			<li class="mr-4">Month: {{ $month }}</li>
			<li class="mr-4">Months: {{ implode(", ", $months) }}</li>
			<li class="mr-4">Day: {{ $day }}</li>
			<li class="mr-4">Days: {{ implode(", ", $days) }}</li>
		</ul>
	@endforeach
	--}}
</div>
@endsection
@extends('layouts.admin-app')

@section('content')
@if (session('status'))
	<x-flash.alert :status="session('status')"/>
@endif

<section class="intro relative">
  <div class="intro-bg"></div>
</section>

<x-report.index :data="$data" :reports="$reports" :fromDate="$fromDate" :toDate="$toDate" title="Reports" class="-mt-80" />
@endsection
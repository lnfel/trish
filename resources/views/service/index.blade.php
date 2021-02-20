@extends('layouts.admin-app')

@section('content')
<section class="intro relative">
  <div class="intro-bg"></div>
</section>

<x-service.index :services="$services" :headings="$headings" class="-mt-80"/>
@endsection
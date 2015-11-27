@extends('layout')

@section('header')
    <title>Minesko | {{ $object->title }}</title>
    <meta name="Description" content="{{ $object->description }}">
    <meta name="Keywords" content="{{ $object->keywords }}">
@stop

@section('content')
<div class="container">
	<div class="content">
		<h2 class="form-signin-heading">{{ $object->title }}</h2>
        <div><img src="/uploads/services/thumbs/full/{{ $object->img }}" alt="{{ $object->alt }}"></div>
        <div>{!! $object->text !!}</div>
	</div>
</div>
@stop
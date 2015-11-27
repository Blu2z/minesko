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
        <ul>
        @forelse($object->galleries()->sortBy('weight', SORT_REGULAR, false) as $img)
            <li><img src="/uploads/photogalleries/thumbs/full/{{ $img->img }}" alt="{{ $img->alt }}"></li>
        @empty
            <p>В этой коллекции пока нет изображений!</p>
        @endforelse
        </ul>
	</div>
</div>
@stop
@extends('layout')

@section('content')
<div class="container">
	<div class="content">
		<div class="title">Услуги</div>
        <ul>
        @forelse($objects as $object)
            <li><a href="{{ url('services/' . $object['alias']) }}">{{$object['title']}}</a></li>
        @empty
            <p>Здесь нет записей!</p>
        @endforelse
        </ul>
	</div>
</div>
@stop
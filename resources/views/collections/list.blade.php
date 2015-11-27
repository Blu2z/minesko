@extends('layout')

@section('header')
    <title>Minesko | {{ trans('seo.colections.title') }}</title>
    <meta name="Description" content="{{ trans('seo.colections.description') }}">
    <meta name="Keywords" content="{{ trans('seo.colections.keywords') }}">
@stop

@section('content')
<div class="container">
	<div class="content">
		<h2 class="form-signin-heading">Наши коллекции:</h2>
        <ul>
        @forelse($objects as $object)
            <li>
                <a href="{{ url('collections/' . $object->alias) }}">
                    <p>{{ $object['title'] }}</p>
                    <img src="/uploads/collections/thumbs/full/{{ $object->img }}" alt="{{ $object->alt }}">
                </a>
            </li>
        @empty
            <p>Здесь нет записей!</p>
        @endforelse
        </ul>
	</div>
    {!! $objects->render() !!}
</div>
@stop
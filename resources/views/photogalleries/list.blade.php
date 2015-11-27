@extends('layout')

@section('header')
    <title>Minesko | {{ trans('seo.photogalleries.title') }}</title>
    <meta name="Description" content="{{ trans('seo.photogalleries.description') }}">
    <meta name="Keywords" content="{{ trans('seo.photogalleries.keywords') }}">
@stop

@section('content')
<div class="container">
	<div class="content">
		<h2 class="form-signin-heading">Наши фотогаллереи:</h2>
        <ul>
        @forelse($objects as $object)
            <li>
                <a href="{{ url('photogalleries/' . $object->alias) }}">
                    <p>{{ $object['title'] }}</p>
                    <img src="/uploads/photogalleries/thumbs/full/{{ $object->img }}" alt="{{ $object->alt }}">
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
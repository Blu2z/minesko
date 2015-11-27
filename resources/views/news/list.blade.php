@extends('layout')

@section('header')
    <title>Minesko | {{ trans('seo.news.title') }}</title>
    <meta name="Description" content="{{ trans('seo.news.description') }}">
    <meta name="Keywords" content="{{ trans('seo.news.keywords') }}">
@stop

@section('content')
<div class="container">
	<div class="content">
		<div class="title">Новости</div>
        <ul>
        @forelse($objects as $object)
            <li><a href="{{ url('news/' . $object->alias) }}">{{ $object->title }}</a></li>
        @empty
            <p>Здесь нет записей!</p>
        @endforelse
        </ul>
	</div>
    {!! $objects->render() !!}
</div>
@stop
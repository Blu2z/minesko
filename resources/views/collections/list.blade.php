@extends('layout')

@section('header')
    <title>Minesko | {{ trans('seo.colections.title') }}</title>
    <meta name="Description" content="{{ trans('seo.colections.description') }}">
    <meta name="Keywords" content="{{ trans('seo.colections.keywords') }}">
@stop

@section('content')
<div class="content">
    <h1>
        <span class="content__head">Наши коллекции</span>
    </h1>
    <div class="content__wrap">
    @forelse($objects as $object)
        <div class="content__block--full">
            <div class="content__img content__img--galery">
                <div class="carousel carousel--galery">
                    <div class="item">
                        <a class="fancybox" rel="galery-evening-dresses" href="/uploads/collections/originals/{!! $object->img !!}">
                            <img class="lazyOwl" src="/uploads/collections/thumbs/full/{!! $object->img !!}" alt="{!! $object->alt !!}">
                        </a>
                    </div>
                    @forelse($object->galleries()->sortBy('weight', SORT_REGULAR, false) as $img)
                    <div class="item">
                        <a class="fancybox" rel="galery-evening-dresses" href="/uploads/collections/originals/{!! $img->img !!}">
                            <img class="lazyOwl" data-src="/uploads/collections/thumbs/full/{!! $img->img !!}" alt="{!! $img->alt !!}">
                        </a>
                    </div>
                    @empty
                        <p>В этой коллекции пока нет изображений!</p>
                    @endforelse
                </div>
            </div>
            <div class="content__text">
                <div class="content__title">{!! $object['title'] !!}</div>
                <div class="content__desc">
                    <p>
                        {!! $object['text'] !!}
                    </p>
                </div>
            </div>
        </div>
    @empty
    <p>Здесь нет записей!</p>
    @endforelse
    </div>
    {!! $objects->render() !!}
</div>
@stop
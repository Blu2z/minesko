@extends('layout')

@section('header')
    <title>Minesko | {{ trans('seo.news.title') }}</title>
    <meta name="Description" content="{{ trans('seo.news.description') }}">
    <meta name="Keywords" content="{{ trans('seo.news.keywords') }}">
@stop

@section('content')
<div class="content">
    <h1>
        <span class="content__head">Новости</span>
    </h1>
    @forelse($objects as $object)
    <div class="content__block">
        <div class="content__img">
            <div class="carousel carousel--big">
                <div class="item">
                    <a class="fancybox" rel="group1" href="/uploads/news/originals/{!! $object->img !!}">
                        <img class="lazyOwl" data-src="/uploads/news/thumbs/full/{!! $object->img !!}" alt="{!! $object->alt !!}">
                    </a>
                </div>
                @forelse($object->galleries()->sortBy('weight', SORT_REGULAR, false) as $img)
                <div class="item">
                    <a class="fancybox" rel="group1" href="/uploads/news/originals/{!! $img->img !!}">
                        <img class="lazyOwl" data-src="/uploads/news/thumbs/full/{!! $img->img !!}" alt="{!! $img->alt !!}">
                    </a>
                </div>
                @empty
                    <p>Здесь нет записей!</p>
                @endforelse
            </div>
        </div>
        <div class="content__text">
            <div class="content__title">{!! $object->title !!}</div>
            <div class="contact__desc">
                <p>{!! $object->text !!}</p>
            </div>
        </div>
    </div>
    @empty
        <p>Здесь нет записей!</p>
    @endforelse
    {!! $objects->render() !!}
</div>
@stop
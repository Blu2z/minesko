@extends('layout')

@section('header')
    <title>Minesko | {{ trans('seo.index.title') }}</title>
    <meta name="description" content="{{ trans('seo.index.description') }}">
    <meta name="keywords" content="{{ trans('seo.index.keywords') }}">
@stop

@section('content')

<div class="slider__head">
    <div class="slider__main">
        <ul class="slider__wrapper">
            @foreach($banners as $banner)
            <li>
                <div class="slider__img">
                    <img src="/uploads/banners/originals/{{$banner['img']}}" alt="slide1">
                </div>
                <div class="slider__anim block block--cost" data-time="{!! $banner['time'] !!}">
                    <div class="block--cost__name">{{ $banner['title'] }}</div>
                    <div class="block--cost__btn">
                        <span class="button">{{ $banner['description'] }}</span>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        <a href="#" class="nav nav--prev"></a>
        <a href="#" class="nav nav--next"></a>
    </div>
    <div class="slider__indicator">
        <ul>
            <li class="slider__ind active"></li>
            <li class="slider__ind"></li>
            <li class="slider__ind"></li>
            <li class="slider__ind"></li>
        </ul>
    </div>
</div>

<div class="content">
    <h1>
        <span class="content__head">о нас</span>
    </h1>
    <div class="content__block">
        <!-- <div class="logo logo--big">
            <span class="logo__lastname">Mineskko</span> <br>
                    <span class="logo__firstname">
                        <span class="clr--red">S</span>
                        <span>v</span>
                        <span>e</span>
                        <span>t</span>
                        <span>l</span>
                        <span>a</span>
                        <span>n</span>
                        <span>a</span>
                    </span>
        </div> -->
        <div class="content__img">
            <img src="./images/news-2.jpg" alt="foto">
        </div>
        <div class="content__text">
            <div class="content__desc">
                <div class="contact__desc">
                   {!! $about->text !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <h1>
        <span class="content__head">Услуги</span>
    </h1>
    @foreach($services as $service)
    <div class="content__block content__block--romb">
            <div class="content__text">
                    <div class="content__title">{!! $service->title !!}</div>
                    <div class="content__desc">
                            <div class="content__img">
                                    <img src="/uploads/services/originals/{{ $service->img }}" alt="foto">
                            </div>
                            <div class="content__wrapper">
                                    {!! $service->text !!}
                                    <div class="content__more">
                                            <a class="content__link" href="{!!url('contacts')!!}">заказать</a>
                                    </div>
                            </div>
                    </div>
            </div>
    </div>
    @endforeach
</div>
@stop
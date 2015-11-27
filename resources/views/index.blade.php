@extends('layout')

@section('header')
    <title>Minesko | {{ trans('seo.index.title') }}</title>
    <meta name="Description" content="{{ trans('seo.index.description') }}">
    <meta name="Keywords" content="{{ trans('seo.index.keywords') }}">
@stop

@section('content')
<div class="container">
	<div class="content">
		<h2 class="form-signin-heading">Индекс пэйдж</h2>
	</div>

    <br />
    <h2 class="form-signin-heading">Допустим это баннер:</h2>
    <ul>
    @forelse($banners as $banner)
    <li><a href="{{ url( $banner['url'] ) }}"><img src="/uploads/banners/thumbs/full/{{$banner['img']}}"></a></li>
    @empty
        <p>Здесь нет записей!</p>
    @endforelse
    </ul>
    @if ($about)
    <br />
    <h2 class="form-signin-heading">Что-то типа "О нас":</h2>
        {!! $about->text !!}
    @endif

    <br />
    <h2 class="form-signin-heading">А вот тут у нас типа услуги:</h2>
    <ul>
    @forelse($services as $service)
    <li><a href="{{ url( 'services/' . $service['alias'] ) }}"><img src="/uploads/services/thumbs/small/{{$service['img']}}">{{$service['title']}}</a></li>
    @empty
        <p>Здесь нет записей!</p>
    @endforelse
    </ul>

    <br />
    <h2 class="form-signin-heading">Слайдер:</h2>
    <ul>
    @forelse($gallery as $image)
    <li><img src="/uploads/photogalleries/thumbs/full/{{ $image->img }}"></li>
    @empty
        <p>Здесь нет записей!</p>
    @endforelse
    </ul>
</div>
@stop
@extends('layout')

@section('content')
    <div class="content">
        <h1>
            <span class="content__head">Услуги</span>
        </h1>

        @forelse($objects as $object)
            <div class="content__block content__block--romb">
                <div class="content__text">
                    <div class="content__title">{!!$object['title']!!}</div>
                    <div class="content__desc">
                        <div class="content__img">
                            <img src="/uploads/services/originals/{!!$object['img']!!}" alt="foto">
                        </div>
                        <div class="content__wrapper">
                            <p>
                                {!!$object['text']!!}
                            </p>
                            <div class="content__more">
                                <a class="content__link" href="#">заказать</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>Здесь нет записей!</p>
        @endforelse
    </div>
@stop
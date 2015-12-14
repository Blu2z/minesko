@extends('layout')

@section('header')
    <title>Minesko | {{ trans('seo.index.title') }}</title>
    <meta name="Description" content="{{ trans('seo.index.description') }}">
    <meta name="Keywords" content="{{ trans('seo.index.keywords') }}">
@stop

@section('content')

<div class="slider__head">
	<div class="slider__main">
		<ul class="slider__wrapper">
                    @forelse($banners as $banner)
			<li>
				<div class="slider__img">
					<img src="/uploads/banners/originals/{{$banner['img']}}" alt="slide1">
				</div>
				<div class="slider__anim block block--cost" data-time="$banner['time']">
					<div class="block--cost__name">{{ $banner['title'] }}</div>
					<div class="block--cost__btn">
						<a href="{{ url( $banner['url'] ) }}" class="button">{{ $banner['description'] }}</a></div>
				</div>
			</li>
                    @empty
                        <p>Здесь нет записей!</p>
                    @endforelse
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
        <div class="logo logo--big">
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
        </div>
        <div class="content__img">
            <img src="./images/news-2.jpg" alt="foto">
        </div>
        <div class="content__text">
            <div class="content__desc">
                <div class="contact__desc">
                    <p>
                        {!! $about->text !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
	<h1>
		<span class="content__head">Услуги</span>
	</h1>

	<div class="content__block content__block--romb">
		<div class="content__text">
			<div class="content__title">свадебные платья</div>
			<div class="content__desc">
				<div class="content__img">
					<img src="./images/collection-4.jpg" alt="foto">
				</div>
				<div class="content__wrapper">
					<p>
						Это качественная, эффектная, красивая и доступная осенне-зимняя коллекция, в ассортимент которой
						входят современные модели курток, пальто и плащей, как классического, так и повседневного стиля.
						Особое внимание уделено моделям пальто, так как этот вид женской верхней одежды уже несколько
						лет очень актуален и востребован. Это объясняется тем, что пальто идеально подходит для работы,
						отдыха, прогулки и даже для официальных мероприятий. Кроме того, являясь теплой и очень
						комфортной, наша верхняя одежда годится как для сухой, так и для дождливой погоды.
						<br>
						Сочетание качества, дизайна и цены делает ее доступной каждому и конкурентоспособной на
						современном рынке модной индустрии.
					</p>
					<div class="content__more">
						<a class="content__link" href="{!!url('contacts')!!}">заказать</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="content__block content__block--romb">
		<div class="content__text">
			<div class="content__title">вечерние платья</div>
			<div class="content__desc">
				<div class="content__img">
					<img src="./images/collection-2.jpg" alt="foto">
				</div>

				<div class="content__wrapper">
					<p>
						Свадебные платья коллекции - воплощение нежности, гармонии и изящества женской красоты.
						Романтичный образ стал главной темой новых коллекций. В белом платье из струящихся тканей и
						тончайших кружев невеста будет выглядеть безупречно стильно и невероятно нежно!
					</p>
					<div class="content__more">
						<a class="content__link" href="{!!url('contacts')!!}">закзать</a>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="content__block content__block--romb">
		<div class="content__text">
			<div class="content__title">женская одежда</div>
			<div class="content__desc">
				<div class="content__img">
					<img src="./images/collection-3.jpg" alt="foto">
				</div>

				<div class="content__wrapper">
					<p>
						Что хочет каждая девушка в мире? Быть модной и оригинальной личностью, выделяясь из толпы своим стилем и внешним видом, но при этом оставаясь в тренде, не отставая от основных модных тенденций. Чтобы соответствовать таким характеристикам, необходимо регулярно добавлять в свой гардероб красивую одежду из модных коллекций, которые шьются в ограниченных экземплярах. В первую очередь, такие вещи являются аутентичными, благодаря чему шанс того, что Вы приедете на вечеринку, на которой кто-то будет в том же коктейльном платье, что и Вы - крайне низок. 
					</p>
					<div class="content__more">
						<a class="content__link" href="{!!url('contacts')!!}">заказать</a>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="content__block content__block--romb">
		<div class="content__text">
			<div class="content__title">верхняя ожежда</div>
			<div class="content__desc">
				<div class="content__img">
					<img src="./images/collection-1.jpg" alt="foto">
				</div>

				<div class="content__wrapper">
					<p>
						Вечерние платья элегантны и роскошны, соблазнительны и потрясающе красивы. Сексуальные разрезы до бедра, декольте и  V-образные вырезы, изысканная вышивка и кружева, искрящиеся кристаллы и черный жемчуг и потрясающая палитра цветов, в которой есть все: классические черный и белый цвета, глубокие оттенки драгоценных камней, нежные пастельные тона и яркие краски. 
					</p>
					<div class="content__more">
						<a class="content__link" href="{!!url('contacts')!!}">заказать</a>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@stop
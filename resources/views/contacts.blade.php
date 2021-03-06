@extends('layout')

@section('header')
    <title>Minesko | {{ trans('seo.contacts.title') }}</title>
    <meta name="Description" content="{{ trans('seo.contacts.description') }}">
    <meta name="Keywords" content="{{ trans('seo.contacts.keywords') }}">
@stop

@section('content')
<div class="contact">
<h1>
	<span class="content__head">Контакты</span>
</h1>
	<div class="contact__container">
		<div class="content__title content__title--map">карта</div>
		<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=tLcseVnMefjaoS8WTn9EeXLNY1U0TSsj&id=map"></script>
		<div class="map__wrap">
			<div id="map" class="map"></div>
		</div>


		



		<div class="contact__info">
			<div class="content__title">контакты</div>
			<ul class="contact__list">
				<!-- <li>наши контакты:</li> -->
				<li><i class="fa fa-map-marker"></i> Украина, г. Одесса, ул Дерибасовская 1а</li>
				<li><i class="fa fa-phone"></i>097-470-72-36</li>
				<li><i class="fa fa-envelope-o"></i>minesko@gmail.com</li>
				<li><i class="fa fa-skype"></i>S.Mineskko</li>
				<li><i class="fa fa-instagram"></i>S.Mineskko</li>
				<li>
					<ul class="contact__socials">
						<li><a href="#"><i class="fa fa-vk"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="contact__container">
		
		<div class="content__title">Обратная связь</div>

                {!! Form::open(array('url'=>'contacts', 'method'=>'POST', 'id'=>'contactForm', 'class'=>'widget__content contact-form')) !!}
			<fieldset class="contact-form__row">
				<label for="name">Ваше имя&nbsp;<span class="required"></span></label>
				<input type="text" id="name" name="name" required="" value="{!! isset($input['name']) ? $input['name'] : '' !!}">
                                {!! isset($error['name'][0]) ? '<span>' . $error['name'][0] . '</span>' : '' !!}
			</fieldset>

			<fieldset class="contact-form__row">
				<label for="phone">Ваш телефон</label>
				<input type="phone" id="phone" name="phone" value="{!! isset($input['name']) ? $input['name'] : '' !!}">
                                {!! isset($error['phone'][0]) ? '<span>' . $error['phone'][0] . '</span>' : '' !!}
			</fieldset>

			<fieldset class="contact-form__row">
				<label for="email">E-mail&nbsp;<span class="required"></span></label>
				<input type="email" id="email" name="email" required="" pattern="^([a-zA-Z0-9_-]+\.)*[a-zA-Z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$" value="{!! isset($input['email']) ? $input['email'] : '' !!}">
                                {!! isset($error['email'][0]) ? '<span>' . $error['email'][0] . '</span>' : '' !!}
			</fieldset>

			<fieldset class="contact-form__row">
				<label for="message">Сообщение&nbsp;<span class="required"></span></label>
				<textarea name="message" id="message" cols="30" rows="10" required="">{!! isset($input['message']) ? $input['message'] : '' !!}</textarea>
                                {!! isset($error['message'][0]) ? '<span>' . $error['message'][0] . '</span>' : '' !!}
			</fieldset>
			<div class="contact__btn">
                            {!! Session::get('message') ? '<span class="content__link fake_button">' . Session::get('message') . '</span>' : '<button id="sendMessage"  class="content__link" type="submit">отправить сообщение</button>' !!}
			</div>
			<p id="result"></p>
		</form>

		<div class="content__title"></div>

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

		<div class="contact__desc">
			<p>Одежда играет не последнюю роль в жизни каждого  человека,дизайнерская одежда определяет не только статус,уровень дохода и даже род деятельности.

Дизайнерская одежда способна  рассказать о манерах человека,привычках и характере,а так же поможет подчеркнуть вашу индивидуальность.Светлана Минескко  учитывает эти  требования в равной степени при создании вашего неповторимого образа.

Фантазия и знания,стремление к новому, смелость в экспериментах — это главное, что отличает Светлану Минескко от многих дизайнеров . В наше время сложно поспеть за модой, к тому же не всем подходят модные новинки мировых бренедов. Вот почему дизайнер  Светлана Минескко предлагает Вам создать исключительно свой неповторимый стиль, который будет актуален, несмотря на изменчивость моды.

Практичность,повседневность, эксклюзивность и индивидуальный подход к каждому клиенту — это главное оружие дизайнера!Ткани,фурнитура и различные материалы  могут сами подсказать новую модель одежды. Почувствовать это поможет вам Светлана, и помните не существует "любимых"тканей.Сегодня хочется чего-то воздушного и лёгкого,она творит из шифона, органзы и шёлка; быть может завтрашний  будет строгим — твид, шерсть, коттон отлично подчеркнут  характер этого дня!

Приглашаем вас в нашу студию, где за чашечкой ароматного кофе,в приятной атмосфере с вами обсудят все детали вашего индивидуального </p>
		</div>
	</div>
</div>
@stop
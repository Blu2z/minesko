@extends('layout')

@section('header')
    <title>Minesko | {{ trans('seo.contacts.title') }}</title>
    <meta name="Description" content="{{ trans('seo.contacts.description') }}">
    <meta name="Keywords" content="{{ trans('seo.contacts.keywords') }}">
@stop

@section('content')
<div class="container">
	<div class="content">
		<h2 class="form-signin-heading">Наши контактные данные:</h2>
        <p>Телефон: +38048141234</p>
        <p>Факс: +38048141234</p>
        <p>Емэйл: minesco@gmail.com</p>
	</div>
</div>
@stop
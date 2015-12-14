@extends('layout')

@section('header')
<link rel="stylesheet" href="/styles/admin.css">
@stop

@section('content')
<div class="admin__login contact-form">
    @if (Session::has('status'))
        <div class="alert alert-success">
            {!! Session::get('status') !!}
        </div>
    @elseif (Session::has('error'))
        <div class="alert alert-danger">
            {!! Session::get('error') !!}
        </div>
    @endif
    <div class="content__title">
    	<h2>Востановление пароля</h2>
    </div>

	@if (Session::has('error'))
		{{ trans(Session::get('reason')) }}
	@elseif (Session::has('success'))
		An email with the password reset has been sent.
	@endif
	
	{!! Form::open(array('url' => url('admin/reset/password'), 'role' => 'form', 'class' => 'form-horizontal')) !!}

		 <fieldset class="contact-form__row">
		 	{!! Form::label('email', 'Email') !!}
			{!! Form::text('email') !!}
		</fieldset>

		 <div class="contact__btn">
		 	{!! Form::submit('Продолжить', ['class' => 'content__link']) !!}
		</div>

	{!! Form::close() !!}
</div>
@stop
@extends('layout')

@section('header')
<link rel="stylesheet" href="/styles/admin.css">
@stop

@section('content')
<div class="admin__login contact-form">
    <p>{!! isset($message) ? $message : '' !!}</p>
    <form class="form-horizontal" accept-charset="UTF-8" role="form" method="post" action="{!! url('administration/reset/password') !!}">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <fieldset class="contact-form__row">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{!! isset($email) ? $email : '' !!}" required>
            {!! isset($error['email'][0]) ? $error['email'][0] : '' !!}
        </fieldset>
        <div class="contact__btn">
            <input class="content__link" type="submit" value="Продолжить">
        </div>
    </form>
</div>
@stop
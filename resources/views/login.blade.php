@extends('layout')

@section('header')
<link rel="stylesheet" href="/styles/admin.css">
@stop

@section('content')


    <form class="form-signin admin__login contact-form" role="form" action="{{ url('administration/login') }}" method="post">
        <div class="content__title">
            <h2>Вход</h2>
        </div>
        
        <fieldset class="contact-form__row">
            <label for="email">E-MAIL</label>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" class="form-control" name="email" required autofocus />
        </fieldset>
        <fieldset class="contact-form__row">
            <label for="password">Пароль</label>
            <input type="password" class="form-control" name="password" required />
        </fieldset>
        <div class="clearfix">
            <a href="{{ url('administration/reset/password') }}" class="reset-pass">Забыли пароль?</a>
        </div>
       
        <fieldset class="contact-form__row">
            <input type="checkbox" name="remember" id="remember" value="remember-me">
            <label for="remember" class="admin__remember">Запомнить меня</label>

        </fieldset>  
        <div class="contact__btn">
             
            <button class="content__link" type="submit">Войти</button>
        </div>
        
    </form>


@stop
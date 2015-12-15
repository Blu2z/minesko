@extends('layout')
 
@section('header')
<link rel="stylesheet" href="/styles/admin.css">
@stop
 
@section('content')
    <div class="container">
        @if (isset($message))
            <div class="alert alert-danger">
                {!! $message !!}
            </div>
        @endif
 
        <h2>Восстановление пароля</h2>
 
        {!! Form::open(array('url' => url('administration/password/reset'), 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal')) !!}
            {!! Form::hidden('token', isset($token) ? $token : null) !!}
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Введите ваш E-Mail</label>
                <div class="col-sm-5">
                    {!! Form::email('email', isset($email) ? $email : null, array('class' => 'form-control')) !!}
                    <span>{!! isset($error['email'][0]) ? $error['email'][0] : '' !!}</span>
                </div>
            </div>
 
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Введите новый пароль</label>
                <div class="col-sm-5">
                    {!! Form::password('password', array('class' => 'form-control')) !!}
                    <span>{!! isset($error['password'][0]) ? $error['password'][0] : '' !!}</span>
                </div>
            </div>
 
            <div class="form-group">
                <label for="password_confirmation" class="col-sm-2 control-label">Повторите пароль</label>
                <div class="col-sm-5">
                    {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
                    <span>{!! isset($error['password'][0]) ? $error['password'][0] : '' !!}</span>
                </div>
            </div>
 
            <input type="hidden" name="token" value="{!! $token !!}" />
 
            <div class="form-group">
                <div class="col-sm-2">&nbsp;</div>
                <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary">Сохранить пароль</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@stop
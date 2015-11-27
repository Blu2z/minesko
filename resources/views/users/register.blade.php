@extends('layout')

@section('title')
Registration
@stop

@section('content')

<div class="container">
    @if ($errors->all())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <h1>Регистрация</h1>
{!! Form::open(array('url' => 'rest/auth/register', 'role' => 'form', 'class' => 'form-horizontal')) !!}
    <div class="form-group">
        {!! Form::label('email', 'E-Mail', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-5">
            {!! Form::email('email', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-5">
            {!! Form::password('password', array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('password_confirmation', 'Confirm your password', array('class' => 'col-sm-2 control-label')) !!}
        <div class="col-sm-5">
            {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-2">&nbsp;</div>
        <div class="col-sm-5">
            <button type="submit" class="btn btn-primary">Sign up</button>
        </div>
    </div>

{!! Form::close() !!}

</div>

@stop
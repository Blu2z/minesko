@extends('layout')

@section('title')
Password recovery
@stop

@section('content')
<div class="container">
    @if (Session::has('status'))
        <div class="alert alert-success">
            {!! Session::get('status') !!}
        </div>
    @elseif (Session::has('error'))
        <div class="alert alert-danger">
            {!! Session::get('error') !!}
        </div>
    @endif
    <h2>Password recovery</h2>

	@if (Session::has('error'))
		{{ trans(Session::get('reason')) }}
	@elseif (Session::has('success'))
		An email with the password reset has been sent.
	@endif
	
	{!! Form::open(array('url' => url('admin/reset/password'), 'role' => 'form', 'class' => 'form-horizontal')) !!}

		<p>{!! Form::label('email', 'Email') !!}
		{!! Form::text('email') !!}</p>

		<p>{!! Form::submit('Restore password') !!}</p>

	{!! Form::close() !!}
</div>
@stop
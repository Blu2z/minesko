@extends('layout')

@section('title')
Log in
@stop

@section('content')
<div class="container">

    <form class="form-signin" role="form" action="{{ url('administration/login') }}" method="post">
        <h2 class="form-signin-heading">Your data</h2>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" class="form-control" placeholder="Email" name="email" required autofocus />
        <input type="password" class="form-control" placeholder="Password" name="password" required />
        <label class="checkbox">
        <input type="checkbox" name="remember" value="remember-me">Remind me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button><br />
    </form>
        <a href="{{ url('administration/reset/password') }}">Forgot your password?</a><br />

</div>
@stop
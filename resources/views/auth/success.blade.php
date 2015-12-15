@extends('layout')

@section('header')
<link rel="stylesheet" href="/styles/admin.css">
@stop

@section('content')
<div class="admin__login contact-form">
    <p>{!! $message !!}</p>
</div>
@stop
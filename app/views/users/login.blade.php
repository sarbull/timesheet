@extends('layouts.simple')

@section('head')
<link href="/users/login.css" rel="stylesheet">
@stop

@section('content')
	{{ Form::open(['url' => 'login', 'method' => 'post', 'class' => 'form-signin']) }}
		<h2 class="form-signin-heading">Please sign in</h2>
		@if ($errors->all())
			<ul>
			@foreach ($errors->all() as $message)
				<li>{{$message}}</li>
			@endforeach
			</ul>
		@endif
		<div class="form-group">
			{{ Form::label('email','Email') }}
			{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email address', 'autofocus']) }}
		</div>
		<div class="form-group">
			{{ Form::label('password','Password') }}
			{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required']) }}
		</div>
		{{ HTML::link('/register', "Register", ['class' => 'btn btn-lg btn-success col-md-5'])}}
		{{ Form::submit('Sign in', ['class' => 'btn btn-lg btn-primary col-md-5 pull-right']) }}
	{{ Form::close() }}
@stop

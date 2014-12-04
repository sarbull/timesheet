@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h2>Register</h2>
		@if ($errors->all())
			<ul>
			@foreach ($errors->all() as $message)
				<li>{{$message}}</li>
			@endforeach
			</ul>
		@endif
		{{ Form::open(array('route' => array('user.store'), 'method' => 'post')) }}
		<div class="form-group">
			{{Form::label('email','Email')}}
			{{Form::text('email', null,array('class' => 'form-control'))}}
		</div>
		<div class="form-group">
			{{Form::label('password','Password')}}
			{{Form::password('password',array('class' => 'form-control'))}}
		</div>
		<div class="form-group">
			{{Form::label('password_confirmation','Password Confirm')}}
			{{Form::password('password_confirmation',array('class' => 'form-control'))}}
		</div>
		{{Form::submit('Register', array('class' => 'btn btn-primary'))}} or
		{{ HTML::link('/login', "Login", ['class' => 'btn btn-success'])}}
		{{ Form::close() }}
	</div>
</div>
@stop

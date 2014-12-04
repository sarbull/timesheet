@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h2>Create new project</h2>
		@if ($errors->all())
			<ul>
			@foreach ($errors->all() as $message)
				<li>{{$message}}</li>
			@endforeach
			</ul>
		@endif
		{{ Form::open(array('route' => ['projects.store'], 'method' => 'post')) }}
		<div class="form-group">
			{{Form::label('name','Name')}}
			{{Form::text('name', null, ['class' => 'form-control'])}}
		</div>
		{{Form::submit('Add', array('class' => 'btn btn-primary'))}}
		{{ Form::close() }}
	</div>
</div>
@stop

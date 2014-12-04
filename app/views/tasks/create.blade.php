@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h2>Create new task</h2>
		@if ($errors->all())
			<ul>
			@foreach ($errors->all() as $message)
				<li>{{$message}}</li>
			@endforeach
			</ul>
		@endif
		{{ Form::open(array('route' => ['tasks.store'], 'method' => 'post')) }}
		<div class="form-group">
			{{Form::label('title','Title')}}
			{{Form::text('title', null, ['class' => 'form-control'])}}
		</div>
		<div class="form-group">
			{{Form::label('task_id','Task ID')}}
			{{Form::text('task_id', null, ['class' => 'form-control'])}}
		</div>
		<div class="form-group">
			{{Form::label('url','Task URL')}}
			{{Form::text('url', null, ['class' => 'form-control'])}}
		</div>
		<div class="form-group">
			{{Form::label('status','Status')}}
			{{ Form::select('status', ['open' => 'open', 'closed' => 'closed'], ['class' => 'form-control']) }}
		</div>
		{{ Form::hidden('project_id', $project_id) }}
		{{Form::submit('Add', array('class' => 'btn btn-primary'))}}
		{{ Form::close() }}
	</div>
</div>
@stop

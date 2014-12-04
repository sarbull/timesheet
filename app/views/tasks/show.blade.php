@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-md-12">
		<h2>Task: {{ $task->title }}</h2>
		@if ($errors->all())
			<ul>
			@foreach ($errors->all() as $message)
				<li>{{$message}}</li>
			@endforeach
			</ul>
		@endif
		{{ Form::open(array('route' => ['timestamps.store'], 'method' => 'post')) }}
		<div class="form-group">
			{{Form::hidden('task_id', $task->id)}}
		</div>
		{{Form::submit('Start a new timestamp', array('class' => 'btn btn-primary'))}}
		{{ Form::close() }}
		{{
			HTML::linkRoute(
				'tasks.show',
				"Refresh",
				['task_id' => $task->id],
				['class' => 'btn btn-success']
			)
		}}
		@if($task->timestampss)
			<ul>
				@foreach ($task->timestampss as $timestamp)
					<li>
						<b>{{ $timestamp->start_date() }}</b>: {{ $timestamp->total_spent() }}
						@if(empty($timestamp->end))
							{{
								HTML::linkRoute(
									'timestamps.end',
									"End",
									['timestamp_id' => $timestamp->id],
									['class' => 'btn btn-warning']
								)
							}}
						@endif
					</li>
				@endforeach
			</ul>
		@endif
	</div>
</div>
@stop

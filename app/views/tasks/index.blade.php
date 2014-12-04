@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-md-12">
		<h2>Tasks for {{ $project->name }}</h2>
		@if($tasks)
			<ul>
				@foreach ($tasks as $task)
					<li>{{ HTML::linkRoute('tasks.show', $task->title, [$task->id]) }}</li>
				@endforeach
			</ul>
		@endif
	</div>
</div>
@stop

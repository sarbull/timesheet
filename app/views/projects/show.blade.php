@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-md-12">
		<h2>Project: {{ $project->name }}</h2>
		{{ HTML::linkRoute('tasks.create', "Add new task", [$project->id]) }}
		@if($project->tasks)
			<ul>
				@foreach ($project->tasks as $task)
					<li>{{ HTML::linkRoute('tasks.show', $task->title, [$task->id]) }}</li>
				@endforeach
			</ul>
		@endif
	</div>
</div>
@stop

@extends('layouts.default')
@section('content')
<div class="row">
	<div class="col-md-12">
		<h2>Projects</h2>
		{{ HTML::linkRoute('projects.create', "Add new project") }}
		@if($projects)
			<ul>
				@foreach ($projects as $project)
					<li>{{ HTML::linkRoute('projects.show', $project->name, [$project->id]) }}</li>
				@endforeach
			</ul>
		@endif
	</div>
</div>
@stop

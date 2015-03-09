@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@if(\Auth::user()->working_on)
				<div class="panel panel-default">
					<div class="panel-heading">You are currently working on</div>

					<div class="panel-body">
						<a href="{{ route('projects.tickets.show', ['project_id' => \Auth::user()->working_on->project->id, 'ticket_id' => \Auth::user()->working_on->id])}}">
							{{\Auth::user()->working_on->project->name}} -
							{{\Auth::user()->working_on->title}} -
							{{\Auth::user()->working_on->ref_id}}
						</a>
					</div>
				</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					You are logged in!
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

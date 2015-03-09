@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h3>Projects</h3>
      @if($projects->count())
        <table class="table table-striped table-bordered">
          <tr>
            <th>Name</th>
            <th>Company</th>
            <th>Hours spent</th>
            <th></th>
          </tr>
          @foreach($projects as $project)
            <tr>
              @if($project->repo_url)
                <td><a href="{{ $project->repo_url }}" target="_blank">{{$project->name}}</a></td>
              @else
                <td>{{$project->name}}</td>
              @endif
              <td>{{$project->company->name}}</td>
              <td>{{$project->hours_spent->format('%h hours %i minutes %s seconds')}}</td>
              <td><a href="{{ route('projects.show', ['id' => $project->id]) }}">Details</a></td>
            </tr>
          @endforeach
        </table>
      @else
        <p>No projects found.</p>
      @endif
    </div>
  </div>
</div>
@endsection

@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      @if($projects->count())
        <table class="table table-striped table-bordered">
          <tr>
            <th>Name</th>
            <th>Company</th>
            <th></th>
          </tr>
          @foreach($projects as $project)
            <tr>
              <td>{{$project->name}}</td>
              <td>{{$project->company->name}}</td>
              <td><a href="{{ route('projects.show', ['id' => $project->id]) }}">Details</a></td>
            </tr>
          @endforeach
        </table>
      @endif
    </div>
  </div>
</div>
@endsection

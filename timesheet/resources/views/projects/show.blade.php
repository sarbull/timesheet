@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h3>
        {{$project->name}}
          <span class="pull-right">
            <a href="{{ route('projects.edit', ['id' => $project->id])}}">
              Edit
            </a>
          </span>
      </h3>
      <table class="table table-striped table-bordered">
        <tr>
          <th>Name</th>
          <td>{{$project->name}}</td>
        </tr>
        <tr>
          <th>Company</th>
          <td>{{$project->company->name}}</td>
        </tr>
        <tr>
          <th>Total tickets</th>
          <td>{{$project->tickets->count()}}</td>
        </tr>
        <tr>
          <th>Hours spent</th>
          <td>{{$project->hours_spent->format('%y years %m months %d days %h hours %i minutes %s seconds')}}</td>
        </tr>
      </table>
      <h3>Tickets</h3>
      @if($project->tickets->count())
        <table class="table table-striped table-bordered">
          <tr>
            <th>Title</th>
            <th>Ref ID</th>
            <th>Status</th>
            <th>Hours spent</th>
            <th>Created at</th>
            <th></th>
          </tr>
          @foreach($project->tickets as $ticket)
            <tr>
              <td>{{$ticket->title}}</td>
              <td>{{$ticket->ref_id}}</td>
              <td>{{$ticket->status->name}}</td>
              <td>{{$ticket->hours_spent->format('%h hours %i minutes %s seconds')}}</td>
              <td>{{$ticket->created_at->diffForHumans() }}</td>
              <td><a href="{{ route('tickets.show', ['id' => $ticket->id]) }}">Details</a></td>
            </tr>
          @endforeach
        </table>
      @else 
        <p>No tickets were found.</p>
      @endif
    </div>
  </div>
</div>
@endsection
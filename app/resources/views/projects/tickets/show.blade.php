@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h3>
        {{$ticket->title}}
        <span class="pull-right">
          <a href="{{ route('projects.tickets.edit', ['project_id' => $ticket->project->id, 'ticket_id' => $ticket->id])}}">
            Edit
          </a>
        </span>
      </h3>
      <table class="table table-striped table-bordered">
        <tr>
          <th>Title</th>
          <td>{{$ticket->title}}</td>
        </tr>
        <tr>
          <th>Ref ID</th>
          <td><a href="{{ $ticket->url }}">#{{$ticket->ref_id}}</a></td>
        </tr>
        <tr>
          <th>Status</th>
          <td>{{$ticket->status->name}}</td>
        </tr>
        <tr>
          <th>Project</th>
          <td><a href="{{ route('projects.show', ['id' => $ticket->project->id])}}">{{$ticket->project->name}}</a></td>
        </tr>
        <tr>
          <th>Hours spent</th>
          <td>{{$ticket->hours_spent->format('%h hours %i minutes %s seconds')}}</td>
        </tr>
        <tr>
          <th>Created at</th>
          <td>{{$ticket->created_at }}</td>
        </tr>
      </table>
      <h3>
        Times
        @if($ticket->has_time_started)
          <span class="pull-right">
            <a href="{{ route('projects.tickets.times.start', ['id' => $ticket->id])}}">
              Start
            </a>
          </span>
        @endif
      </h3>
      @if($ticket->times->count())
        <table class="table table-striped table-bordered">
          <tr>
            <th>Duration</th>
            <th>Created at</th>
            <th>Status</th>
          </tr>
          @foreach($ticket->times as $time)
            <tr>
              <td>{{ $time->duration->format('%h hours %i minutes %s seconds') }}</td>
              <td>{{ $time->created_at }}</td>
              @if($time->stopped)
                <td>Stopped</td>
              @else
                <td><a href="{{ route('projects.tickets.times.stop', ['id' => $time->id]) }}">Stop</a></td>
              @endif
            </tr>
          @endforeach
        </table>
      @else 
        <p>No times were found.</p>
      @endif
    </div>
  </div>
</div>
@endsection

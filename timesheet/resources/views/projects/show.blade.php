@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h3>{{$project->name}}</h3>
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
      </table>
      <h3>Tickets</h3>
      @if($project->tickets->count())
        <table class="table table-striped table-bordered">
          <tr>
            <th>Title</th>
            <th>Ref ID</th>
            <th>Status</th>
            <th></th>
          </tr>
          @foreach($project->tickets as $ticket)
            <tr>
              <td>{{$ticket->title}}</td>
              <td>{{$ticket->ref_id}}</td>
              <td>{{$ticket->status->name}}</td>
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

@extends('app')

@section('content')
<style>
  #calendar tr td div {
    min-height: 90px;
    max-width:100px;
    min-width:80px;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h3>Last 30 days on {{$times->first()->ticket->project->name}}</h3>
      <h4>{{ $time_ago->format('Y-m-d')}} - {{ $today->format('Y-m-d') }}</h4>
      <table class="table table-bordered">
          <tr>
            <th>Date</th>
            <th>Task name</th>
            <th>#ID</th>
            <th>Hours</th>
          </tr>
          @foreach($times as $time)
            <tr>
              <td>{{ $time->created_at }}</td>
              <td>{{ $time->ticket->title }}</td>
              <td><a href="{{ $time->ticket->url }}">#{{ $time->ticket->ref_id}}</a></td>
              <td>{{ $time->hour }}</td>
            </tr>
          @endforeach
      </table>
    </div>
  </div>
</div>
@endsection

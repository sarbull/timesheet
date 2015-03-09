@extends('app')

@section('content')
<style>
  #calendar tr td div {
    min-height: 100px;
    min-width:100px;
  }
</style>
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
      <h3>{{ $month }}</h3>
      <table id="calendar" class="table table-bordered">
          @foreach($month as $week)
          <tr>
              @foreach($week as $day)
                @if( $today->format("d") == $day->format("d") )
                  <td style="background-color:#eee">
                @else
                  <td>
                @endif
                <div>
                  {{ $day->format("D")}} <strong>{{ $day->format("d") }}</strong>
                  @foreach($times as $time)
                    @if($time->created_at->format('Y-m-d') == $day->format('Y-m-d'))
                      <br>
                      <a href="{{route('projects.tickets.show', ['project_id' => $time->ticket->project->id, 'ticket_id' => $time->ticket->id])}}">#{{ $time->ticket->ref_id }}</a>
                      {{ $time->hour }}h
                    @endif
                  @endforeach
                </div>
                </td>
              @endforeach
          </tr>
          @endforeach
      </table>
    </div>
  </div>
</div>
@endsection


@if(Route::currentRouteName() == "projects.tickets.create")
  {!! Form::model($ticket, ['route' => ['projects.tickets.store', 'project_id' => $project->id], 'class' => 'form-horizontal']) !!}
@elseif(Route::currentRouteName() == "projects.tickets.edit")
  {!! Form::model($ticket, ['route' => ['projects.tickets.update', 'project_id' => $project->id, 'ticket_id' => $ticket->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
@endif

<div class="form-group">
  {!! Form::label('ticket[title]', 'Title', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('ticket[title]', $ticket->title, ['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('ticket[url]', 'URL', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('ticket[url]', $ticket->url, ['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('ticket[ref_id]', 'Ref ID', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('ticket[ref_id]', $ticket->ref_id, ['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('ticket[company_id]', 'Status', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::select('ticket[status_id]', $statuses->lists('name', 'id'), $ticket->status_id, ['class' => 'form-control']) !!}
  </div>
</div>

@if(Route::currentRouteName() == "projects.tickets.create")
  <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
      <a class="btn btn-danger" href="{{ route('projects.show', ['id' => $project->id]) }}">Cancel</a>
      <button type="submit" class="btn btn-success">Create</button>
    </div>
  </div>
@elseif(Route::currentRouteName() == "projects.tickets.edit")
  <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
      <a class="btn btn-danger" href="{{ route('projects.tickets.show', ['project_id' => $ticket->project->id, 'ticket_id' => $ticket->id]) }}">Cancel</a>
      <button type="submit" class="btn btn-success">Update</button>
    </div>
  </div>
@endif

{!! Form::close() !!}

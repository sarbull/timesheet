
@if(Route::currentRouteName() == "projects.create")
  {!! Form::model($project, ['route' => ['projects.store'], 'class' => 'form-horizontal']) !!}
@elseif(Route::currentRouteName() == "projects.edit")
  {!! Form::model($project, ['route' => ['projects.update', 'id' => $project->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
@endif

<div class="form-group">
  {!! Form::label('project[name]', 'Name', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('project[name]', $project->name, ['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('project[repo_url]', 'Repo URL', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('project[repo_url]', $project->repo_url, ['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('project[description]', 'Description', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::textarea('project[description]', $project->description, ['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('project[production_url]', 'Production URL', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('project[production_url]', $project->production_url, ['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('project[development_url]', 'Development URL', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('project[development_url]', $project->development_url, ['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('project[test_url]', 'Test URL', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('project[test_url]', $project->test_url, ['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('project[company_id]', 'Company', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::select('project[company_id]', $companies->lists('name', 'id'), $project->company_id, ['class' => 'form-control']) !!}
  </div>
</div>

@if(Route::currentRouteName() == "projects.create")
  <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
      <a class="btn btn-danger" href="{{ url('/projects') }}">Cancel</a>
      <button type="submit" class="btn btn-success">Create</button>
    </div>
  </div>
@elseif(Route::currentRouteName() == "projects.edit")
  <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
      <a class="btn btn-danger" href="{{ route('projects.show', ['id' => $project->id]) }}">Cancel</a>
      <button type="submit" class="btn btn-success">Update</button>
    </div>
  </div>
@endif

{!! Form::close() !!}

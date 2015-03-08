
@if(Route::currentRouteName() == "companies.create")
  {!! Form::model($company, ['route' => ['companies.store'], 'class' => 'form-horizontal']) !!}
@elseif(Route::currentRouteName() == "companies.edit")
  {!! Form::model($company, ['route' => ['companies.update', 'id' => $company->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
@endif

<div class="form-group">
  {!! Form::label('company[name]', 'Name', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::text('company[name]', $company->name, ['class' => 'form-control']) !!}
  </div>
</div>

@if(Route::currentRouteName() == "companies.create")
  <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
      <a class="btn btn-danger" href="{{ url('/projects') }}">Cancel</a>
      <button type="submit" class="btn btn-success">Create</button>
    </div>
  </div>
@elseif(Route::currentRouteName() == "companies.edit")
  <div class="form-group">
    <div class="col-md-6 col-md-offset-4">
      <a class="btn btn-danger" href="{{ route('companies.show', ['id' => $company->id]) }}">Cancel</a>
      <button type="submit" class="btn btn-success">Update</button>
    </div>
  </div>
@endif

{!! Form::close() !!}

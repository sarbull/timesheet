@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h3>Create a project</h3>
      @include('projects.form')
    </div>
  </div>
</div>
@endsection
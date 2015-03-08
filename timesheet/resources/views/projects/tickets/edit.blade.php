@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h3>Edit a ticket</h3>
      @include('projects.tickets.form')
    </div>
  </div>
</div>
@endsection

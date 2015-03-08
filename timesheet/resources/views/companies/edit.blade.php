@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h3>Edit a company</h3>
      @include('companies.form')
    </div>
  </div>
</div>
@endsection

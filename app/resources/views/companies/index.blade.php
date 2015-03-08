@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h3>Companies</h3>
      @if($companies->count())
        <table class="table table-striped table-bordered">
          <tr>
            <th>Name</th>
            <th></th>
          </tr>
          @foreach($companies as $company)
            <tr>
              <td>{{$company->name}}</td>
              <td><a href="{{ route('companies.show', ['id' => $company->id]) }}">Details</a></td>
            </tr>
          @endforeach
        </table>
      @else
        <p>No companies found.</p>
      @endif
    </div>
  </div>
</div>
@endsection

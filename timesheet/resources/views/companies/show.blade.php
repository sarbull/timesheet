@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h3>
        {{$company->name}}
          <span class="pull-right">
            <a href="{{ route('companies.edit', ['id' => $company->id])}}">
              Edit
            </a>
          </span>
      </h3>
      <table class="table table-striped table-bordered">
        <tr>
          <th>Name</th>
          <td>{{$company->name}}</td>
        </tr>
      </table>
    </div>
  </div>
</div>
@endsection

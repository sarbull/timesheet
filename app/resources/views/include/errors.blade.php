@if ($errors->all())
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
          <div class="alert alert-danger" role="alert">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
      </div>
    </div>
  </div>
@endif

@if (Session::get('success'))
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="alert alert-success" role="alert">
          {{Session::get('success')}}
        </div>
      </div>
    </div>
  </div>
@endif

@if (Session::get('info'))
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="alert alert-info" role="alert">
          {{Session::get('info')}}
        </div>
      </div>
    </div>
  </div>
@endif

@if (Session::get('warning'))
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="alert alert-warning" role="alert">
          {{Session::get('warning')}}
        </div>
      </div>
    </div>
  </div>
@endif

@if (Session::get('danger'))
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="alert alert-danger" role="alert">
          {{Session::get('danger')}}
        </div>
      </div>
    </div>
  </div>
@endif

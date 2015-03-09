<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle Navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">Timesheet</a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              @if (Auth::user())
                <li><a href="{{ url('/') }}">Dashboard</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Projects <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/projects') }}">Index</a></li>
                    <li><a href="{{ url('/projects/create') }}">Create</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Companies <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/companies') }}">Index</a></li>
                    <li><a href="{{ url('/companies/create') }}">Create</a></li>
                  </ul>
                </li>
              @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
              @if (Auth::guest())
                <li><a href="{{ url('/auth/login') }}">Login</a></li>
                <li><a href="{{ url('/auth/register') }}">Register</a></li>
              @else
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                  </ul>
                </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
</div>

	<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Timesheet</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					@if (Auth::check())
						<li><a href="/projects">Projects</a></li>
					@endif
				</ul>
				<ul class="nav navbar-nav pull-right">
					@if (Auth::check())
						<li><a href="/logout">Logout</a></li>
					@else
						<li><a href="/login">Login</a></li>
					@endif
				</ul>
			</div><!-- /.nav-collapse -->
		</div><!-- /.container -->
	</nav><!-- /.navbar -->

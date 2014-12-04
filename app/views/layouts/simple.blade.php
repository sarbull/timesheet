<!DOCTYPE html>
<html lang="en">
	<head>
		@include('include.head')
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					@yield('content')
				</div>
			</div>
		</div>
		@include('include.javascripts')
	</body>
</html>

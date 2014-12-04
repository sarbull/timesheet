<!DOCTYPE html>
<html lang="en">
	<head>
		@include('include.head')
	</head>
	<body>
		@include('include.menu')
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					@yield('content')
				</div>
			</div>
			@include('include.footer')
		</div>
	</body>
</html>

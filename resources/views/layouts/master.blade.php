<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Learn Laravel</title>
</head>
<body>
	@if (session()->has('success'))
		<div class="alert alert-success">
			{{ session()->get('success') }}
		</div>
	@endif

	@if (isset($error) && $errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	@yield('content')
</body>
</html>
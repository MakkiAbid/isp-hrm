<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield("title")</title>
	<link rel="stylesheet" href="{{ base_url('assets/app.css') }}">
	@yield("styles")
</head>
<body>
	

	@yield("content")


	<script src="{{ base_url('assets/runtime.js') }}"></script>
	<script src="{{ base_url('assets/vendors~app.js') }}"></script>
	<script src="{{ base_url('assets/app.js') }}"></script>
	@yield("scripts")
</body>
</html>
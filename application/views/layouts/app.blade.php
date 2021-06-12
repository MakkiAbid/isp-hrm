<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ISP HRM | @yield("title")</title>
	{!! encore_entry_link_tags('app') !!}
	@yield("styles")
</head>
<body>

	<div class="wrapper">

		@include('includes/topbar')
		@include('includes/sidebar')


		@yield("content")
	</div>


	{!! encore_entry_script_tags('app') !!}
	@yield("scripts")
</body>
</html>
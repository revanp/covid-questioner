<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }} @hasSection ('title') | @yield('title') @endif</title>

	@include('layouts.partials-admin.style')

	<link rel="shortcut icon" href="images/favicon.png" />
</head>

@if (!Auth::guest())
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		@include('layouts.partials-admin.header')
		@include('layouts.partials-admin.sidebar')

		<div class="content-wrapper">
	        @yield('content')
	  	</div>
	</div>

	@include('layouts.partials-admin.script')
</body>
@else
<body class="hold-transition login-page">
	@yield('content')

	@include('layouts.partials-admin.script')
</body>
@endif
</html>
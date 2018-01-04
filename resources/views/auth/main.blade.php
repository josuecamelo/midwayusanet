<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
</head>
<body>
<header>
	<div id="logo">
		<img src="{{ asset('img/logo-midway-build-yourself.svg') }}" alt="Midway">
	</div>
</header>
@yield('main')
</body>
</html>
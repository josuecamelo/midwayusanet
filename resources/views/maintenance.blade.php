<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<title>Midway Labs USA</title>
	<link href="{{ asset('css/site.css') }}" rel="stylesheet">
	<style>
		a, footer {
			margin: 72px;
			display: block;
		}

		img {
			width: 200px;
		}
	</style>
</head>
<body class="text-center">
<h1>
	<a href="{{ route('home') }}">
		<img src="{{ asset('img/logo-midway-build-yourself.svg') }}" alt="Midway">
	</a>
</h1>
<h2>SITE UNDER CONSTRUCTION</h2>
<p><i>Soon a new site with many new features.</i></p>
<p><a href="{{ route('home') }}">Click here to access the site under construction.</a></p>
<footer>© {{ date('Y') }} Midway Labs USA</footer>
</body>
</html>
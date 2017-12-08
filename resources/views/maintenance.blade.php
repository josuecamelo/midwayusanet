<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Midway Labs USA</title>
	<link href="{{ asset('css/site.css') }}" rel="stylesheet">
	<style>
		h1 {
			margin-top: 200px;
		}
	</style>
</head>
<body>
<header id="header">
	<div class="container">
		<div class="row">
			<div class="col-md-12" id="logo">
				<h1>
					<a href="/">
						<img src="{{ asset('img/midway.svg') }}" alt="Midway">
					</a>
				</h1>
				<h1>
					<a href="/">
						<img src="{{ asset('img/military.svg') }}" alt="Military">
					</a>
				</h1>
				<h1>
					<a href="/">
						<img src="{{ asset('img/made-in-usa.svg') }}" alt="Made in usa">
					</a>
				</h1>
			</div>
		</div>
	</div>
</header>
<h1 class="text-center">Site em construção</h1>
<p class="text-center">Em breve um novo site com muitas novidades.</p>
<footer class="text-center">© {{ date('Y') }} Midway Labs USA</footer>
<script src="{{ asset('js/site.js') }}"></script>
</body>
</html>
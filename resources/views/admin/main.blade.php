<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Dashboard | Midway Labs USA</title>
	<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
	@yield('css')
</head>
<body>
<nav class="navbar bg-dark">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ route('admin') }}"><i class="fa fa-th" aria-hidden="true"></i> Dashboard</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Blog <span class="caret"></span></a>
					<ul class="dropdown-menu">
						@can('posts.news')
							<li><a href="{{ route('posts.news') }}"><i class="fa fa-newspaper-o" aria-hidden="true"></i>News Blog</a></li>
						@endcan
						@can('posts.create')
							<li><a href="{{ route('posts.create', 1) }}"><i class="fa fa-file-o" aria-hidden="true"></i>New News Post</a></li>
						@endcan
						<li class="divider"></li>
						@can('posts.science')
							<li><a href="{{ route('posts.science') }}"><i class="fa fa-flask" aria-hidden="true"></i>Science Blog</a></li>
						@endcan
						@can('posts.create')
							<li><a href="{{ route('posts.create', 0) }}"><i class="fa fa-file-o" aria-hidden="true"></i>New Science Post</a></li>
						@endcan
						<li class="divider"></li>
						@can('categories.index')
							<li><a href="{{ route('categories.index', 0) }}"><i class="fa fa-asterisk" aria-hidden="true"></i>Categories</a></li>
						@endcan
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Stores <span class="caret"></span></a>
					<ul class="dropdown-menu">
						@can('lojas.listar')
							<li><a href="{{ route('lojas.listar') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>All Stores</a></li>
						@endcan
						@can('lojas.criar')
							<li><a href="{{ route('lojas.criar') }}"><i class="fa fa-shopping-basket" aria-hidden="true"></i>New Store</a></li>
						@endcan
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cubes" aria-hidden="true"></i> Products <span class="caret"></span></a>
					<ul class="dropdown-menu">
						@can('produtos.listar')
							<li><a href="{{ route('produtos.listar') }}"><i class="fa fa-cubes" aria-hidden="true"></i>All Products</a></li>
						@endcan
						@can('produtos.criar')
							<li><a href="{{ route('produtos.criar') }}"><i class="fa fa-cube" aria-hidden="true"></i>New Product</a></li>
						@endcan
						@can('linhas.listar')
							<li><a href="{{ route('linhas.listar') }}"><i class="fa fa-bars" aria-hidden="true"></i>Lines</a></li>
						@endcan
						@can('tipos.listar')
							<li><a href="{{ route('tipos.listar') }}"><i class="fa fa-tags" aria-hidden="true"></i>Types</a></li>
						@endcan
						@can('categorias.listar')
							<li><a href="{{ route('categorias.listar') }}"><i class="fa fa-asterisk" aria-hidden="true"></i>Categories</a></li>
						@endcan
						@can('objetivos.listar')
							<li><a href="{{ route('objetivos.listar') }}"><i class="fa fa-crosshairs" aria-hidden="true"></i>Goals</a></li>
						@endcan
						@can('sabores.listar')
							<li><a href="{{ route('sabores.listar') }}"><i class="fa fa-apple" aria-hidden="true"></i>Flavors</a></li>
						@endcan
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users" aria-hidden="true"></i>Athletes <span class="caret"></span></a>
					<ul class="dropdown-menu">
						@can('atletas.listar')
							<li><a href="{{ route('atletas.listar') }}"><i class="fa fa-users" aria-hidden="true"></i>All Athletes</a></li>
						@endcan
						@can('atletas.criar')
							<li><a href="{{ route('atletas.criar') }}"><i class="fa fa-user" aria-hidden="true"></i>New Athlete</a></li>
						@endcan
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-youtube-play" aria-hidden="true"></i>
						Videos
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						@can('videos.listar')
							<li><a href="{{ route('videos.listar') }}"><i class="fa fa-youtube-play" aria-hidden="true"></i>All Videos</a></li>
						@endcan
						@can('videos.categorias.listar')
							<li><a href="{{ route('videos.categorias.listar') }}"><i class="fa fa-asterisk" aria-hidden="true"></i>Video Categories</a></li>
						@endcan
						@can('videos.criar')
							<li><a href="{{ route('videos.criar') }}"><i class="fa fa-youtube-square" aria-hidden="true"></i>New Video</a></li>
						@endcan
					</ul>
				</li>
				{{--<li class="dropdown">--}}
				{{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs" aria-hidden="true"></i>Treinos <span class="caret"></span></a>--}}
				{{--<ul class="dropdown-menu">--}}
				{{--@can('treinos.listar')--}}
				{{--<li><a href="{{ route('treinos.listar') }}"><i class="fa fa-cogs" aria-hidden="true"></i>Todos os Treinos</a></li>--}}
				{{--@endcan--}}
				{{--@can('treinos.categorias.listar')--}}
				{{--<li><a href="{{ route('treinos.categorias.listar') }}"><i class="fa fa-asterisk" aria-hidden="true"></i>Categorias de Treinos</a></li>--}}
				{{--@endcan--}}
				{{--@can('treinos.criar')--}}
				{{--<li><a href="{{ route('treinos.criar') }}"><i class="fa fa-cog" aria-hidden="true"></i>Novo Treino</a></li>--}}
				{{--@endcan--}}
				{{--</ul>--}}
				{{--</li>--}}
				<li>
					<a href="{{ route('menus.listar') }}" class="dropdown-toggle" role="button"><i class="fa fa-th" aria-hidden="true"></i>Menu</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle-o" aria-hidden="true"></i>{{ Auth::user()->name }} <span class="caret"></span></a>
					<ul class="dropdown-menu">
						{{--<li><a href="#"><i class="fa fa-address-card-o" aria-hidden="true"></i>Alterar dados</a></li>--}}
						{{--<li role="separator" class="divider"></li>--}}
						<li>
							<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="fa fa-sign-out" aria-hidden="true"></i>Exit
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
@yield('main')
<footer>© {{ date('Y') }} Midway Labs USA</footer>
<script type="text/javascript">
	var base_url = "{{ url('/')  }}"
</script>
<script src="{{ asset('js/admin.js') }}"></script>
@yield('js')
</body>
</html>
@extends('admin.main')

@section('css')
	<style>
		#dashboard {
			padding-top: 30px;
		}

		#dashboard .row {
			margin-bottom: 28px;
		}

		#dashboard a {
			padding: 15px;
		}

		#dashboard a i {
			font-size: 40px;
			display: block;
			margin-bottom: 10px;
		}
	</style>
@endsection

@section('main')

	<div class="container" id="dashboard">
		<div class="row">
			@can('lojas.listar')
				<div class="col-md-3">
					<a href="{{ route('posts.news') }}" class="btn btn-lg btn-block btn-primary"><i class="fa fa-newspaper-o" aria-hidden="true"></i>News Blog</a>
				</div>
			@endcan
			@can('lojas.listar')
				<div class="col-md-3">
					<a href="{{ route('posts.create', 1) }}" class="btn btn-lg btn-block btn-primary"><i class="fa fa-file-o" aria-hidden="true"></i>New News Post</a>
				</div>
			@endcan
			@can('lojas.listar')
				<div class="col-md-3">
					<a href="{{ route('posts.science') }}" class="btn btn-lg btn-block btn-primary"><i class="fa fa-flask" aria-hidden="true"></i>Science Blog</a>
				</div>
			@endcan
			@can('lojas.criar')
				<div class="col-md-3">
					<a href="{{ route('posts.create', 0) }}" class="btn btn-lg btn-block btn-primary"><i class="fa fa-file-o" aria-hidden="true"></i>New Science Post</a>
				</div>
			@endcan
		</div>
		<div class="row">
			@can('lojas.listar')
				<div class="col-md-6">
					<a href="{{ route('lojas.listar') }}" class="btn btn-lg btn-block btn-info"><i class="fa fa-shopping-cart" aria-hidden="true"></i>All Stores</a>
				</div>
			@endcan
			@can('lojas.criar')
				<div class="col-md-6">
					<a href="{{ route('lojas.criar') }}" class="btn btn-lg btn-block btn-info"><i class="fa fa-shopping-basket" aria-hidden="true"></i>New Store</a>
				</div>
			@endcan
		</div>
		<div class="row">
			@can('produtos.listar')
				<div class="col-md-4">
					<a href="{{ route('produtos.listar') }}" class="btn btn-lg btn-block btn-success"><i class="fa fa-cubes" aria-hidden="true"></i>All Products</a>
				</div>
			@endcan
			@can('produtos.criar')
				<div class="col-md-4">
					<a href="{{ route('produtos.criar') }}" class="btn btn-lg btn-block btn-success"><i class="fa fa-cube" aria-hidden="true"></i>New Product</a>
				</div>
			@endcan
			@can('linhas.listar')
				<div class="col-md-4">
					<a href="{{ route('linhas.listar') }}" class="btn btn-lg btn-block btn-success"><i class="fa fa-bars" aria-hidden="true"></i>Product Lines</a>
				</div>
			@endcan
		</div>
		<div class="row">
			@can('tipos.listar')
				<div class="col-md-3">
					<a href="{{ route('tipos.listar') }}" class="btn btn-lg btn-block btn-success"><i class="fa fa-tags" aria-hidden="true"></i>Product Types</a>
				</div>
			@endcan
			@can('categorias.listar')
				<div class="col-md-3">
					<a href="{{ route('categorias.listar') }}" class="btn btn-lg btn-block btn-success"><i class="fa fa-asterisk" aria-hidden="true"></i>Product Categories</a>
				</div>
			@endcan
			@can('objetivos.listar')
				<div class="col-md-3">
					<a href="{{ route('objetivos.listar') }}" class="btn btn-lg btn-block btn-success"><i class="fa fa-crosshairs" aria-hidden="true"></i>Product Goals</a>
				</div>
			@endcan
			@can('sabores.listar')
				<div class="col-md-3">
					<a href="{{ route('sabores.listar') }}" class="btn btn-lg btn-block btn-success"><i class="fa fa-apple" aria-hidden="true"></i>Product Flavors</a>
				</div>
			@endcan
		</div>
		<div class="row">
			@can('atletas.listar')
				<div class="col-md-6">
					<a href="{{ route('atletas.listar') }}" class="btn btn-lg btn-block btn-warning"><i class="fa fa-users" aria-hidden="true"></i>All</a>
				</div>
			@endcan
			@can('atletas.criar')
				<div class="col-md-6">
					<a href="{{ route('atletas.criar') }}" class="btn btn-lg btn-block btn-warning"><i class="fa fa-user" aria-hidden="true"></i>New Athlete</a>
				</div>
			@endcan
		</div>
		<div class="row">
			@can('videos.listar')
				<div class="col-md-4">
					<a href="{{ route('videos.listar') }}" class="btn btn-lg btn-block btn-danger"><i class="fa fa-youtube-play" aria-hidden="true"></i>All Videos</a>
				</div>
			@endcan
			@can('videos.categorias.listar')
				<div class="col-md-4">
					<a href="{{ route('videos.categorias.listar') }}" class="btn btn-lg btn-block btn-danger"><i class="fa fa-asterisk" aria-hidden="true"></i>Video Categories</a>
				</div>
			@endcan
			@can('videos.criar')
				<div class="col-md-4">
					<a href="{{ route('videos.criar') }}" class="btn btn-lg btn-block btn-danger"><i class="fa fa-youtube-square" aria-hidden="true"></i>New Video</a>
				</div>
			@endcan
		</div>
		{{--<div class="row">--}}
		{{--@can('treinos.listar')--}}
		{{--<div class="col-md-4">--}}
		{{--<a href="{{ route('treinos.listar') }}" class="btn btn-lg btn-block btn-danger"><i class="fa fa-cogs" aria-hidden="true"></i>Todos os Treinos</a>--}}
		{{--</div>--}}
		{{--@endcan--}}
		{{--@can('treinos.categorias.listar')--}}
		{{--<div class="col-md-4">--}}
		{{--<a href="{{ route('treinos.categorias.listar') }}" class="btn btn-lg btn-block btn-danger"><i class="fa fa-asterisk" aria-hidden="true"></i>Categorias de Treinos</a>--}}
		{{--</div>--}}
		{{--@endcan--}}
		{{--@can('treinos.criar')--}}
		{{--<div class="col-md-4">--}}
		{{--<a href="{{ route('treinos.criar') }}" class="btn btn-lg btn-block btn-danger"><i class="fa fa-cog" aria-hidden="true"></i>Novo Treino</a>--}}
		{{--</div>--}}
		{{--@endcan--}}
		{{--</div>--}}
	</div>

@endsection
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
			<div class="col-md-6">
				<a href="{{ route('lojas.listar') }}" class="btn btn-lg btn-block btn-info"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Todas as Lojas</a>
			</div>
			@endcan
            @can('lojas.criar')
			<div class="col-md-6">
				<a href="{{ route('lojas.criar') }}" class="btn btn-lg btn-block btn-info"><i class="fa fa-shopping-basket" aria-hidden="true"></i>Nova Loja</a>
			</div>
            @endcan
		</div>
		<div class="row">
			@can('produtos.listar')
			<div class="col-md-4">
				<a href="{{ route('produtos.listar') }}" class="btn btn-lg btn-block btn-success"><i class="fa fa-cubes" aria-hidden="true"></i>Todos os Produtos</a>
			</div>
			@endcan
            @can('produtos.criar')
			<div class="col-md-4">
				<a href="{{ route('produtos.criar') }}" class="btn btn-lg btn-block btn-success"><i class="fa fa-cube" aria-hidden="true"></i>Novo Produto</a>
			</div>
            @endcan
            @can('linhas.listar')
			<div class="col-md-4">
				<a href="{{ route('linhas.listar') }}" class="btn btn-lg btn-block btn-success"><i class="fa fa-bars" aria-hidden="true"></i>Linhas de Produtos</a>
			</div>
            @endcan
		</div>
		<div class="row">
            @can('tipos.listar')
			<div class="col-md-3">
				<a href="{{ route('tipos.listar') }}" class="btn btn-lg btn-block btn-success"><i class="fa fa-tags" aria-hidden="true"></i>Tipos de Produtos</a>
			</div>
            @endcan
            @can('categorias.listar')
			<div class="col-md-3">
				<a href="{{ route('categorias.listar') }}" class="btn btn-lg btn-block btn-success"><i class="fa fa-asterisk" aria-hidden="true"></i>Categorias de Produtos</a>
			</div>
            @endcan
            @can('objetivos.listar')
			<div class="col-md-3">
				<a href="{{ route('objetivos.listar') }}" class="btn btn-lg btn-block btn-success"><i class="fa fa-crosshairs" aria-hidden="true"></i>Objetivos de Produtos</a>
			</div>
            @endcan
            @can('sabores.listar')
			<div class="col-md-3">
				<a href="{{ route('sabores.listar') }}" class="btn btn-lg btn-block btn-success"><i class="fa fa-apple" aria-hidden="true"></i>Sabores de Produtos</a>
			</div>
            @endcan
		</div>
		<div class="row">
			@can('atletas.listar')
            <div class="col-md-6">
				<a href="{{ route('atletas.listar') }}" class="btn btn-lg btn-block btn-warning"><i class="fa fa-users" aria-hidden="true"></i>Todos os Atletas</a>
			</div>
            @endcan
            @can('atletas.criar')
			<div class="col-md-6">
				<a href="{{ route('atletas.criar') }}" class="btn btn-lg btn-block btn-warning"><i class="fa fa-user" aria-hidden="true"></i>Novo Atleta</a>
			</div>
            @endcan
		</div>
		<div class="row">
            @can('treinos.listar')
			<div class="col-md-4">
				<a href="{{ route('treinos.listar') }}" class="btn btn-lg btn-block btn-danger"><i class="fa fa-cogs" aria-hidden="true"></i>Todos os Treinos</a>
			</div>
            @endcan
            @can('treinos.categorias.listar')
			<div class="col-md-4">
				<a href="{{ route('treinos.categorias.listar') }}" class="btn btn-lg btn-block btn-danger"><i class="fa fa-asterisk" aria-hidden="true"></i>Categorias de Treinos</a>
			</div>
            @endcan
            @can('treinos.criar')
			<div class="col-md-4">
				<a href="{{ route('treinos.criar') }}" class="btn btn-lg btn-block btn-danger"><i class="fa fa-cog" aria-hidden="true"></i>Novo Treino</a>
			</div>
            @endcan
		</div>
	</div>

@endsection
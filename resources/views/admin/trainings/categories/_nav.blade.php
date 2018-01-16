@include('flash::message')

<div class="bg-light lter b-b hidden-print">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-page" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ route('treinos.categorias.listar') }}"><i class="fa fa-asterisk" aria-hidden="true"></i> Categorias de treinos</a>
			</div>
			<div class="collapse navbar-collapse" id="menu-page">
				<ul class="nav navbar-nav">
					<li{{ (Route::is('treinos.categorias.listar') ? ' class=active' : '') }}><a href="{{ route('treinos.categorias.listar') }}"><i class="fa fa-file" aria-hidden="true"></i> Todas as Categorias de Treinos</a></li>
					<li{{ (Route::is('treinos.categorias.criar') ? ' class=active' : '') }}><a href="{{ route('treinos.categorias.criar') }}" ><i class="fa fa-file-o" aria-hidden="true"></i> Nova Categoria de Treino</a></li>
					@if(Route::is('treinos.categorias.editar'))
						<li class="active"><a href="#" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar Categoria de Treino</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
</div>
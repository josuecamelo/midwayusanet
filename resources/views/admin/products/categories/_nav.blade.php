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
				<a class="navbar-brand" href="{{ route('categorias.listar') }}"><i class="fa fa-asterisk" aria-hidden="true"></i> Categorias</a>
			</div>
			<div class="collapse navbar-collapse" id="menu-page">
				<ul class="nav navbar-nav">
					<li{{ (Route::is('categorias.listar') ? ' class=active' : '') }}><a href="{{ route('categorias.listar') }}"><i class="fa fa-file" aria-hidden="true"></i> Todas as Categorias</a></li>
					<li{{ (Route::is('categorias.criar') ? ' class=active' : '') }}><a href="{{ route('categorias.criar') }}" ><i class="fa fa-file-o" aria-hidden="true"></i> Nova Categoria</a></li>
					@if(Route::is('categorias.editar'))
						<li class="active"><a href="#" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar Categoria</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
</div>
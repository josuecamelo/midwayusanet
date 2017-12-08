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
				<a class="navbar-brand" href="{{ route('atletas.listar') }}"><i class="fa fa-users" aria-hidden="true"></i> Atletas</a>
			</div>
			<div class="collapse navbar-collapse" id="menu-page">
				<ul class="nav navbar-nav">
					<li{{ (Route::is('atletas.listar') ? ' class=active' : '') }}><a href="{{ route('atletas.listar') }}"><i class="fa fa-users" aria-hidden="true"></i> Todos os Atletas</a></li>
					<li{{ (Route::is('atletas.criar') ? ' class=active' : '') }}><a href="{{ route('atletas.criar') }}" ><i class="fa fa-user" aria-hidden="true"></i> Novo Atleta</a></li>
					@if(Route::is('atletas.editar'))
						<li class="active"><a href="#" ><i class="fa fa-user-circle" aria-hidden="true"></i> Editar Atleta</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
</div>
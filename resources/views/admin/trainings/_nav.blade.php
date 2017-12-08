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
				<a class="navbar-brand" href="{{ route('treinos.listar') }}"><i class="fa fa-cogs" aria-hidden="true"></i> Treinos</a>
			</div>
			<div class="collapse navbar-collapse" id="menu-page">
				<ul class="nav navbar-nav">
					<li{{ (Route::is('treinos.listar') ? ' class=active' : '') }}><a href="{{ route('treinos.listar') }}"><i class="fa fa-file" aria-hidden="true"></i> Todos os Treinos</a></li>
					<li{{ (Route::is('treinos.criar') ? ' class=active' : '') }}><a href="{{ route('treinos.criar') }}" ><i class="fa fa-file-o" aria-hidden="true"></i> Novo Treino</a></li>
					@if(Route::is('treinos.editar'))
						<li class="active"><a href="#" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar Treino</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
</div>
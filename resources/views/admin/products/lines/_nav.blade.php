@include('flash::message')

@if ($errors->any())
	<ul class="alert alert-danger">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif

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
				<a class="navbar-brand" href="{{ route('linhas.listar') }}"><i class="fa fa-bars" aria-hidden="true"></i> Linhas</a>
			</div>
			<div class="collapse navbar-collapse" id="menu-page">
				<ul class="nav navbar-nav">
					<li{{ (Route::is('linhas.listar') ? ' class=active' : '') }}><a href="{{ route('linhas.listar') }}"><i class="fa fa-file" aria-hidden="true"></i> Todas as Linhas</a></li>
					<li{{ (Route::is('linhas.criar') ? ' class=active' : '') }}><a href="{{ route('linhas.criar') }}" ><i class="fa fa-file-o" aria-hidden="true"></i> Nova Linha</a></li>
					@if(Route::is('linhas.editar'))
						<li class="active"><a href="#" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar Linha</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
</div>
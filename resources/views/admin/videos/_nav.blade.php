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
				<a class="navbar-brand" href="{{ route('videos.listar') }}"><i class="fa fa-cogs" aria-hidden="true"></i> videos</a>
			</div>
			<div class="collapse navbar-collapse" id="menu-page">
				<ul class="nav navbar-nav">
					<li{{ (Route::is('videos.listar') ? ' class=active' : '') }}><a href="{{ route('videos.listar') }}"><i class="fa fa-file" aria-hidden="true"></i> Todos os videos</a></li>
					<li{{ (Route::is('videos.criar') ? ' class=active' : '') }}><a href="{{ route('videos.criar') }}" ><i class="fa fa-file-o" aria-hidden="true"></i> Novo Vídeo</a></li>
					@if(Route::is('videos.editar'))
						<li class="active"><a href="#" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar Vídeo</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
</div>
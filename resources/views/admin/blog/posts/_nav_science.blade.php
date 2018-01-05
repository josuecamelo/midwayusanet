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
				<a class="navbar-brand" href="{{ route('posts.science') }}"><i class="fa fa-asterisk" aria-hidden="true"></i> Ciências</a>
			</div>
			<div class="collapse navbar-collapse" id="menu-page">
				<ul class="nav navbar-nav">
					<li{{ (Route::is('posts.science') ? ' class=active' : '') }}><a href="{{ route('posts.news') }}"><i class="fa fa-file" aria-hidden="true"></i> Todas as Ciências</a></li>
					<li{{ (Route::is('posts.create') ? ' class=active' : '') }}><a href="{{ route('posts.create',$t) }}" ><i class="fa fa-file-o" aria-hidden="true"></i> Nova Ciência</a></li>
					@if(Route::is('posts.edit'))
						<li class="active"><a href="#" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar Ciência</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
</div>
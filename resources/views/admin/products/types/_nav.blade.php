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
				<a class="navbar-brand" href="{{ route('tipos.listar') }}"><i class="fa fa-tags" aria-hidden="true"></i> Types</a>
			</div>
			<div class="collapse navbar-collapse" id="menu-page">
				<ul class="nav navbar-nav">
					<li{{ (Route::is('tipos.listar') ? ' class=active' : '') }}><a href="{{ route('tipos.listar') }}"><i class="fa fa-file" aria-hidden="true"></i> All Types</a></li>
					<li{{ (Route::is('tipos.criar') ? ' class=active' : '') }}><a href="{{ route('tipos.criar') }}" ><i class="fa fa-file-o" aria-hidden="true"></i> New Type</a></li>
					@if(Route::is('tipos.editar'))
						<li class="active"><a href="#" ><i class="fa fa-pencil" aria-hidden="true"></i> Edit Type</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
</div>
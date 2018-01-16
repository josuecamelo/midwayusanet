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
				<a class="navbar-brand" href="{{ route('lojas.listar') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Stores</a>
			</div>
			<div class="collapse navbar-collapse" id="menu-page">
				<ul class="nav navbar-nav">
					<li{{ (Route::is('lojas.listar') ? ' class=active' : '') }}><a href="{{ route('lojas.listar') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> All Stores</a></li>
					<li{{ (Route::is('lojas.criar') ? ' class=active' : '') }}><a href="{{ route('lojas.criar') }}" ><i class="fa fa-shopping-basket" aria-hidden="true"></i> New Store</a></li>
					@if(Route::is('lojas.editar'))
						<li class="active"><a href="#" ><i class="fa fa-pencil" aria-hidden="true"></i> Edit Store</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
</div>
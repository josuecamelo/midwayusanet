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
				<a class="navbar-brand" href="{{ route('categories.index') }}"><i class="fa fa-asterisk" aria-hidden="true"></i> Blog Categories</a>
			</div>
			<div class="collapse navbar-collapse" id="menu-page">
				<ul class="nav navbar-nav">
					<li{{ (Route::is('categories.index') ? ' class=active' : '') }}><a href="{{ route('categories.index') }}"><i class="fa fa-file" aria-hidden="true"></i> All Blog Categories</a></li>
					<li{{ (Route::is('categories.create') ? ' class=active' : '') }}><a href="{{ route('categories.create') }}" ><i class="fa fa-file-o" aria-hidden="true"></i> New Blog Category</a></li>
					@if(Route::is('categories.edit'))
						<li class="active"><a href="#" ><i class="fa fa-pencil" aria-hidden="true"></i> Edit Blog Category</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
</div>
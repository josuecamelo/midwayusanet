@extends('site.main')

@section('main')

	<h1>Videos</h1>

	<div class="container-fluid">
		<div class="row">
			@foreach($videos as $video)
				<div class="col-md-3">
					<iframe width="100%" height="248" src="{{ $video->video }}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
					<p class="text-center"><b>{{ $video->title }}</b></p>
				</div>
			@endforeach
		</div>
	</div>

@endsection
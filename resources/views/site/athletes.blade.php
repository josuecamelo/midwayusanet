@extends('site.main')

@section('css')
	<style>
		#atletas a {
			color: #000;
			text-align: center;
		}
	</style>
@endsection

@section('main')

	<section id="atletas">
		<h1>Team Midway</h1>

		<div class="container">
			@foreach($athletesGroups as $g)
				<div class="row">
					@foreach($g as $athlete)
						<div class="col-md-3">
							<div class="min">
								<a href="{{ route('team-midway.detail', ['slug'=> $athlete->slug]) }}" class="">
									<img height="330" class="img-responsive img-min" src="{{ asset('uploads/athletes') . '/' . $athlete->id . '/' . $athlete->photo }}" alt="{{ $athlete->name . ' ' . $athlete->last_name }}">
									<h2>{{ $athlete->name . ' ' . $athlete->last_name }}</h2>
								</a>
							</div>
						</div>
					@endforeach
				</div>
			@endforeach
		</div>
	</section>
@endsection
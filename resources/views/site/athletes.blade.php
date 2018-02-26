@extends('site.main')

@section('css')
	<style>
		#atletas a {
			color: #000;
		}

		#atletas .athlete {
			text-align: center;
		}

		#atletas h2 {
			margin: 15px 0 10px 0;
		}

		#atletas p {
			margin: 5px 0;
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
							<div class="athlete">
								<a href="{{ route('team-midway.detail', ['slug'=> $athlete->slug]) }}" class="">
									<img height="330" src="{{ asset('uploads/athletes') . '/' . $athlete->id . '/' . $athlete->photo }}" alt="{{ $athlete->name . ' ' . $athlete->last_name }}">
									<h2>{{ $athlete->name . ' ' . $athlete->last_name }}</h2>
									<p>{{ $athlete->profession }}</p>
								</a>
							</div>
						</div>
					@endforeach
				</div>
			@endforeach
		</div>
	</section>
@endsection
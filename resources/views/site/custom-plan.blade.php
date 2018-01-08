@extends('site.main')

@section('css')
	<style>
		.h1 {
			background: #f3f3f3;
			color: #555555;
			text-transform: uppercase;
			padding: 1.1em;
			margin: 0;
			text-align: center;
			font-size: 1.5em;
		}

		h2 {
			text-align: center;
			padding-top: 20px;
			margin: 25px 0 15px 0 !important;
			display: block;
			clear: both;
		}

		p {
			text-align: center;
			margin-bottom: 25px;
		}
	</style>
@endsection

@section('main')

	<h1 class="h1">SET YOUR FITNESS GOAL</h1>

	<div class="container">

		<div class="gender">
			<h2>I AM A</h2>
			<p>Please choose your gender below</p>
			<div class="row">
				<div class="col-md-6 text-right">
					<a href="#">
						<img src="{{ asset('img/custom-plan/main-male.jpg') }}" alt="" class="img-rounded">
					</a>
				</div>
				<div class="col-md-6 text-left">
					<a href="#">
						<img src="{{ asset('img/custom-plan/main-female.jpg') }}" alt="" class="img-rounded">
					</a>
				</div>
			</div>
		</div>

		<div class="goals-male">
			<h2>MY FITNESS GOAL IS TO</h2>
			<p>Please select your fitness goal below</p>
			<div class="row">
				<div class="col-md-4">
					<a href="#">
						<img src="{{ asset('img/custom-plan/build-muscle-male.jpg') }}" alt="" class="img-responsive img-rounded">
					</a>
				</div>
				<div class="col-md-4">
					<a href="#">
						<img src="{{ asset('img/custom-plan/improve-performance-male.jpg') }}" alt="" class="img-responsive img-rounded">
					</a>
				</div>
				<div class="col-md-4">
					<a href="#">
						<img src="{{ asset('img/custom-plan/lose-weight-male.jpg') }}" alt="" class="img-responsive img-rounded">
					</a>
				</div>
			</div>
		</div>

		<div class="goals-female">
			<h2>MY FITNESS GOAL IS TO</h2>
			<p>Please select your fitness goal below</p>
			<div class="row">
				<div class="col-md-4">
					<a href="#">
						<img src="{{ asset('img/custom-plan/build-muscle-female.jpg') }}" alt="" class="img-responsive img-rounded">
					</a>
				</div>
				<div class="col-md-4">
					<a href="#">
						<img src="{{ asset('img/custom-plan/improve-performance-female.jpg') }}" alt="" class="img-responsive img-rounded">
					</a>
				</div>
				<div class="col-md-4">
					<a href="#">
						<img src="{{ asset('img/custom-plan/lose-weight-female.jpg') }}" alt="" class="img-responsive img-rounded">
					</a>
				</div>
			</div>
		</div>

	</div>

@endsection
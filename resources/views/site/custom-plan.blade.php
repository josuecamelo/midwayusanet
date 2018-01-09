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

		#form {
			text-align: center;
		}

		#goals-male, #goals-female, #form {
			display: none;
		}

		img {
			cursor: pointer;
		}

		.back {
			font-size: 30px;
			cursor: pointer;
			margin-top: 30px;
		}
	</style>
@endsection

@section('main')

	<h1 class="h1">SET YOUR FITNESS GOAL</h1>

	<div class="container">

		<div id="gender">
			<h2>I AM A</h2>
			<p>Please choose your gender below</p>
			<div class="row">
				<div class="col-md-6 text-right">
					<img src="{{ asset('img/custom-plan/main-male.jpg') }}" alt="" class="img-rounded" id="main-male">
				</div>
				<div class="col-md-6 text-left">
					<img src="{{ asset('img/custom-plan/main-female.jpg') }}" alt="" class="img-rounded" id="main-female">
				</div>
			</div>
		</div>

		<div id="goals-male">
			<p class="text-center">
				<i class="fas fa-arrow-alt-circle-left back"></i>
			</p>
			<h2>MY FITNESS GOAL IS TO</h2>
			<p>Please select your fitness goal below</p>
			<div class="row">
				<div class="col-md-4">
					<img src="{{ asset('img/custom-plan/build-muscle-male.jpg') }}" alt="Build Muscle" class="img-responsive img-rounded">
				</div>
				<div class="col-md-4">
					<img src="{{ asset('img/custom-plan/improve-performance-male.jpg') }}" alt="Improve Performance" class="img-responsive img-rounded">
				</div>
				<div class="col-md-4">
					<img src="{{ asset('img/custom-plan/lose-weight-male.jpg') }}" alt="Lose Weight" class="img-responsive img-rounded">
				</div>
			</div>
		</div>

		<div id="goals-female">
			<p class="text-center">
				<i class="fas fa-arrow-alt-circle-left back"></i>
			</p>
			<h2>MY FITNESS GOAL IS TO</h2>
			<p>Please select your fitness goal below</p>
			<div class="row">
				<div class="col-md-4">
					<img src="{{ asset('img/custom-plan/build-muscle-female.jpg') }}" alt="Build Muscle" class="img-responsive img-rounded">
				</div>
				<div class="col-md-4">
					<img src="{{ asset('img/custom-plan/improve-performance-female.jpg') }}" alt="Improve Performance" class="img-responsive img-rounded">
				</div>
				<div class="col-md-4">
					<img src="{{ asset('img/custom-plan/lose-weight-female.jpg') }}" alt="Lose Weight" class="img-responsive img-rounded">
				</div>
			</div>
		</div>

		<div id="form">
			<p class="text-center">
				<i class="fas fa-arrow-alt-circle-left back"></i>
			</p>
			<h2 id="title"></h2>
			<img id="img" src="" class="img-rounded" alt="">
			<h4>Please enter your name and email</h4>
			<p>Your customized fitness plan will be sent to the email address you enter below free of charge.<br>We here at Midway Labs USA are committed to helping you achieve your fitness goals and are here to help you every step of the way!</p>
			<form class="form-inline" method="post" action="{{ route('custom-plan-send') }}">
				{{ csrf_field() }}
				<input type="hidden" name="gender" id="my_gender">
				<input type="hidden" name="goal" id="my_goal">
				<input type="text" name="name" class="form-control" placeholder="Full Name">
				<input type="email" name="email" class="form-control" placeholder="Email">
				<button class="btn btn-primary">Send me my free plan</button>
			</form>
		</div>

	</div>

@endsection

@section('js')
	<script>
		$(function () {

			var gender = '';
			var goal = '';
			var img = '';

			/* Main: */

			$('#main-male').click(function () {

				$('#gender').hide();
				$('#goals-male').show();
			});

			$('#main-female').click(function () {

				$('#gender').hide();
				$('#goals-female').show();
			});


			/* Secondary: */

			$('#goals-male img').click(function () {

				gender = 'male';
				goal = $(this).attr('alt');
				img = base_url + '/img/custom-plan/' + goal.toLowerCase().replace(' ', '-') + '-male-form.jpg';

				$('#goals-male').hide();
				$('#form').show();
				$('#title').text(goal);
				$('#img').attr('src', img);
				$('#my_gender').val(gender);
				$('#my_goal').val(goal);
			});

			$('#goals-female img').click(function () {

				gender = 'female';
				goal = $(this).attr('alt');
				img = base_url + '/img/custom-plan/' + goal.toLowerCase().replace(' ', '-') + '-female-form.jpg';

				$('#goals-female').hide();
				$('#form').show();
				$('#title').text(goal);
				$('#img').attr('src', img);
				$('#my_gender').val(gender);
				$('#my_goal').val(goal);
			});

			// Back:

			$('#goals-male .back').click(function () {

				$('#goals-male').hide();
				$('#gender').show();
			});

			$('#goals-female .back').click(function () {

				$('#goals-female').hide();
				$('#gender').show();
			});


			/* Form: */

			$('#form .back').click(function () {

				$('#goals-' + gender).show();
				$('#form').hide();
			});


		});
	</script>
@endsection
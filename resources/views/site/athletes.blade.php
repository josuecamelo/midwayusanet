@extends('site.main')

@section('css')

	<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>

	<style>

		#atletas {
			margin-top: 80px;
			background: url({{ asset('img/bg3.jpg') }}) center;
		}

		.my-slick-slider {
			text-align: center;
			width: 70%;
			margin: auto;
		}

		.slick-track {
			padding: 20px 0;
		}

		.slick-slide:focus {
			outline: none;
		}

		.slider-nav div {
			text-align: center;
		}

		.slider-nav img {
			width: 70px;
			height: 70px;
			border-radius: 50%;
			border: 3px solid transparent;
			transition: all .3s ease;
			margin: auto;
			cursor: pointer;
		}

		.slider-nav img:hover, .slider-nav .slick-center img {
			border-color: #6d7d32;
			transform: scale(1.4);
		}

		.slick-prev:before,
		.slick-next:before {
			color: #6d7d32;
		}

		.slick-slide img {
			display: inline-block;
		}

		.slider-for div {
			text-align: center;
		}

		.slider-for h2 {
			z-index: 99999;
			text-shadow: 0 0 5px rgba(0, 0, 0, 1);
			top: -50px;
			position: relative;
		}

		.slider-for a {
			outline: none;
			width: 100%;
			height: 100%;
			display: block;
		}

		.slider-for a::before {
			content: "";
			background: url({{ asset('img/arrow-bg-athlete.png') }}) 50% no-repeat;
			background-size: contain;
			width: 100%;
			height: 100%;
			opacity: 0;
			top: -20px;
			left: 0;
			bottom: 0;
			right: 0;
			position: absolute;
			z-index: -1;
			transition: all .3s ease;
		}

		.slider-for a:hover::before {
			opacity: 1;
			top: 0;
		}

		.slider-for img {
			max-height: 480px !important;
		}

		@media (min-width: 1200px) {
			#atletas h1 {
				font-size: 5rem;
				padding: 50px 0 40px 0;
				text-align: center;
				color: #6d7d32;
				background: url({{ asset('img/banner-inscrever.jpg') }}) center;
				text-shadow: 0 0 20px rgba(0, 0, 0, 0.7);
			}
		}

		@media (max-width: 1200px) {
			#atletas h1 {
				font-size: 4rem;
				padding: 50px 0 40px 0;
				text-align: center;
				color: #6d7d32;
				background: url({{ asset('img/banner-inscrever.jpg') }}) center;
				text-shadow: 0 0 20px rgba(0, 0, 0, 0.7);
			}
		}

	</style>
@endsection

@section('main')

	<section id="atletas">
		<h1>Nossos atletas</h1>

		<div class="my-slick-slider">
			<div class="slider-nav">
				@foreach($athletes as $athlete)
					<div>
						<figure><img src="{{ asset('uploads/athletes') . '/' . $athlete->id . '/' . $athlete->thumbnail }}" alt="{{ $athlete->name . ' ' . $athlete->last_name }}"></figure>
					</div>
				@endforeach
			</div>
			<div class="slider-for">
				@foreach($athletes as $athlete)
					<div>
						<a href="{{ route('atleta', ['slug'=> $athlete->slug]) }}">
							<img src="{{ asset('uploads/athletes') . '/' . $athlete->id . '/' . $athlete->photo }}" alt="{{ $athlete->name . ' ' . $athlete->last_name }}">
							<h2>{{ $athlete->name . ' ' . $athlete->last_name }}</h2>
						</a>
					</div>
				@endforeach
			</div>
		</div>
	</section>
@endsection

@section('js')
	<script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('.slider-for').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				fade: true,
				asNavFor: '.slider-nav',
				autoplay: true,
				autoplaySpeed: 5000000,
				centerMode: true
			});
			$('.slider-nav').slick({
				slidesToShow: 7,
				slidesToScroll: 1,
				asNavFor: '.slider-for',
				focusOnSelect: true,
				autoplay: true,
				autoplaySpeed: 5000000,
				centerMode: true,
				responsive: [{
					breakpoint: 600,
					settings: {
						slidesToShow: 3,
					}
				}]
			});
		});
	</script>
@endsection
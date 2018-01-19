@extends('site.main')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>
	<style>

		#atleta {
			margin-top: 80px;
			/*background: url({{ asset('img/bg-atleta.jpg') }}) center center fixed;*/
		}

		p {
			/*text-shadow: 0 2px 12px #000;*/
		}

		#main p {
			font-size: 20px;
			margin: 0 0 20px 70px;
		}

		#redes-sociais {
			margin-left: 70px;
		}

		#redes-sociais ul {
			list-style: none;
			margin: 0;
			padding: 0;
		}

		#redes-sociais ul li {
			display: inline-block;
			text-align: center;
		}

		#redes-sociais ul li a {
			background: #47521c;
			border-radius: 100%;
			width: 33px;
			height: 33px;
			display: inline-block;
			color: #ba9e17;
			font-size: 20px;
			padding-top: 1px;
		}

		#redes-sociais ul li a:hover {
			background: #6d7d32;
			color: #d0bc86;
		}

		#bio {
			padding: 72px;
			/*background: rgba(30, 44, 18, 0.6);*/
			text-align: center;
		}

		#bio h1 {
			margin: 0 0 20px;
			color: #ba9e17;
		}

		#fotos {
			/*background: rgba(0, 0, 0, 0.65);*/
			padding: 40px;
			text-align: center;
		}

		#fots a {
			outline: none;
		}

		#fotos img {
			margin: 15px;
			width: 200px;
		}

		#videos {
			padding: 72px;
			/*background: rgba(30, 44, 18, 0.6);*/
			text-align: center;
		}

		#videos h3 {
			margin: 0;
			padding: 50px 0 20px;
			color: #ba9e17;
		}

		#produtos {
			/*background: rgba(0, 0, 0, 0.65);*/
			padding: 50px;
		}

		#produtos h2 {
			text-align: center;
			display: table;
			letter-spacing: 4px;
			padding: 0 70px;
			margin: 0 auto 60px;
			border-right: 10px solid #ba9e17;
			border-left: 10px solid #ba9e17;
		}

		.my-slick-slider {
			text-align: center;
			width: 75%;
			height: 400px;
			margin: auto;
			overflow: visible;
		}

		.slick-track {
			padding: 50px 0;
		}

		.slick-slide {
			transition: all .3s ease;
			text-align: center;
		}

		.slick-slide:focus {
			outline: none;
		}

		.slider-nav div {
			text-align: center;
		}

		.slider-nav img {
			width: 120px;
			transition: all .3s ease;
			margin: auto;
			cursor: pointer;
		}

		.slider-nav img:hover, .slick-current img {
			transform: scale(2);
		}

		.slider-nav figcaption {
			font-weight: bold;
			text-transform: uppercase;
			width: 150px;
			padding-top: 20px;
			margin: auto;
		}

		.slick-prev:before,
		.slick-next:before {
			color: #6d7d32;
		}

		.slick-list {
			padding: 70px !important;
		}

		.opaco {
			opacity: 0.5;
		}

		@media (min-width: 1200px) {
			#main h1 {
				margin-top: 80px;
				font-weight: 900;
				text-shadow: 0 2px 20px rgba(0, 0, 0, .5);
				line-height: 95%;
				letter-spacing: 7px;
				font-size: 6rem;
				color: #72823a;
			}

			#main h1 span {
				font-weight: 400;
				font-size: 3rem;
				letter-spacing: 20px;
				line-height: 100%;
				display: block;
				text-shadow: 0 2px 10px rgba(0, 0, 0, .7);
				color: #fff;
			}

			#main {
				/*background: rgba(0, 0, 0, 0.65);*/
				padding: 40px;
			}

			#main h2 {
				margin: 0 0 20px;
				color: #b5a56c;
				font-size: 2rem;
			}
		}

		@media (max-width: 1200px) {
			#main h1 {
				margin-top: 80px;
				font-weight: 900;
				text-shadow: 0 2px 20px rgba(0, 0, 0, .5);
				line-height: 95%;
				letter-spacing: 7px;
				font-size: 4rem;
				color: #72823a;
			}

			#main h1 span {
				font-weight: 400;
				font-size: 1.2rem;
				letter-spacing: 20px;
				line-height: 100%;
				display: block;
				text-shadow: 0 2px 10px rgba(0, 0, 0, .7);
				color: #fff;
			}

			#main {
				/*background: rgba(0, 0, 0, 0.65);*/
				padding: 20px;
			}

			#main h2 {
				margin: 0 0 20px;
				color: #b5a56c;
				font-size: 1rem;
			}
		}

	</style>
@endsection

@section('main')

	<section id="atleta">

		<div id="main">
			<div class="container">
				<div class="row">
					<div class="col-md-5 animated fadeInLeft text-center">
						<img src="{{ asset('uploads/athletes') . '/' . $athlete->id . '/' . $athlete->photo }}" alt="">
					</div>
					<div class="col-md-7">
						<h1>{{ $athlete->name }}<span>{{ $athlete->last_name }}</span></h1>
						<div>
							<h2>{{ $athlete->profession }}</h2>
							<p>{{ $athlete->about }}</p>
							<div id="redes-sociais">
								<ul>
									@if($athlete->facebook)
										<li><a href="{{ $athlete->facebook }}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>@endif
									@if($athlete->twitter)
										<li><a href="{{ $athlete->twitter }}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>@endif
									@if($athlete->instagram)
										<li><a href="{{ $athlete->instagram }}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>@endif
									@if($athlete->youtube)
										<li><a href="{{ $athlete->youtube }}"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>@endif
									@if($athlete->snapchat)
										<li><a href="{{ $athlete->snapchat }}"><i class="fa fa-snapchat" aria-hidden="true"></i></a></li>@endif
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		@if($athlete->bio)
			<div id="bio">
				<div class="container">
					<h1>Bio</h1>
					<p>{!! nl2br($athlete->bio) !!}</p>
				</div>
			</div>
		@endif

		@if($images)
			<div id="fotos">
				@foreach($images as $image)
					<a href="{{ asset('uploads/athletes') . '/' . $athlete->id . '/' . $image->url }}" data-fancybox>
						<img src="{{ asset('uploads/athletes') . '/' . $athlete->id . '/' . $image->url }}" alt="">
					</a>
				@endforeach
			</div>
		@endif

		@if($videos)
			<div id="videos">
				<div class="container">
					@foreach($videos as $video)
						<div>
							<h3>{{ $video->title }}</h3>
							<div class="embed-responsive embed-responsive-16by9">
								<iframe width="854" height="480" src="{{ $video->url }}" class="embed-responsive-item" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		@endif

		@if($products)
			<div id="produtos">
				<h2>Produtos que o atleta usa</h2>
				<div class="my-slick-slider">
					<div class="slider-nav">
						@foreach($products as $product)
							<div>
								<figure>
									<img src="{{ asset('uploads/products') . '/' . $product->id . '/' . $product->image }}" alt="">
									<figcaption>{{ $product->name }}</figcaption>
								</figure>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		@endif

	</section>

	<div id="overlay"></div>

@endsection

@section('js')
	<script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>
	<script>
		$(function () {

			/* Slider */

			$('.slider-nav').slick({
				slidesToShow: 5,
				slidesToScroll: 1,
				focusOnSelect: true,
				autoplay: true,
				autoplaySpeed: 5000,
				centerMode: true
			});

			$('.slick-active:first').css('opacity', '0.5');
			$('.slick-active:last').css('opacity', '0.5');

			$('.slider-nav').on('beforeChange', function () {

				$('.slick-slide').each(function () {
					$(this).css('opacity', '1');
				});

				$('.slick-active:first').next().css('opacity', '0.5');
				$('.slick-active:last').next().css('opacity', '0.5');

			});


			/* Show Hide Tabela Nutricional: */

			$('#tabela-nutricional').on('click', function (e) {
				$('#informacao-nutricional').show().removeClass('animated bounceOutUp').addClass('animated bounceInDown');
				$('#overlay').fadeIn();
				e.preventDefault();
			});

			function hideOverlay() {
				$('#informacao-nutricional').removeClass('animated bounceInDown').addClass('animated bounceOutUp');
				$('#overlay').fadeOut();
			}

			$('#overlay').on('click', hideOverlay);
			$('#informacao-nutricional button').on('click', hideOverlay);

			$(document).keyup(function (e) {
				if (e.keyCode == 27) {
					hideOverlay();
				}
			});
		});
	</script>

@endsection
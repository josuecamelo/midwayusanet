@extends('site.main')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>
	<style>

		#main p {
			font-size: 20px;
			margin: 0 0 20px 70px;
		}

		#produto h3 {
			text-align: center;
			font-size: 20px;
			margin-bottom: 40px;
			letter-spacing: 6px;
		}

		.valor {
			display: block;
			font-size: 60px;
			margin: -10px 0 5px 0;
		}

		.nutriente {
			text-transform: uppercase;
		}

		#tabela-nutricional {
			display: block;
			color: red;
			text-transform: uppercase;
			font-weight: 600;
			letter-spacing: 7px;
			position: relative;
			text-align: center;
			margin: 50px 0;
		}

		#tabela-nutricional::after {
			right: 0;
		}

		#informacao-nutricional .header {
			border-top: 5px solid #000;
			border-bottom: 5px solid #000;
			text-align: center;
		}

		#informacao-nutricional .header h2 {
			font-size: 25px;
			margin: 10px 0 5px 0;
		}

		#informacao-nutricional p {
			margin-bottom: 10px;
		}

		#informacao-nutricional table {
			width: 100%;
			border-bottom: 2px solid #000 !important;
			margin-bottom: 0;
		}

		.table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
			padding: 2px;
			border-top: 1px solid #000 !important;
		}

		.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th {
			padding: 5px;
			border-bottom: 2px solid #000 !important;
			font-size: 15px;
		}

		.table-striped > tbody > tr:nth-of-type(odd) {
			background-color: rgba(255, 255, 255, 0.2);
		}

		#informacao-nutricional p:nth-child(1) {
			padding: 5px 0;
			border-bottom: 1px solid #000 !important;
			margin: 0;
		}

		#informacao-nutricional .footer {
			border-bottom: 5px solid #000;
		}

		.icon-wrapper {
			background: url({{ asset('img/bg-pr-view-ico.png') }}) top no-repeat;
			padding: 0 20px;
			height: 100px;
			text-align: center;
		}

		.icon-wrapper img {
			width: 51px;
			height: 51px;
			position: relative;
			top: 48%;
			left: 9%;
			transform: translate(-50%, -50%);
		}

		.desc {
			text-align: center;
			text-shadow: 0 2px 10px #000;
			font-size: 25px;
			font-weight: 600;
			display: block;
			margin-bottom: 10px;
			letter-spacing: 1px;
		}

		.desc div {
			font-size: 16px;
			font-weight: normal;
		}

		#sabores {
			background: #f1f1f1;
			text-align: center;
			padding: 40px 0;
			/*margin-top: 100px;*/
		}

		#sabores h2 {
			color: #000;
			font-size: 30px;
			margin-bottom: 30px;
		}

		.sabor {
			width: 15px;
			height: 15px;
			border-radius: 100%;
			display: inline-block;
			margin: 5px 0 0 -22px;
			position: absolute;
		}

		#sabores img {
			width: 200px;
			margin-top: 15px;
		}

		#outros-produtos {
			text-align: center;
			background: #f9f9f9;
			padding: 40px 0;
		}

		#outros-produtos h2 {
			display: table;
			letter-spacing: 4px;
			padding: 0 70px;
			margin: 0 auto 60px;
			border-right: 10px solid red;
			border-left: 10px solid red;
		}

		#outros-produtos .item {
			text-align: center;
			opacity: .3;
		}

		.my-slick-slider {
			text-align: center;
			width: 85%;
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
			color: #000;
			font-size: 25px;
		}

		.slick-prev, .slick-next {
			width: auto;
			height: auto;
		}

		.slick-prev {
			padding: 0 40px 130px 0 !important;
		}

		.slick-next {
			padding: 0 0 130px 40px !important;
		}

		.slick-list {
			padding: 70px !important;
			margin: 0 30px;
		}

		.opaco {
			opacity: 0.5;
		}

		#sabores a {
			color: #333;
		}

		#topicos-produto {
			margin-left: 30px;
			text-transform: uppercase;
			font-size: 18px;
			font-weight: bold;
			color: #555;
			border-top: 1px solid #ccc;
			border-bottom: 1px solid #ccc;
			padding: 20px 40px;
			letter-spacing: 1px;
		}

		#shopify {
			background: #fff;
			padding: 30px;
		}

		#serving-size {
			font-size: 16px;
		}

		@media (min-width: 1200px) {
			#produto {
				/*padding-top: 80px;*/
			}

			#produto h1 {
				margin-top: 80px;
				font-weight: 900;
				line-height: 95%;
				letter-spacing: 7px;
				font-size: 6rem;
			}

			#produto h1 span {
				font-weight: 500;
				font-size: 3.1rem;
				letter-spacing: 20px;
				line-height: 120%;
				display: block;
				color: #999;
			}

			.item-qtd-porcao {
				padding: 25px 50px;
				border: 3px solid rgba(45, 42, 15, .56);
				font-weight: 600;
				text-align: center;
			}

			#tabela-nutricional::after, #tabela-nutricional::before {
				content: "";
				display: block;
				position: absolute;
				top: 50%;
				height: 1px;
				background-color: #ccc;
				width: 35%;
			}

			#informacao-nutricional {
				font-size: 12px;
				background: rgba(255, 255, 255, 0.8);
				padding: 15px;
				border-radius: 4px;
				box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
				position: relative;
				z-index: 999999;
				display: none;
				position: fixed;
				top: 10%;
				left: 30%;
				right: 30%;
			}

			#informacao-nutricional button {
				background: red;
				color: #fff;
				border: none;
				border-radius: 100%;
				padding: 0 6px;
				box-shadow: 0 0 20px rgba(0, 0, 0, 0.7);
				position: absolute;
				right: -10px;
				top: -15px;
				font-size: 1.02rem;
			}

			.row-col {
				display: flex;
				align-items: stretch;
				justify-content: center;
				width: 100% !important;
			}

			.col {
				padding: 0 30px;
				width: 100%;
			}
		}

		@media (max-width: 1200px) {
			#produto {
				/*padding-top: 30px;*/
			}

			#produto h1 {
				margin-top: 30px;
				font-weight: 900;
				text-shadow: 0 2px 20px rgba(0, 0, 0, .5);
				line-height: 95%;
				letter-spacing: 7px;
				font-size: 5rem;
			}

			#produto h1 span {
				font-weight: 500;
				font-size: 2rem;
				letter-spacing: 20px;
				line-height: 200%;
				display: block;
				text-shadow: 0 2px 10px rgba(0, 0, 0, .7);
			}

			.item-qtd-porcao {
				padding: 25px 50px;
				margin-bottom: 10px;
				border: 3px solid rgba(45, 42, 15, .56);
				font-weight: 600;
				text-align: center;
			}

			#tabela-nutricional::after, #tabela-nutricional::before {
				content: "";
				display: block;
				position: absolute;
				top: 50%;
				height: 1px;
				background-color: #fff;
				width: 10%;
			}

			#informacao-nutricional {
				font-size: 12px;
				background: rgba(22, 29, 16, 0.8);
				padding: 15px;
				border-radius: 4px;
				box-shadow: 0 0 20px rgba(0, 0, 0, 0.7);
				position: relative;
				z-index: 999999;
				display: none;
				position: fixed;
				top: 10%;
				left: 0;
			}

			#informacao-nutricional button {
				background: red;
				color: #fff;
				border: none;
				border-radius: 100%;
				padding: 0 6px;
				box-shadow: 0 0 20px rgba(0, 0, 0, 0.7);
				position: absolute;
				right: 10px;
				top: -15px;
				font-size: 1.02rem;
			}

			#topicos-produto .row > div, #sabores .row > div {
				margin-bottom: 40px;
			}

			.slider-nav {
				margin: auto;
			}

			.col {
				padding: 0 20px;
				width: 100%;
			}

		}

		#highlights_portion {
			margin: 72px 0;
		}

		#apresentacao {
			font-weight: bold;
			font-size: 25px;
			margin-right: 10px;
		}

		#cor {
			border-radius: 4px;
			color: #fff;
			padding: 1px 7px;
		}

		#outros-produtos a {
			color: #fff !important;
			outline: none;
		}

	</style>
@endsection

@section('main')

	<section id="produto">

		<div id="main">
			<div class="container">
				<div class="row">
					<div class="col-md-5 animated fadeInLeft">
						<img src="{{ asset('uploads/products') . '/' . $product->id . '/' . $product->image }}" alt="" class="img-responsive">
					</div>
					<div class="col-md-7 animated fadeInRight">
						<h1>{{ $product->name }}<span>{{ $product->last_name }}</span></h1>
						<p>
							<span id="apresentacao">{{ $product->presentation }}</span>
							@if(!empty($product->flavor))
								<span id="cor" style="background-color: {{ $product->flavor->color }}">{{ $product->flavor->name }} Flavor</span>
							@endif
						</p>
						{{-- Tópicos --}}

						@if($topics)
							<ul id="topicos-produto">
								@foreach($topics as $topic)
									<li>{{ $topic->description }}</li>
								@endforeach
							</ul>
						@endif

						<div>
							<p>{{ $product->description }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div id="shopify">
			{!! $product->shopify !!}
		</div>


		{{-- Tabela nutricional --}}

		@if($product->nutrients)
			<a href="#informacao-nutricional" id="tabela-nutricional">Supplement Facts</a>
			<div id="informacao-nutricional">
				<button><i class="fa fa-times" aria-hidden="true"></i></button>
				<div class="header">
					<h2>Supplement Facts</h2>
					<p id="serving-size">{{ $product->serving_size }}</p>
				</div>
				<table class="table table-striped">
					<thead>
					<tr>
						<th>Amount per serving</th>
						<th></th>
						<th>%DV (*)</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$nutrients = array_map('trim', explode(PHP_EOL, $product->nutrients));
					$nutrient_qty = array_map('trim', explode(PHP_EOL, $product->nutrient_qty));
					$nutrient_vd = array_map('trim', explode(PHP_EOL, $product->nutrient_vd));
					?>
					@foreach($nutrients as $key => $nutrient)
						<tr>
							<td>{{ $nutrient }}</td>
							<td>{{ isset($nutrient_qty[$key]) ? $nutrient_qty[$key] : null }}</td>
							<td>{{ isset($nutrient_vd[$key]) ? $nutrient_vd[$key] : null }}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div class="footer">
					<p>{{ $product->complement }}</p>
				</div>
			</div>
		@endif

		{{--<div class="container">--}}
		{{-- Highlights Portion --}}
		{{--<div id="highlights_portion">--}}
		{{--@if(isset($product->portions))--}}
		{{--<h3>Cada <span data-toggle="tooltip" data-placement="top" title="{{ $product->serving_size }}">porção</span> fornece:</h3>--}}
		{{--<div class="row-col">--}}
		{{--@foreach($product->portions as $v)--}}
		{{--<div class="col">--}}
		{{--<div class="item-qtd-porcao">--}}
		{{--<span class="valor">{{ $v->value }}</span>--}}
		{{--<span class="nutriente">{{ $v->nutrient }}</span>--}}
		{{--</div>--}}
		{{--</div>--}}
		{{--@endforeach--}}
		{{--</div>--}}
		{{--@endif--}}
		{{--</div>--}}
		{{--</div>--}}

		{{-- Sabores relacionados --}}

		@if(count($flavors) > 0)
			<div id="sabores">
				<div class="container">
					<h2>Disponível {{ count($flavors) > 1 ? 'nos sabores' : 'no sabor' }}</h2>
					<div class="row-sabores">
						@foreach($flavors as $flavor)
							<?php
							$slug = $flavor->last_name_slug ? $flavor->slug . '&' . $flavor->last_name_slug : $flavor->slug;
							$product_flavor = isset($flavor->flavor->id) ? $flavor->flavor->slug : null;
							$url = route('produto_exibicao', [$slug, $product_flavor])
							?>
							<div class="col">
								<a href="{{ $url }}">
									<span class="sabor" style="background: {{ $flavor->flavor->color }}"></span>
									{{ $flavor->flavor->name }}
									<br>
									<img src="{{ asset("uploads/products/$flavor->id/$flavor->image") }}">
								</a>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		@endif


		{{-- Produtos relacionados --}}

		@if($product->productRelateds)
			<div id="outros-produtos">
				<h2>Produtos relacionados</h2>
				<div class="my-slick-slider">
					<div class="slider-nav">
						@foreach($product->productRelateds as $produto)
							<div>
								<a href="{{ $produto->url_visualizacao }}">
									<figure>
										<img src="{{ asset("uploads/products/$produto->id/$produto->image") }}" alt="">
										<figcaption>{{ $produto->name . ' ' . $produto->last_name . ' ' . $produto->presentation }} @if($produto->flavor){{ $produto->flavor->name }}@endif</figcaption>
									</figure>
								</a>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		@endif

	</section>

@endsection

@section('js')
	<script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>
	<script>
		$(function () {

			$('[data-toggle="tooltip"]').tooltip();


			/* Slider */

			$('.slider-nav').slick({
				slidesToShow: 5,
				slidesToScroll: 1,
				focusOnSelect: true,
				autoplay: true,
				autoplaySpeed: 5000,
				centerMode: true,
				responsive: [
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 1,
						}
					}]
			});

			if (window.innerWidth > 600) {
				$('.slick-active:first').css('opacity', '0.5');
				$('.slick-active:last').css('opacity', '0.5');
			} else {
				$('.slick-slide').not('.slick-current').css('opacity', 0.5);
			}

			$('.slider-nav').on('beforeChange', function () {

				$('.slick-slide').each(function () {
					$(this).css('opacity', '1');
				});

				if (window.innerWidth > 600) {
					$('.slick-active:first').next().css('opacity', '0.5');
					$('.slick-active:last').next().css('opacity', '0.5');
				} else {
					$('.slick-slide').not('.slick-current').next().css('opacity', 0.5);
				}
			});


			/* Show Hide Tabela Nutricional: */

			$('#tabela-nutricional').on('click', function (e) {
				$('#informacao-nutricional').show().removeClass('animated bounceOutUp').addClass('animated bounceInDown');
				$('.overlay').fadeIn();
				e.preventDefault();
			});

			function hideOverlayTabelaNutricional() {
				$('#informacao-nutricional').removeClass('animated bounceInDown').addClass('animated bounceOutUp');
				$('.overlay').fadeOut();
			}

			$('.overlay').on('click', hideOverlayTabelaNutricional);
			$('#informacao-nutricional button').on('click', hideOverlayTabelaNutricional);

			$(document).keyup(function (e) {
				if (e.keyCode == 27) {
					hideOverlayTabelaNutricional();
				}
			});
		});
	</script>

@endsection
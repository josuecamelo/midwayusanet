@extends('site.main')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>
	<style>

		/* Carousel: */

		.carousel-fade .carousel-inner .item {
			-webkit-transition-property: opacity;
			transition-property: opacity;
		}

		.carousel-fade .carousel-inner .item,
		.carousel-fade .carousel-inner .active.left,
		.carousel-fade .carousel-inner .active.right {
			opacity: 0;
		}

		.carousel-fade .carousel-inner .active,
		.carousel-fade .carousel-inner .next.left,
		.carousel-fade .carousel-inner .prev.right {
			opacity: 1;
		}

		.carousel-fade .carousel-inner .next,
		.carousel-fade .carousel-inner .prev,
		.carousel-fade .carousel-inner .active.left,
		.carousel-fade .carousel-inner .active.right {
			left: 0;
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
		}

		.carousel-fade .carousel-control {
			z-index: 2;
		}

		.carousel-control {
			background-image: none !important;
		}

		/* Carousel Controls: */

		svg.right {
			top: 50%;
			right: 30px;
			position: absolute;
			margin-top: -10px !important;
		}

		svg.left {
			top: 50%;
			left: 30px;
			position: absolute;
			margin-top: -10px !important;
		}

		/* Mini Banners: */

		#mini-banners {
			display: flex;
		}

		@media (max-width: 900px) {
			#mini-banners {
				display: block;
			}
		}

		#mini-banners div {
			overflow: hidden;
			margin: 2px 2px 2px 0;
			display: block;
			position: relative;
		}

		@media (max-width: 900px) {
			#mini-banners div {
				margin-right: 0;
			}
		}

		#mini-banners div:last-child {
			margin-right: 0;
		}

		#mini-banners h3 {
			position: absolute;
			width: 100%;
			display: block;
			background: rgba(255, 255, 255, 0.9);
			color: #000;
			bottom: -1px;
			text-transform: uppercase;
			margin: 0px;
			padding: 0.8em 0;
			font-size: 12px;
			z-index: 99;
			text-align: center;
			font-size: 16px;
		}

		#mini-banners h3 svg {
			width: 12px;
			margin-left: 5px;
			color: red;
			transition: all .2s;
		}

		#mini-banners a img {
			width: 100%;
			transition: all .2s ease-in-out;
		}

		#mini-banners a img:hover {
			opacity: .8;
			transform: scale(1.2);
			transition: all .2s;
		}

		#mini-banners a:hover svg {
			margin-left: 15px;
		}

		/* Products */

		#products-menu {
			width: 25%;
			float: left;
			padding-right: 0;
			padding-left: 0;
			position: relative;
			left: -75%;
			padding-right: 2px;
		}

		@media (max-width: 900px) {
			#products-menu {
				width: 100%;
				display: block;
				left: 0;
				padding-right: 0;
			}
		}

		#products-menu div h1 {
			font-size: 2rem;
		}

		#products-menu ul {
			padding: 0px;
			margin: 0px;
			height: 200px;
			background: #f3f3f3 url("{{ asset('img/bg-menu.png') }}");
			background-size: 150%;
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-orient: vertical;
			-webkit-box-direction: normal;
			-ms-flex-direction: column;
			flex-direction: column;
		}

		#products-menu ul li {
			list-style: none;
			box-sizing: border-box;
			border-bottom: 1px solid #e6e6e6;
			height: 25%;
			width: 100%;
			text-align: left;
		}

		#products-menu ul li a {
			padding: 15px 0 0 10%;
			width: 100%;
		}

		#products-menu ul li a {
			text-decoration: none;
			display: inline-block;
			color: #333333;
			padding: 10px 40px;
			height: 100%;
			vertical-align: middle;
			position: relative;
			font-size: 18px;
			font-weight: 900;
			text-transform: uppercase;
			font-style: italic;
			transition: all 0.2s;
		}

		#products-menu ul li a svg {
			display: block;
			position: absolute;
			right: 5%;
			top: 15px;
			color: red;
			z-index: 9;
			transition: all 0.2s;
		}

		#products-menu ul li a:hover svg {
			right: 2%;
		}

		#products {
			width: 75%;
			float: left;
			padding-right: 0.625rem;
			padding-left: 0.625rem;
			position: relative;
			left: 25%;
			background: #f9f9f9;
		}

		@media (max-width: 900px) {
			#products {
				width: 100%;
				left: 0;
			}
		}

		#products h2 {
			margin-top: 30px;
		}

		#products h4 {
			font-size: 17px;
			margin: 10px 0;
		}

		#products-menu div {
			background: black;
			color: white;
			padding: 99px 50px;
		}

		#products-menu div a {
			color: red;
			border: 2px solid red;
			display: block;
			width: 100%;
			max-width: 250px;
			padding: 1em 0;
			margin: 0 auto;
			text-align: center;
			text-decoration: none;
			text-transform: uppercase;
			font-size: 14px;
			transition: all 0.3s;
		}

		#products-menu div a:hover {
			background: red;
			color: white;
		}

		#products > div {
			padding: 0 25px;
			text-align: center;

		}

		#products a {
			color: #000;
		}

		#products a:hover {
			text-decoration: none;
		}

		#products a span {
			color: red;
			font-weight: bold;
		}

		#products img {
			max-height: 150px;
			margin: 0 auto;
			transition: all 0.2s;
		}

		.product:hover img {
			transform: scale(1.1);
		}

		.slick-prev, .slick-next {
			width: 50px;
			height: 50px;
		}

		.slick-prev::before, .slick-next::before {
			font-size: 25px;
			color: #000;
		}

		@media (max-width: 900px) {
			.slick-prev::before, .slick-next::before {
				font-size: 30px;
			}
		}

		/* Articles: */

		#articles {
			padding: 30px;
			display: block;
			background: #f3f3f3;
			width: 100%;
			float: left;
		}

		#articles a {
			text-decoration: none;
		}

		#articles h3 {
			margin: 20px;
			font-size: 20px;
		}

		#articles .col-md-6:first-child img {
			width: 100%;
		}

		#articles .col-md-6:last-child img {
			width: 42%;
			float: left;
			margin-right: 20px;
		}

		@media (max-width: 800px) {
			#articles .col-md-6:last-child img {
				width: 100%;
				float: none;
			}

			.col-md-6:first-child div {
				margin-bottom: 15px;
			}
		}

		#articles .col-md-6 a:last-child {
			font-weight: bold;
			margin: 20px;
			display: block;
		}

		#articles .col-md-6 a:last-child svg {
			margin-left: 5px;
			transition: all 0.2s;
		}

		#articles .col-md-6 a:last-child:hover svg {
			margin-left: 10px;
		}

		#articles .col-md-6 span {
			display: block;
			margin: 15px 20px;
		}

		#articles .col-md-6 div {
			clear: both;
			padding: 0;
			background: #FFFFFF;
			box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.13);
			display: block;
			float: left;
			width: 100%;
		}

		#articles .col-md-6:last-child div:not(:last-child) {
			margin-bottom: 15px;
		}

		#videos-row {
			padding: 30px;
			display: block;
			background: #fff;
			width: 100%;
			float: left;
		}

		#videos-row h3 {
			margin: 10px 5px;
			font-size: 17px;
			text-align: center;
			transition: all 0.2s;
		}

		#videos-row .overlay-video {
			cursor: pointer;
			width: 100%;
			height: 100%;
			position: absolute;
		}

		@media (max-width: 900px) {
			#videos-row .overlay-video {
				display: none;
			}
		}

		#videos-row .col-md-3:hover h3 {
			color: red;
		}

	</style>
@endsection

@section('main')

	{{-- Carousel: --}}

	<div id="carousel-main" class="carousel slide carousel-fade animated fadeInDown" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carousel-main" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-main" data-slide-to="1"></li>
			<li data-target="#carousel-main" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<picture>
					<source media="(min-width: 480px)" srcset="{{ asset('img/home/banners/ArnoldBanner.jpg') }}">
					<img src="{{ asset('img/home/banners/ArnoldBanner-mobile.jpg') }}" alt="Criamos sites responsivos" class="img-responsive">
				</picture>
			</div>
			<div class="item">
				<picture>
					<source media="(min-width: 480px)" srcset="{{ asset('img/home/banners/AthleteBanner.jpg') }}">
					<img src="{{ asset('img/home/banners/AthleteBanner-mobile.jpg') }}" alt="Criamos sites responsivos" class="img-responsive">
				</picture>
			</div>
			<div class="item">
				<picture>
					<source media="(min-width: 480px)" srcset="{{ asset('img/home/banners/ProductBanner.jpg') }}">
					<img src="{{ asset('img/home/banners/ProductBanner-mobile.jpg') }}" alt="Criamos sites responsivos" class="img-responsive">
				</picture>
			</div>
		</div>
		<a class="left carousel-control" href="#carousel-main" role="button" data-slide="prev">
			<i class="fas fa-angle-left left"></i>
		</a>
		<a class="right carousel-control" href="#carousel-main" role="button" data-slide="next">
			<i class="fas fa-angle-right right"></i>
		</a>
	</div>

	{{-- Mini Banners: --}}

	<section id="mini-banners" class="animated fadeInUp">
		<div>
			<a href="#">
				<h3>
					SHOP MILITARY TRAIL
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.12 23.42">
						<defs>
							<style>.cls-1{fill:red;}</style>
						</defs>
						<polygon class="cls-1" points="9.19 0 9.19 5.4 15.61 11.71 9.19 18.01 9.19 23.42 21.12 11.71 9.19 0"/>
						<polygon class="cls-1" points="0 22.24 10.73 11.71 0 1.18 0 22.24"/>
					</svg>
				</h3>
				<img src="{{ asset('img/home/secondary-banners/shop-military.jpg') }}">
			</a>
		</div>
		<div>
			<a href="#">
				<h3>
					SHOP GLAMOUR NUTRITION
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.12 23.42">
						<defs>
							<style>.cls-1{fill:red;}</style>
						</defs>
						<polygon class="cls-1" points="9.19 0 9.19 5.4 15.61 11.71 9.19 18.01 9.19 23.42 21.12 11.71 9.19 0"/>
						<polygon class="cls-1" points="0 22.24 10.73 11.71 0 1.18 0 22.24"/>
					</svg>
				</h3>
				<img src="{{ asset('img/home/secondary-banners/shop-glamour.jpg') }}">
			</a>
		</div>
		<div>
			<a href="#">
				<h3>
					DELICIOUS LEMON FLAVOR
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.12 23.42">
						<defs>
							<style>.cls-1{fill:red;}</style>
						</defs>
						<polygon class="cls-1" points="9.19 0 9.19 5.4 15.61 11.71 9.19 18.01 9.19 23.42 21.12 11.71 9.19 0"/>
						<polygon class="cls-1" points="0 22.24 10.73 11.71 0 1.18 0 22.24"/>
					</svg>
				</h3>
				<img src="{{ asset('img/home/secondary-banners/l-carnitine.jpg') }}">
			</a>
		</div>
		<div>
			<a href="#">
				<h3>
					GIVING BACK
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.12 23.42">
						<defs>
							<style>.cls-1{fill:red;}</style>
						</defs>
						<polygon class="cls-1" points="9.19 0 9.19 5.4 15.61 11.71 9.19 18.01 9.19 23.42 21.12 11.71 9.19 0"/>
						<polygon class="cls-1" points="0 22.24 10.73 11.71 0 1.18 0 22.24"/>
					</svg>
				</h3>
				<img src="{{ asset('img/home/secondary-banners/giving-back.jpg') }}">
			</a>
		</div>
	</section>

	{{-- Products --}}

	<section id="products-row">
		<section id="products">
			<h2>Military Trail</h2>
			<div>
				<div class="slick-track" role="listbox">
					@foreach($militaryTrailProducts as $mtProduct)
						<a href="{{ $mtProduct->url_visualizacao  }}">
							<div class="product">
								<img src="{{ asset('uploads/products') . '/' . $mtProduct->id . '/' . $mtProduct->image }}">
								<h4>{{ $mtProduct->name . ' ' . $mtProduct->last_name }}</h4>
								@if(!empty($mtProduct->flavor))
									<span class="cor" style="color: {{ $mtProduct->flavor->color }}">{{ $mtProduct->flavor->name }}</span>
								@endif
								<div>{!! $mtProduct->shopify !!}</div>
							</div>
						</a>
					@endforeach
				</div>
			</div>
			<h2>Glamour Nutrition</h2>
			<div>
				<div class="slick-track" role="listbox">
					@foreach($glamourNutritionProducts as $gnProduct)
						<a href="{{ $gnProduct->url_visualizacao  }}">
							<div class="product">
								<img src="{{ asset('uploads/products') . '/' . $gnProduct->id . '/' . $gnProduct->image }}">
								<h4>{{ $gnProduct->name . ' ' . $gnProduct->last_name }}</h4>
								@if(!empty($gnProduct->flavor))
									<span class="cor" style="color: {{ $gnProduct->flavor->color }}">{{ $gnProduct->flavor->name }}</span>
								@endif
								<div>{!! $gnProduct->shopify !!}</div>
							</div>
						</a>
					@endforeach
				</div>
			</div>
		</section>
		<aside id="products-menu">
			<ul>
				<li><a href="{{ url('/') }}">Protein<i class="fas fa-angle-right"></i></a></li>
				<li><a href="{{ url('/') }}">Pre-Workout<i class="fas fa-angle-right"></i></a></li>
				<li><a href="{{ url('/') }}">Beauty<i class="fas fa-angle-right"></i></a></li>
				<li><a href="{{ url('/') }}">Stacks<i class="fas fa-angle-right"></i></a></li>
			</ul>
			<div>
				<h1>LET US HELP YOU BUILD YOURSELF</h1>
				<p>Answer these questions for a customized supplement stack.</p>
				<a href="{{ route('custom-plan') }}" title="Customize your plan" role="link">Customize Your Plan</a>
			</div>
		</aside>
	</section>


	{{-- Articles: --}}

	<section id="articles">
		<h2>Recommended Articles</h2>
		<div class="row">
			<div class="col-md-6">
				<div>
					<a href="{{route('blog.see',$destak->slug)}}">
						<img src="{{$destak->show_image}}" alt="">
					</a>
					<span>{{dataMes($destak->date)}}</span>
					<h3>{{$destak->title}}</h3>
					<a href="#">Read More<i class="fas fa-angle-right"></i></a>
				</div>
			</div>
			<div class="col-md-6">
				@foreach($posts as $post)
					<div>
						<a href="{{route('blog.see',$post->slug)}}">
							<img src="{{$post->show_image}}" alt="">
						</a>
						<span>{{dataMes($post->date)}}</span>
						<h3>{{$post->title}}</h3>
						<a href="#">Read More<i class="fas fa-angle-right"></i></a>
					</div>
				@endforeach
			</div>
		</div>
	</section>


	{{-- Vídeos: --}}

	<section id="videos-row">
		<h2>NEWEST VIDEOS</h2>
		<div class="row">
			<div class="col-md-3">
				<div class="overlay-video"></div>
				<iframe width="100%" height="248" src="https://www.youtube.com/embed/M6GFK6RkFvQ" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
				<h3>Glamour Collagen</h3>
			</div>
			<div class="col-md-3">
				<div class="overlay-video"></div>
				<iframe width="100%" height="248" src="https://www.youtube.com/embed/mhO0e3lJAgI" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
				<h3>Glamour Protein Shake</h3>
			</div>
			<div class="col-md-3">
				<div class="overlay-video"></div>
				<iframe width="100%" height="248" src="https://www.youtube.com/embed/kI_NR0uCklM" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
				<h3>Creatine Military Trail Supplement</h3>
			</div>
			<div class="col-md-3">
				<div class="overlay-video"></div>
				<iframe width="100%" height="248" src="https://www.youtube.com/embed/_5lP9g8X-ZA" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
				<h3>Felipe Franco Visits Midway Labs USA</h3>
			</div>
		</div>
	</section>


	{{-- Modal Vídeo: --}}

	<div class="modal fade" id="modal-video" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body">
					<iframe width="100%" height="488" src="" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('js')
	<script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('.slick-track').slick({
				slidesToShow: 5,
				slidesToScroll: 1,
				autoplaySpeed: 5000,
				autoplay: true,
				responsive: [{
					breakpoint: 900,
					settings: {
						slidesToShow: 1,
					}
				}]
			});

			$('.overlay-video').on('click', function (e) {

				$('#modal-video').modal('show');

				let titulo = $(this).siblings('h3').text();
				$('#modal-video h4').text(titulo);

				let src = $(this).siblings('iframe').attr('src') + '?autoplay=1';
				$('#modal-video iframe').attr('src', src);
			});

			$('#modal-video').on('hide.bs.modal', function (e) {
				$('#modal-video h4').text('');
				$('#modal-video iframe').attr('src', '');
			});
		});
	</script>
@endsection
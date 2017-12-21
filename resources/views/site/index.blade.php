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
			background: rgba(0, 0, 0, 0.85);
			color: white;
			bottom: -1px;
			text-transform: uppercase;
			margin: 0px;
			padding: 1em 0;
			font-size: 12px;
			z-index: 99;
			text-align: center;
			font-size: 16px;
		}

		#mini-banners h3 svg {
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

		#products-row h2 {
			font-size: 25px;
		}

		#products-menu {
			width: 25%;
			float: left;
			padding-right: 0;
			padding-left: 0;
			position: relative;
			left: -75%;
			padding-right: 2px;
		}

		@media (max-width: 600px) {
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

		@media (max-width: 600px) {
			#products {
				width: 100%;
				left: 0;
			}
		}

		#products-menu div {
			background: black;
			color: white;
			padding: 86px 50px;
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
			padding: 15px 25px;
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

		#products h2 {
			border-bottom: 1px solid #ddd;
			margin: 0;
			padding: 17px 0 5px 0 !important;
		}

		#products h4 {
			font-size: 17px;
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

		#articles h2 {
			font-size: 25px;
			margin: 0 0 30px 0;
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

		@media (max-width: 600px) {
			#articles .col-md-6:last-child img {
				width: 100%;
				float: none;
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

		#videos-row h2 {
			font-size: 20px;
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

		@media (max-width: 600px) {
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

	<section id="mini-banners">
		<div class="animated fadeInUp">
			<a href="https://store.bpisports.com/all-products/?_ga=2.208811738.997604798.1513332053-1419607128.1513332053">
				<h3>SHOP our STORE<i class="fas fa-angle-right"></i></h3>
				<img src="https://s3.amazonaws.com/bpi-cdn/v2/wp-content/uploads/2016/09/16211210/Shope-our-store-750x350-02.jpg">
			</a>
		</div>
		<div class="animated fadeInUp" style="animation-delay: 0.2s;">
			<a href="https://bpisports.com/12-days-christmas-deals/">
				<h3>A New &amp; Amazing Deal Everyday!<i class="fas fa-angle-right"></i></h3>
				<img src="https://s3.amazonaws.com/bpi-cdn/v2/wp-content/uploads/2017/12/12155813/12-Days-of-Christmas_HomePage_Tile-25-off.jpg">
			</a>
		</div>
		<div class="animated fadeInUp" style="animation-delay: 0.4s;">
			<a href="https://store.bpisports.com/all-products/?search_query=liquid&amp;submit=Submit&amp;_ga=2.7835258.997604798.1513332053-1419607128.1513332053">
				<h3>Best BCAA + Soft Drinks = Delicious &amp; Powerful<i class="fas fa-angle-right"></i></h3>
				<img src="https://s3.amazonaws.com/bpi-cdn/v2/wp-content/uploads/2016/09/17182957/BCAA-Soda-Series_HomePage_Tile-25-off.jpg">
			</a>
		</div>
		<div class="animated fadeInUp" style="animation-delay: 0.6s;">
			<a href="/sales-and-promotions/">
				<h3>SAVE ON OUR TOP PRODUCTS!<i class="fas fa-angle-right"></i></h3>
				<img src="https://s3.amazonaws.com/bpi-cdn/v2/wp-content/uploads/2016/09/25190703/tile-011.jpg">
			</a>
		</div>
	</section>

	{{-- Products --}}

	<section id="products-row">
		<section id="products">
			<h2>Recommended Products</h2>
			<div>
				<div class="slick-track" role="listbox">
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span>$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
				</div>
			</div>
			<h2>Recommended Stacks</h2>
			<div>
				<div class="slick-track" role="listbox">
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span>$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
					<a href="#">
						<div class="product">
							<img src="{{ asset('img/best-protein.png') }}">
							<h4>Best Protein</h4>
							<span class="price">$23.99</span>
						</div>
					</a>
				</div>
			</div>
		</section>
		<aside id="products-menu">
			<ul>
				<li><a href="#">Protein<i class="fas fa-angle-right"></i></a></li>
				<li><a href="#">Pre-Workout<i class="fas fa-angle-right"></i></a></li>
				<li><a href="#">Ketogenic<i class="fas fa-angle-right"></i></a></li>
				<li><a href="#">Stacks<i class="fas fa-angle-right"></i></a></li>
			</ul>
			<div>
				<h1>Not sure where to start?</h1>
				<p>Answer these questions for a customized workout plan and our recommended supplement stack.</p>
				<a href="#" title="Customize your plan" role="link">Customize Your Plan</a>
			</div>
		</aside>
	</section>


	{{-- Articles: --}}

	<section id="articles">
		<h2>Recommended Articles</h2>
		<div class="row">
			<div class="col-md-6">
				<div>
					<a href="#">
						<img src="http://s3.amazonaws.com/bpi-cdn/v2/wp-content/uploads/2017/12/15182030/VICTORIA-HOLIDAY_THUMBNAIL.jpg" alt="">
					</a>
					<span>December 17, 2017</span>
					<h3>Tis the Season to Fall Off Track: How to Tackle the Holidays</h3>
					<a href="#">Read More<i class="fas fa-angle-right"></i></a>
				</div>
			</div>
			<div class="col-md-6">
				<div>
					<a href="#">
						<img src="http://s3.amazonaws.com/bpi-cdn/v2/wp-content/uploads/2017/12/15170546/YOUR-HOLIDAY-WISH-LIST_THUMBNAIL.jpg" alt="">
					</a>
					<span>December 16, 2017</span>
					<h3>Holiday Gift Guide for Him &amp; Her</h3>
					<a href="#">Read More<i class="fas fa-angle-right"></i></a>
				</div>
				<div>
					<a href="#">
						<img src="http://s3.amazonaws.com/bpi-cdn/v2/wp-content/uploads/2017/12/13144604/WHAT-IS-ESSENTIAL-9_THUMBNAIL.jpg" alt="">
					</a>
					<span>December 15, 2017</span>
					<h3>What is Essential 9™?</h3>
					<a href="#">Read More<i class="fas fa-angle-right"></i></a>
				</div>
				<div>
					<a href="#">
						<img src="http://s3.amazonaws.com/bpi-cdn/v2/wp-content/uploads/2017/12/12153631/BAND-EXERCISES-YOU-CAN-DO-AT-HOME_THUMBNAIL.jpg" alt="">
					</a>
					<span>December 14, 2017</span>
					<h3>5 Resistance Band Exercises You Can Do at Home</h3>
					<a href="#">Read More<i class="fas fa-angle-right"></i></a>
				</div>
			</div>
		</div>
	</section>


	{{-- Vídeos: --}}

	<section id="videos-row">
		<h2>NEWEST VIDEOS</h2>
		<div class="row">
			<div class="col-md-3">
				<div class="overlay-video"></div>
				<iframe width="100%" height="248" src="https://www.youtube.com/embed/8l7UvzPN3AA" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
				<h3>Trailer Canal Midway</h3>
			</div>
			<div class="col-md-3">
				<div class="overlay-video"></div>
				<iframe width="100%" height="248" src="https://www.youtube.com/embed/YtPgNbYUZhw" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
				<h3>Treino de Atleta - Rômulo Rocha</h3>
			</div>
			<div class="col-md-3">
				<div class="overlay-video"></div>
				<iframe width="100%" height="248" src="https://www.youtube.com/embed/PapZMGJaosA" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
				<h3>Trailer Canal Midway</h3>
			</div>
			<div class="col-md-3">
				<div class="overlay-video"></div>
				<iframe width="100%" height="248" src="https://www.youtube.com/embed/GUWqcniWY_o" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
				<h3>Treino de Atleta - Juliete de Pieri</h3>
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

			$('#videos-row .col-md-3').on('mouseover', function (e) {
			var iframe = $(this).find('iframe');
			console.log(iframe);
			$('.ytp-button', iframe.contents()).hide();
console.log('teste');
			});
		});
	</script>
@endsection
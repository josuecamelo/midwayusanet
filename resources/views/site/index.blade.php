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

		#products-row #products-menu {
			width: 25%;
			float: left;
			padding-right: 0;
			padding-left: 0;
			position: relative;
			left: -75%;
			padding-right: 2px;
		}

		@media(max-width: 600px) {
			#products-row #products-menu {
				width: 100%;
				display: block;
				left: 0;
			}
		}
		#products-row #products-menu div h1 {
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
		}

		#products-menu ul li a svg {
			display: block;
			position: absolute;
			right: 5%;
			top: 15px;
			color: red;
			z-index: 9;
			transition: all 0.3s;
		}

		#products-menu ul li a:hover svg {
			right: 2%;
		}

		#products-row #products {
			width: 75%;
			float: left;
			padding-right: 0.625rem;
			padding-left: 0.625rem;
			position: relative;
			left: 25%;
		}

		@media(max-width: 600px) {
			#products-row #products {
				width: 100%;
				left: 0;
			}
		}

		#products-row #products-menu div {
			background: black;
			color: white;
			padding: 4em 10% 6em;
		}

		#products-row #products-menu div a {
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

		#products-row #products-menu div a:hover {
			background: red;
			color: white;
		}

		#recommended-products {
			padding: 0 25px;
			text-align: center;
		}

		#recommended-products a {
			color: #000;
		}

		#recommended-products a:hover {
			text-decoration: none;
		}

		#recommended-products a span {
			color: red;
			font-weight: bold;
		}

		#recommended-stacks {
			padding: 0 25px;
			text-align: center;
		}

		#recommended-stacks a {
			color: #000;
		}

		#recommended-stacks a:hover {
			text-decoration: none;
		}

		#recommended-stacks a span {
			color: red;
			font-weight: bold;
		}

		.slick-prev::before, .slick-next::before {
			color: #000;
		}

		.slick-slide img {
			display: inline;
		}

		.product img {
			transition: all 0.3s;
		}

		.product:hover img {
			transform: scale(1.1);
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

	<aside id="mini-banners">
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
	</aside>

	{{-- Products --}}

	<section id="products-row">
		<section id="products"><h2>Recommended Products</h2>
			<div id="recommended-products">
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
			<div id="recommended-stacks" class="slick-initialized slick-slider">
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

@endsection

@section('js')
	<script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('.slick-track').slick({
				slidesToShow: 5,
				slidesToScroll: 5,
				autoplaySpeed: 5000,
				autoplay: true,
				responsive: [{
					breakpoint: 600,
					settings: {
						slidesToShow: 1,
					}
				}]
			});
		});
	</script>
@endsection
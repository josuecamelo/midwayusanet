@extends('site.main')

@section('css')
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
		<div>
			<a href="https://store.bpisports.com/all-products/?_ga=2.208811738.997604798.1513332053-1419607128.1513332053">
				<h3>SHOP our STORE<i class="fas fa-angle-right"></i></h3>
				<img src="https://s3.amazonaws.com/bpi-cdn/v2/wp-content/uploads/2016/09/16211210/Shope-our-store-750x350-02.jpg">
			</a>
		</div>
		<div>
			<a href="https://bpisports.com/12-days-christmas-deals/">
				<h3>A New &amp; Amazing Deal Everyday!<i class="fas fa-angle-right"></i></h3>
				<img src="https://s3.amazonaws.com/bpi-cdn/v2/wp-content/uploads/2017/12/12155813/12-Days-of-Christmas_HomePage_Tile-25-off.jpg">
			</a>
		</div>
		<div>
			<a href="https://store.bpisports.com/all-products/?search_query=liquid&amp;submit=Submit&amp;_ga=2.7835258.997604798.1513332053-1419607128.1513332053">
				<h3>Best BCAA + Soft Drinks = Delicious &amp; Powerful<i class="fas fa-angle-right"></i></h3>
				<img src="https://s3.amazonaws.com/bpi-cdn/v2/wp-content/uploads/2016/09/17182957/BCAA-Soda-Series_HomePage_Tile-25-off.jpg">
			</a>
		</div>
		<div>
			<a href="/sales-and-promotions/">
				<h3>SAVE ON OUR TOP PRODUCTS!<i class="fas fa-angle-right"></i></h3>
				<img src="https://s3.amazonaws.com/bpi-cdn/v2/wp-content/uploads/2016/09/25190703/tile-011.jpg">
			</a>
		</div>
	</aside>

@endsection

@section('js')
	<script>


	</script>
@endsection
@extends('site.main')

@section('css')
	<style>


	</style>
@endsection

@section('main')

	<p>Página inicial</p>

	<div id="carousel-main" class="carousel slide animated fadeInDown" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carousel-main" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-main" data-slide-to="1"></li>
			<li data-target="#carousel-main" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="{{ asset('img/home/banners/ArnoldBanner.jpg') }}" alt="...">
			</div>
			<div class="item">
				<img src="{{ asset('img/home/banners/AthleteBanner.jpg') }}" alt="...">
			</div>
			<div class="item">
				<img src="{{ asset('img/home/banners/ProductBanner.jpg') }}" alt="...">
			</div>
		</div>
		<a class="left carousel-control" href="#carousel-main" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-main" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

@endsection

@section('js')
	<script>


	</script>
@endsection
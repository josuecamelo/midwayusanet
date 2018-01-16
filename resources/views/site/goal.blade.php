@extends('site.main')

@section('css')
	<style>
		#objetivos {
			position: fixed;
			width: 100%;
			margin-top: 80px;
			z-index: 99;
			background: rgba(71, 82, 28, 0.7);
		}

		#objetivos ul {
			list-style: none;
			margin: 0;
			padding: 0;
			display: flex;
			width: 100%;
			justify-content: space-around;
			text-align: center;
			position: relative;
		}

		#objetivos ul li {
			padding: 10px;
			width: 100%;
			text-align: center;
			position: relative;
		}

		#objetivos ul li:hover, #objetivos .active {
			background: #47521c;
			text-align: center !important;
			border-bottom: 2px solid #ba9e17;
		}

		#objetivos img {
			height: 70px;
			margin: auto;
		}

		#main {
			background: url({{asset('img/bg-concreto.jpg')}});
			padding-top: 200px;
		}

		#main h1 {
			padding: 40px 0 20px;
			font-weight: 900;
			letter-spacing: 7px;
			color: #d0bc86;
			font-size: 50px;
			text-shadow: 0 2px 20px rgba(0, 0, 0, .5);
		}

		#main .row {
			margin-bottom: 72px;
		}

		#main .row div:first-child {
			text-align: center;
		}

		#main h1 a {
			color: #d0bc86;
			margin: 0;
			font-weight: 900;
			text-shadow: 0 2px 20px rgba(0, 0, 0, .5);
			letter-spacing: 7px;
			font-size: 60px;
		}

		#main h1 a:hover {
			color: #ba9e17;
		}

		#main h1 span {
			font-weight: 500;
			font-size: 33px;
			letter-spacing: 15px;
			display: block;
			text-shadow: 0 2px 10px rgba(0, 0, 0, .7);
			color: #fff
		}

		#main p {
			font-size: 20px;
			margin-bottom: 30px;
			text-shadow: 0 2px 12px #000;
		}

		.col-md-pull-5 {
			text-align: right;
		}

		.apresentacao {
			font-weight: bold;
			font-size: 25px;
			margin-right: 10px;
		}

		.cor {
			border-radius: 4px;
			color: #fff;
			padding: 1px 7px;
		}

		#description {
			background: #47521c;
			text-align: center;
			padding: 15px 20px;
			color: #d0bc86;
			border-radius: 3px;
			font-size: 22px !important;
			box-shadow: 0 5px 10px rgba(0,0,0,0.3);
		}
	</style>
@endsection

@section('main')

	<section id="objetivos">
		<div class="container">
			<ul>
				@foreach($goals as $g)
					<li{{ ($goal->slug == $g->slug) ? ' class=active' : '' }}>
						<a href="{{ asset('objetivos') . '/' . $g->slug }}">
							<img src="{{ asset('uploads/goals') . '/' . $g->id . '/' . $g->logo }}" class="img-responsive">
						</a>
					</li>
				@endforeach
			</ul>
		</div>
	</section>

	<section id="main">
		<div class="container">

			<p id="description" class="animated fadeInDown">{{ $goal->description }}</p>

			@foreach($products as $key => $product)
				<div class="row" data-aos="fade-up">
					<div class="col-md-5 {{ $key % 2 == 0 ? '' : 'col-md-push-7' }}">
						<a href="{{ $product->url_visualizacao  }}"><img src="{{ asset('uploads/products') . '/' . $product->id . '/' . $product->image }}" alt="" class="img-responsive"></a>
					</div>
					<div class="col-md-7 {{ $key % 2 == 0 ? '' : 'col-md-pull-5' }}">
						<h1><a href="{{ $product->url_visualizacao  }}">{{ $product->name }}<span>{{ $product->last_name }}</span></a></h1>
						<p>
							<span class="apresentacao">{{ $product->presentation }}</span>
							@if(!empty($product->flavor))
								<span class="cor" style="background-color: {{ $product->flavor->color }}">{{ $product->flavor->name }}</span>
							@endif
						</p>
						<div>
							<p>{{ $product->description }}</p>
							<p><a href="{{ $product->link_purchase }}" target="_blank" class="bt2"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Comprar</a></p>
						</div>
					</div>
				</div>
			@endforeach

		</div>
	</section>

@endsection

@section('js')
	<script src="{{ asset('js/aos.js') }}"></script>
	<script>
		$(function () {
			AOS.init();
		});
	</script>
@endsection
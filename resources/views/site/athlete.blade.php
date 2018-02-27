@extends('site.main')

@section('css')
	<style>

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
			background: #ff0000;
			border-radius: 100%;
			width: 33px;
			height: 33px;
			display: inline-block;
			color: #fff;
			font-size: 20px;
			padding-top: 1px;
		}

		#redes-sociais ul li a:hover {
			background: #000;
		}

		#bio {
			padding: 72px;
			text-align: center;
		}

		#bio h1 {
			margin: 0 0 20px;
			color: #777;
		}

		#fotos {
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
			background: rgba(100, 100, 100, 0.1);
			text-align: center;
		}

		#videos h3 {
			margin: 0;
			padding: 50px 0 20px;
			color: #000;
		}

		#produtos {
			background: rgba(0, 0, 0, 0.09);
			padding: 50px;
		}

		#produtos h2 {
			text-align: center;
			display: table;
			letter-spacing: 4px;
			padding: 0 70px;
			margin: 0 auto 60px;
			border-right: 10px solid #ff0000;
			border-left: 10px solid #ff0000;
		}

		@media (min-width: 1200px) {
			#main h1 {
				margin-top: 30px;
				font-weight: 900;
				line-height: 95%;
				letter-spacing: 7px;
				font-size: 6rem;
				color: #000;
				text-align: left;
			}

			#main h1 span {
				font-weight: 400;
				font-size: 3rem;
				letter-spacing: 20px;
				line-height: 100%;
				display: block;
				color: #777;
			}

			#main {
				padding: 40px;
			}

			#main h2 {
				margin: 0 0 20px;
				color: #777;
				font-size: 2rem;
			}
		}

		@media (max-width: 1200px) {
			#main h1 {
				margin-top: 30px;
				font-weight: 900;
				line-height: 95%;
				letter-spacing: 7px;
				font-size: 4rem;
				color: #000;
				text-align: left;
			}

			#main h1 span {
				font-weight: 400;
				font-size: 1.2rem;
				letter-spacing: 20px;
				line-height: 100%;
				display: block;
				color: #777;
			}

			#main {
				padding: 20px;
			}

			#main h2 {
				margin: 0 0 20px;
				color: #777;
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
					<div class="col-md-7 animated fadeInRight">
						<h1>{{ $athlete->name }}<span>{{ $athlete->last_name }}</span></h1>
						<div>
							<h2>{{ $athlete->profession }}</h2>
							<p>{{ $athlete->about }}</p>
							<div id="redes-sociais">
								<ul>
									@if($athlete->facebook)
										<li><a href="{{ $athlete->facebook }}"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>@endif
									@if($athlete->twitter)
										<li><a href="{{ $athlete->twitter }}"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>@endif
									@if($athlete->instagram)
										<li><a href="{{ $athlete->instagram }}"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>@endif
									@if($athlete->youtube)
										<li><a href="{{ $athlete->youtube }}"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>@endif
									@if($athlete->snapchat)
										<li><a href="{{ $athlete->snapchat }}"><i class="fab fa-snapchat-ghost" aria-hidden="true"></i></a></li>@endif
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
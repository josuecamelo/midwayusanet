@extends('site.main')

@section('css')
	<style>

		#treinos header {
			margin-top: 80px;
			background: url({{asset('img/bg-header-videos.jpg')}}) center;
		}

		#treinos h1 {
			color: #ba9e17;
			text-align: center;
			margin-bottom: 50px;
			padding-top: 100px;
			font-weight: bold;
		}

		@media (min-width: 1200px) {

			#treinos {
				margin-top: -100px;
				padding-top: 100px;
				padding-bottom: 140px;
				background: url({{ asset('img/bg.jpg') }});
				display: block;
				position: relative;
			}

			#treinos header h1 {
				margin: 0;
				padding: 12rem 0;
				width: 100%;
				font-size: 4rem;
				color: #d0bc86;
				letter-spacing: 4rem;
				text-align: center;
			}

			#treinos h2 {
				margin: 100px 0 30px;
				color: #6d7d32;
				font-size: 40px;
				text-align: center;
				position: relative;
				letter-spacing: 3px;
			}

			#treinos h2::after, #treinos h2::before {
				content: "";
				display: block;
				height: 2px;
				background-color: #ba9e17;
				width: 20%;
				position: absolute;
				top: 50%;
				margin-bottom: 50px
			}
		}

		@media (max-width: 1200px) {

			#treinos {
				margin-top: -100px;
				padding-top: 100px;
				padding-bottom: 80px;
				background: url({{ asset('img/bg.jpg') }});
				display: block;
				position: relative;
			}

			#treinos header {
				background-size: auto 300px;
			}

			#treinos header h1 {
				margin: 0;
				padding: 6rem 0;
				width: 100%;
				font-size: 3rem;
				color: #d0bc86;
				letter-spacing: 2rem;
				text-align: center;
			}

			#treinos h2 {
				margin: 100px 0 30px;
				color: #6d7d32;
				font-size: 30px;
				text-align: center;
				position: relative;
				letter-spacing: 3px;
			}

			#treinos h2::after, #treinos h2::before {
				content: "";
				display: block;
				height: 2px;
				background-color: #ba9e17;
				width: 5%;
				position: absolute;
				top: 50%;
				margin-bottom: 50px
			}

			#treinos .col-md-4 {
				margin-bottom: 40px;
			}
		}

		#treinos h2::after {
			right: 0;
		}

		#treinos h3 {
			color: #d0bc86;
			font-size: 20px;
		}

		#treinos h4 {
			color: #6d7d32;
			font-size: 20px;
			margin-top: 5px;
		}

		#treinos .col-md-7 {
			padding: 0;
		}

		#treinos .col-md-5 {
			padding: 5px 30px !important;
			background: #293821;
			overflow-y: scroll;
			height: 384px;
		}

		#treinos .col-md-5 h4 {
			padding: 5px;
			background: #1e2c12;
			font-size: 14px;
			border-radius: 3px;
			margin-top: 15px;
			display: inline-block;
		}

		#treino-video h3 {
			margin-top: 0px;
		}

		#treino-video {
			color: #d0bc86;
		}

		#treinos .row {
			margin-bottom: 40px;
		}

		.well {
			color: #293821;
			margin-top: -10px;
		}

		#treinos h4 a {
			float: right;
		}
	</style>
@endsection

@section('main')

	<section id="treinos">

		<header>
			<h1>Treinos</h1>
		</header>

		<div class="container">


			{{-- Treino do dia: --}}

			<h2>Treino do dia</h2>
			<div class="row" id="treino-video">
				<div class="col-md-7">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="{{ $treinoDoDia->video }}" allowfullscreen></iframe>
					</div>
				</div>
				<div class="col-md-5">
					<h4>{{ $treinoDoDia->category->name }}</h4>
					<h3>{{ $treinoDoDia->title }}</h3>
					<p>{!! nl2br($treinoDoDia->description) !!}</p>
				</div>
			</div>


			{{-- Categorias: --}}

			@foreach($categorias as $categoria)
				<h2>{{ $categoria->name }}</h2>
				<div class="row">
					@foreach($categoria->trainings as $treino)
						<div class="col-md-4">
							<h4>{{ $treino->title }}</h4>
							<div class="embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="{{ $treino->video }}" allowfullscreen></iframe>
							</div>
							<p class="text-right">
								<button class="bt-xs" type="button" data-toggle="collapse" data-target="#collapse{{ $treino->id }}" aria-expanded="false" aria-controls="collapse{{ $treino->id }}">
									<i class="fa fa-list-ul" aria-hidden="true"></i> Descrição
								</button>
							</p>
							<div class="collapse" id="collapse{{ $treino->id }}">
								<div class="well">
									{!! nl2br($treino->description) !!}
								</div>
							</div>
						</div>
					@endforeach
				</div>
			@endforeach
		</div>
	</section>

@endsection

@section('js')
	<script>
		$(function () {
			$('[data-toggle="popover"]').popover({
					container: 'body',
					html: true
				}
			);
		});
	</script>
@endsection
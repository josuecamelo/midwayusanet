@extends('site.main')

@section('css')
	<style>

		@media (min-width: 1200px) {
			#objetivos h1 {
				text-align: center;
				color: #6d7d32;
				margin-bottom: 15px;
				font-weight: bold;
				font-size: 55px;
			}
		}

		@media (max-width: 1200px) {
			#objetivos h1 {
				text-align: center;
				color: #6d7d32;
				margin-bottom: 25px;
				font-weight: bold;
				font-size: 34px;
			}
		}

		#objetivos {
			padding-top: 80px;
			position: relative;
			text-align: center;
			z-index: 20;
			background: url({{ asset('img/bg3.jpg') }});
			color: #666;
			display: table;
			width: 100%;
		}

		#objetivos #botoes {
			margin: 50px 0;
			display: flex;
			justify-content: space-between;
			padding-bottom: 50px;
		}

		#objetivos #botoes div {
			overflow: hidden;
			box-shadow: inset 0px 0px 0px 10px transparent;
			transition: all 0.3s ease-in-out;
		}

		#objetivos #botoes div:nth-child(2) {
			margin: 0 10px;
		}

		#objetivos #botoes div a img {
			transition: all 0.3s ease-in-out;
		}

		#objetivos #botoes div:hover a img {
			transform: scale(1.05);
		}

		p {
			color: #d0bc86;
		}
	</style>
@endsection

@section('main')

	<section id="objetivos">
		<div class="container">
			<h1>QUAL O SEU OBJETIVO?</h1>
			<p>A Military Trail é a linha de suplementos mais moderna e concentrada do mercado, feita com as máximas concentrações dos melhores ativos dos Estados Unidos. A Midway Labs USA chegou ao limite da suplementação para você extrapolar os limites dos seus resultados. Inspirada nos heróis da vida real, Military Trail é ideal para quem tem objetivos e precisa estar sempre pronto para romper barreiras.</p>
			<div id="botoes">
				@foreach($goals as $goal)
					<div>
						<a href="{{ url('objetivos') . '/' . $goal->slug }}">
							<img src="{{ url('uploads/goals') . '/' . $goal->id . '/' . $goal->banner }}" class="img-responsive">
						</a>
					</div>
				@endforeach
			</div>
		</div>
	</section>

@endsection
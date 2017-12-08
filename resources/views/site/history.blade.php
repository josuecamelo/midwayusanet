@extends('site.main')

@section('css')
	<style>

		#historia header {
			margin: 80px 0;
			background: url({{asset('img/bg-header-sobre.jpg')}});
		}

		#historia header h1 {
			margin: 0;
			padding: 220px;
			width: 100%;
			font-size: 50px;
			color: #d0bc86;
			letter-spacing: 60px;
		}

		@media (min-width: 1200px) {

			#historia {
				margin-top: -100px;
				padding-top: 100px;
				padding-bottom: 140px;
				background: url({{ asset('img/bg.jpg') }});
				display: block;
				position: relative;
			}

			#historia h1 {
				color: #ba9e17;
				text-align: center;
				margin-bottom: 50px;
				padding-top: 100px;
				font-weight: bold;
			}
		}

		@media (max-width: 1200px) {

			#historia {
				margin-top: -100px;
				padding-top: 100px;
				padding-bottom: 80px;
				background: url({{ asset('img/bg.jpg') }});
				display: block;
				position: relative;
			}

		}

		#historia h2 {
			margin: 100px 0 30px;
			color: #6d7d32;
			font-size: 40px;
			text-align: center;
			position: relative;
			letter-spacing: 3px;
		}

		#historia p{
			font-size: 17px;
			line-height: 26px;
			color: #555;
			text-align: justify;
		}

	</style>
@endsection

@section('main')

	<section id="historia">

		<header>
			<h1>Sobre</h1>
		</header>

		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<p>A Military Trail é uma linha de produtos fabricada nos Estados Unidos por uma das maiores marcas de suplementos alimentares do mundo, a Midway International Labs. Inspirada nos heróis da vida real, foi criada para atletas que dependem diariamente da força extrema e que precisam estar prontos para todos os tipos de desafios. Com concentrações máximas dos melhores ingredientes do mercado norte-americano, Military Trail atingiu o limite da suplementação para oferecer os produtos da mais alta qualidade e eficácia.</p>
					<p>Os produtos Midway Labs USA são fabricados sob os rigorosos processos de qualidade exigidos pelo Food and Drug Administration (FDA), órgão que estuda, testa e certifica alimentos, medicamentos e suplementos, e são produzidos em planta com certificado Good Manufacturing Practice (GMP). Hoje, a empresa faz parte do Board of Directors da American Chamber of Washington DC, tem 15 fábricas operando na América e 500 produtos em seu portfólio, que são vendidos em mais de 60 países.</p>
					<p>Military Trail: o melhor da tecnologia Midway Labs USA para quem busca a máxima performance.</p>
				</div>
			</div>
		</div>
	</section>

@endsection
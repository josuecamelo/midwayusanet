@extends('site.main')

@section('css')
	<style>

		#revenda header {
			margin: 80px 0 60px;
			background: url({{asset('img/banner-inscrever.jpg')}}) center;
		}

		@media (min-width: 1200px) {
			#revenda header h1 {
				margin: 0;
				padding: 140px;
				width: 100%;
				font-size: 28px;
				color: #d0bc86;
				letter-spacing: 16px;
				line-height: 40px;
			}
		}

		@media (max-width: 1200px) {
			#revenda header h1 {
				margin: 0;
				padding: 40px;
				width: 100%;
				font-size: 25px;
				color: #d0bc86;
				letter-spacing: 10px;
				line-height: 40px;
			}
		}

		#revenda {
			margin-top: -100px;
			padding-top: 100px;
			padding-bottom: 140px;
			background: url({{ asset('img/bg.jpg') }});
			display: block;
			position: relative;
		}

		#revenda h1 {
			color: #ba9e17;
			text-align: center;
			margin-bottom: 50px;
			padding-top: 100px;
			font-weight: bold;
		}

		#revenda p {
			font-size: 17px;
			line-height: 26px;
			color: #444;
			text-align: center;
			margin-bottom: 30px;
			font-weight: bold;
		}

		label {
			color: #47521c;
			font-weight: normal;
			font-size: 14px;
		}

		label span {
			color: red;
		}

		#privacidade {
			font-size: 15px !important;
			font-weight: normal !important;
		}

	</style>
@endsection

@section('main')

	<section id="revenda">

		<header>
			<h1>CADASTRE-SE E RECEBA NOVIDADES</h1>
		</header>

		<div class="container text-center">
			@include('flash::message')
		</div>

		<div class="container">
			<p>Inscreva-se gratuitamente para se manter informado com a Military Trail.</p>
			<p>Você irá receber valiosos programas de treinamento, dicas nutricionais, e muito mais!</p>
			<p id="privacidade">Nós respeitamos e valorizamos suas informações pessoais. Tenha certeza de que aderimos a práticas de privacidade rígidas para proteger qualquer informação que você nos fornece.</p>
			<form action="{{ route('inscrever') }}" method="post">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="name">Nome <span>*</span></label>
							<input type="text" class="form-control" name="name" id="name" required autofocus>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="email">Email <span>*</span></label>
							<input type="email" class="form-control" name="email" id="email" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<label>
							<small><span>* Campos obrigatórios</span></small>
						</label>
						<br>
						<button type="submit" class="bt">Enviar <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
					</div>
				</div>
			</form>
		</div>
	</section>

@endsection
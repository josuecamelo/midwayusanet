@extends('site.main')

@section('css')
	<style>
		#quality h2 {
			margin-top: 40px;
		}

		#quality h3 {
			font-size: 22px;
		}

		#quality h4 {
			font-size: 18px;
			text-align: center;
		}

		#quality p {
			text-align: justify;
		}
	</style>
@endsection

@section('main')

	<section id="quality">

		<header>
			<div class="container">
				<h1 class="h1">Our Commitment to Quality</h1>
			</div>
		</header>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p>Midway Labs USA, with its excellent reputation as a leader in the international supplements industry, is dedicated to producing the highest quality supplements on the market. All Midway Lab USA products are proudly manufactured in the United States of America using Good Manufacturing Practices (GMP) in FDA registered facilities.</p>
					<p>Each product is manufactured under rigorous quality control while being supervised by a dynamic and experienced team of scientists, chemists, nutritionists, and product managers. As a result of our dedication to quality and attention to detail, Midway Labs USA is recognized as one of the top supplement brands in the world.</p>
					<h2>Midway Labs USA’s Scientific Counsel</h2>
					<p>Our team of advisors includes several highly talented and dedicated scientists, chemists, medical doctors, and nutritionists, all of whom are dedicated to helping Midway Labs USA create the best possible products. Each expert on our counsel is involved in every step of the production cycle from research and development to manufacturing and testing. The counsel conducts extensive research to ensure that not only do our products live up to the claims made about each product, but also that the products are safe to take and are made from the highest-quality of ingredients available.</p>
					<h3>Our Scientific Counsel Includes:</h3>
					<div class="row">
						<div class="col-md-3">
							<h4>Dr. Gerseli Angeli</h4>
							<img src="{{ asset('img/gerseli.png') }}" alt="" class="img-rounded">
						</div>
						<div class="col-md-3">
							<h4>Dr. Turíbio Leite de Barros</h4>
							<img src="{{ asset('img/turibio.png') }}" alt="" class="img-rounded">
						</div>
						<div class="col-md-3">
							<h4>Dr. Dirceu Raposo</h4>
							<img src="{{ asset('img/dirceu.png') }}" alt="" class="img-rounded">
						</div>
						<div class="col-md-3">
							<h4>Karen Lima</h4>
							<img src="{{ asset('img/karen.png') }}" alt="" class="img-rounded">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection
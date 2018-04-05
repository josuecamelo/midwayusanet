@extends('site.main')

@section('css')
	<style>
		#quality h2 {
			text-align: center;
			margin-top: 40px;
		}

		#quality h3 {
			text-align: center;
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
							<p>Dr. Gerseli Angeli holds a PhD in Sports Science, a master and doctorate in Rehabilitation, and an undergraduate degree in Physiotherapy. She was the physiologist for the Gremio and Barueri Soccer Clubs, as well as the first woman to hold a post in a professional soccer club in Brazil. Dr. Angeli is currently a member of the American College of Sports Medicine, and was previously a scientific director at CEFAME and director at the Instituto de Fisiologia do Exercício (Institute for Exercise Physiology).</p>
						</div>
						<div class="col-md-3">
							<h4>Dr. Turíbio Leite de Barros</h4>
							<img src="{{ asset('img/turibio.png') }}" alt="" class="img-rounded">
							<p>With over 35 years of experience in the supplements industry, Dr. Turibio Leite de Barros not only holds a PhD in Exercise Physiology, he is also considered an authority on the subject. He is a member of the American College of Sports Medicine, and was a professor and coordinator for the Specialization Course in Sports Medicine at UNIFESP. Dr. de Barros was also a physiologist for the São Paulo Soccer Club, and coordinator in the Department of Physiology at Esporte Clube Pinheiros (Pinheiros Sports Club).</p>
							<p>Dr. de Barros has served as a columnist for Jornal da Tarde for over five years and has published over 100 scientific articles in both national and international sports academic journals. He has published seven books and won the Jabuti Award for Scientific Literature for the publication “O Exercício - aspectos especiais e preventivos” (“Exercise - Special and Preventive Aspects").</p>
						</div>
						<div class="col-md-3">
							<h4>Dr. Dirceu Raposo</h4>
							<img src="{{ asset('img/dirceu.png') }}" alt="" class="img-rounded">
							<p>Dr. Dirceu Raposo graduated with a degree in Pharmacy and Biochemistry from the University of São Paulo, earned his master degree in Health Sciences from the University of Guarulhos, and his doctorate degree in Pharmaceutical Sciences from Julio de Mesquita Filho São Paulo State University. He specialized in Bioethics at the University of Brasilia, Hospital Administration at São Camilo University, and Homeopathy at the François Lamasson Institute. Dr. Dirceu Raposo also served as the CEO of the Agência Nacional de Vigilância Sanitária (National Health Surveillance Agency).</p>
						</div>
						<div class="col-md-3">
							<h4>Karen Lima</h4>
							<img src="{{ asset('img/karen.png') }}" alt="" class="img-rounded">
							<p>Karen Lima specializes in Clinical Sports Nutrition. She has an undergraduate degree in Nutrition and earned her MBA with emphasis on Quality Management and Productivity.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection
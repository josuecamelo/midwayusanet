@extends('site.main')

@section('css')
	<style>
		h1 {
			text-align: center;
		}

		#packshot {
			text-align: center;
			padding: 40px 0;
			margin: 30px 0;
			background: #fff;
			box-shadow: 0 0 15px rgba(150,150,150,0.1);
		}

		.text {
			column-count: 3;
			column-gap: 40px;
			text-align: justify;
		}

		.img-res {
			max-width: 100%;
		}

		h2 {
			margin: 30px 0 20px !important;
		}

		#lines {
			padding-top: 10px !important;
		}
	</style>
@endsection

@section('main')

	<img src="{{ asset('img/about.jpg') }}" alt="" class="img-responsive animated fadeInDown">

	<div class="container">
		<h1>Who We Are</h1>
		<p class="text">This is our mission, to supplement your journey into building your best version of yourself! With this concept in mind, Midway Labs USA was founded in 1991 by visionary entrepreneur Wilton Colle, bringing the science and technology of the dietary supplement industry to millions of consumers. With extensive international presence and over 25 years in the market, Midway Labs USA is today one of the largest supplement brands in the world. All products are proudly manufactured in the United States of America in GMP and FDA registered facilities, supervised by a team of renowned professional scientists, doctors and nutritionists.</p>
		<p><img src="{{ asset('img/about-usa.jpg') }}" alt="" class="img-res"></p>
		<p class="text">Currently, Midway Labs USA which is on the board of directors of the American Chamber of Washington DC. We are also a proud supporter and sponsor of several events, sports and athletes, such as the world famous soccer player Kaká, The UFC Champions Nogueira Brothers, the IFBB pro Felipe Franco, The first ever Women’s Physique Karina Nascimento, Latin America MovieStars Giovanna Ewbank & Bruno Gagliasso as well as being the Diamond Sponsor at the Arnold Classic USA and Brazil, Title Sponsor at all 4 Europa Games, Official Sponsor of IFBB (International Federation of Bodybuilding), Official Sponsor of the Boston City Soccer Club, StockCar Racing, Athina Onassis Longiness and several other athletes, teams and events worldwide.</p>
	</div>

	<img src="{{ asset('img/bella.jpg') }}" alt="" class="img-res">

	<div id="packshot">
		<p class="container">With over 500 SKUS, selling inside the main big box retailers, advertising in the main magazines and nationwide TV commercials in South America, Midway Labs USA is ever expanding globally with innovative and unique product lines such as Glamour Nutrition (Nutri-Cosmetics) and Military Trail (Premium Supplements).</p>
		<p><img src="{{ asset('img/packshot-usa.png') }}" alt="" class="img-res"></p>
	</div>

	<div class="container">
		<div class="row" id="lines">
			<div class="col-md-6">
				<img src="{{ asset('img/banner-glamour.png') }}" alt="" class="img-responsive img-rounded">
				<h2>BEAUTY COMES FROM WITHIN</h2>
				<p>Glamour Nutrition was created with this belief in mind and it’s mission is to empower women worldwide from the inside out! Created by women for women, Catherine Colle together with the scientific council from Midway Labs USA, developed a specific line of beauty from within products based on scientific research and proven results. A true Nutri-Cosmetic line of products designed to bring out your natural beauty using the finest ingredients and technology. Because Beauty, Love and Confidence all starts from within.</p>
			</div>
			<div class="col-md-6">
				<img src="{{ asset('img/banner-military.png') }}" alt="" class="img-responsive img-rounded">
				<h2>MILITARY TRAIL</h2>
				<p>Military Trail is the line of products created to honor those who always have to be physically prepared to defend us. While risking their lives daily they must always be ready for any challenge.</p>
				<p>In honor of the brave men and women who are active-duty or veterans of the U.S. Military and law enforcement. 5% of u.s. gross sales proceeds for military trail will be donated to charities that support our active service members, veterans, law enforcement and their families.*</p>
			</div>
		</div>
		<div class="row">
			HIGH QUALITY CONTROL & RESEARCH

			All of Midway Labs USA products are manufactured in GMP (Good Manufacturing Practices) and FDA registered facilities. Under rigorous quality control and supervised by a dynamic and experienced team of scientists, formulators and product managers. As a result our products are recognized as one of the top dietary supplement brands worldwide.
			OUR SCIENTIFIC COUNCIL

			Dr. Gerseli Angeli

			Dr. Turíbio Leite de Barros

			Dr. Dirceu Raposo

			Karen Lima
		</div>

	</div>

@endsection
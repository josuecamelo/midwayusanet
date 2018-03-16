@extends('site.main')

@section('css')
	<style>
		h1 {
			text-align: center;
		}

		#packshot {
			text-align: center;
			padding: 40px 0;
			margin-bottom: 30px;
			background: #fff;
			box-shadow: 0 0 15px rgba(150, 150, 150, 0.1);
		}

		.text {
			column-count: 3;
			column-gap: 40px;
			text-align: justify;
			padding-bottom: 30px;
		}

		@media (max-width: 600px) {
			.text {
				columns: auto;
			}
		}

		.img-res {
			max-width: 100%;
		}

		h2 {
			margin: 30px 0 20px !important;
			text-align: center;
		}

		#lines {
			padding-top: 10px !important;
		}
	</style>
@endsection

@section('main')

	<picture>
		<source media="(min-width: 480px)" srcset="{{ asset('img/about.jpg') }}">
		<img src="{{ asset('img/about-mobile.jpg') }}" class="img-responsive animated fadeInDown">
	</picture>

	<div class="container animated fadeInUp">
		<h1>Who We Are</h1>
		<div class="text">
			<p>This is our mission, to supplement your journey into building your best version of yourself! With this concept in mind, Midway Labs USA was founded in 1991 by visionary entrepreneur Wilton Colle, bringing the science and technology of the dietary supplement industry to millions of consumers. With extensive international presence and over 25 years in the market, Midway Labs USA is today one of the largest supplement brands in the world. All products are proudly manufactured in the United States of America in GMP and FDA registered facilities, supervised by a team of renowned professional scientists, doctors and nutritionists.</p>
			{{--<p><img src="{{ asset('img/about-usa.jpg') }}" alt="" class="img-res"></p>--}}
			<p>Midway Labs USA  is currently on the board of directors of the American Chamber of Washington, DC. We are also a proud supporter and sponsor of several events, sports and athletes, such as the world famous soccer player Kaká, the UFC Champions Nogueira Brothers, the IFBB pro Felipe Franco, the first ever Women’s Physique Karina Nascimento, Athina Onassis Longiness, and Latin America movie stars Giovanna Ewbank and Bruno Gagliasso We are also the Main Sponsor  at the Arnold Classic USA and Brazil, Title Sponsor at all 4 Europa Games, Official Sponsor of IFBB (International Federation of Bodybuilding), and Official Sponsor of the Boston City Soccer Club, StockCar Racing, and other teams and events worldwide.</p>
			{{--<p><img src="{{ asset('img/about-usa-2.jpg') }}" alt="" class="img-res"></p>--}}
		</div>
	</div>

	<div class="animated fadeInUp">
		<picture>
			<source media="(min-width: 480px)" srcset="{{ asset('img/bella.jpg') }}">
			<img src="{{ asset('img/bella-mobile.jpg') }}" class="img-res">
		</picture>
	</div>

	<div id="packshot">
		<p class="container">With over 500 products selling at the major big box retailers, advertising in major magazines and airing nTV commercials across  South America, Midway Labs USA is ever expanding globally with innovative and unique product lines such as Glamour Nutrition (Nutri-Cosmetics) and Military Trail (Premium Supplements).</p>
		<p><img src="{{ asset('img/packshot-usa.png') }}" alt="" class="img-res"></p>
	</div>

	<div class="container">
		<div class="row" id="lines">
			<div class="col-md-6">
				<img src="{{ asset('img/banner-glamour.png') }}" alt="" class="img-responsive img-rounded">
				<h2>BEAUTY COMES FROM WITHIN</h2>
				<p>Glamour Nutrition was created with this belief in mind and it’s mission is to empower women worldwide from the inside out! Created by women for women, Catherine Colle, together with the scientific council from Midway Labs USA, developed a specific line of beauty from within products based on scientific research and proven results. Glamour Nutrition is a true Nutri-Cosmetic line of products designed to bring out your natural beauty using the finest ingredients and technology. Because Beauty, Love and Confidence all starts from within.</p>
			</div>
			<div class="col-md-6">
				<img src="{{ asset('img/banner-military.png') }}" alt="" class="img-responsive img-rounded">
				<h2>MILITARY TRAIL</h2>
				<p>Military Trail is the line of products created to honor those who always have to be physically prepared to defend us. While risking their lives daily, members of the military must be constantly ready for any challenge.</p>
				<p>In honor of the brave men and women who are active duty or veterans of the U.S. Military and law enforcement. 5% of Military Trail’s U.S. gross sales will be donated to charities that support our active service members, veterans, law enforcement and their families.*</p>
				<p>All Midway Labs USA products are manufactured in GMP (Good Manufacturing Practices) and FDA registered facilities under rigorous quality control and supervised by a dynamic and experienced team of scientists, formulators and product managers. As a result our products are recognized as one of the top dietary supplement brands worldwide.</p>
				<p><a href="{{ route('team-midway.list') }}">Team Midway</a></p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2>HIGH QUALITY CONTROL & RESEARCH</h2>
				<p>All of Midway Labs USA products are manufactured in GMP (Good Manufacturing Practices) and FDA registered facilities. Under rigorous quality control and supervised by a dynamic and experienced team of scientists, formulators and product managers. As a result our products are recognized as one of the top dietary supplement brands worldwide.</p>
			</div>
		</div>
		<p class="text-center"><b>OUR SCIENTIFIC COUNCIL</b></p>
		<div class="row text-center">
			<div class="col-md-3">
				<img src="{{ asset('img/gerseli.png') }}" alt="" class="img-rounded">
				<p>Dr. Gerseli Angeli</p>
			</div>
			<div class="col-md-3">
				<img src="{{ asset('img/turibio.png') }}" alt="" class="img-rounded">
				<p>Dr. Turíbio Leite de Barros</p>
			</div>
			<div class="col-md-3">
				<img src="{{ asset('img/dirceu.png') }}" alt="" class="img-rounded">
				<p>Dr. Dirceu Raposo</p>
			</div>
			<div class="col-md-3">
				<img src="{{ asset('img/karen.png') }}" alt="" class="img-rounded">
				<p>Karen Lima</p>
			</div>
		</div>

	</div>

@endsection
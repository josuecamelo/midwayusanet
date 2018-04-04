@extends('site.main')
@section('css')
	<style>
		.img-featured {
			max-width: 100%;
			max-height: 220px;
			height: auto;
			width: auto;
			display: block;
			border: 1px solid #eee;
			padding: 5px;
		}

		.data {
			color: #777;
		}

		.h3 {
			font-size: 20px;
			margin: 10px 0;
		}

		.linha {
			padding-bottom: 30px;
		}

		a {

		}

		a h3 {
			color: #333;
		}
	</style>
@endsection
@section('main')
	<div class="container">
		<h1>{{$title}}</h1>
		@if($t==2)
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-center">HIGH QUALITY CONTROL & RESEARCH</h2>
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
		@endif
		@foreach($posts->chunk(3) as $post)
			<div class="row linha">
				@foreach($post as $p)
					<div class="col-md-4">
						<a href="{{route('blog.see',$p->slug)}}">
							<img src="{{$p->show_image}}" alt="{{$p->title}}" class="img-featured">
						</a>
						<span class="data">{{dataMes($p->date)}}</span>
						<a href="{{route('blog.see',$p->slug)}}">
							<h3 class="h3">{{$p->title}}</h3>
							Read More <i class="fas fa-angle-right"></i>
						</a>
					</div>
				@endforeach
			</div>
		@endforeach
	</div>
@endsection

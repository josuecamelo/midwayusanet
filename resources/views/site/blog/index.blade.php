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
			padding: 2px;
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

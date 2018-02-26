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

		.blogContainer {
			text-align: justify;
			font-size: 18px;
		}

		.post_date {
			color: #777;
			margin: -10px 0 15px 0;
		}

		figure {
			position: relative;
			text-align: center;
			font-weight: 700;
			color: #999;
			background-color: #fff;
			overflow: hidden;
			margin: 20px;
			background: none !important;
		}

		.caption {
			position: absolute;
			bottom: 0;
			left: 0;
			padding: 5px;
			font-size: 14px;
			line-height: 150%;
			font-weight: 700;
			color: #fff;
			z-index: 100;
			background-color: rgba(0, 0, 0, .8);
			-webkit-transition: all .3s ease-out;
			transition: all .3s ease-out;
		}

		.tagTag {
			background: #222;
			color: #fff;
			border-radius: 5px;
			padding: 5px;
		}

		.h3 {
			font-size: 20px;
			margin: 5px 0 20px 0;
		}
	</style>
@endsection
@section('main')
	<div class="container">
		<h1>{{$post->title}}</h1>
		<div class="post_date">
			<i class="fa fa-clock"></i>
			{{dataMes($post->date)}}
		</div>
		<div class="row">
			<div class="col-md-8 blogContainer">
				{!! $post->content !!}
				<p></p>
				<hr>
				<p></p>
				<div class="blogTags">
					@if(count($post->tags) > 0)
						@foreach($post->tags as $t)
							<a href="{{route('blog.index',['tag'=>$t->slug])}}" class="tagTag">{{$t->name}}</a>
						@endforeach
					@endif
				</div>
			</div>
			<div class="col-md-4">
				@foreach($posts as $p)
					<div>
						<a href="{{route('blog.see',$p->slug)}}">
							<img class="img-featured" src="{{$p->show_image}}" alt="">
						</a>
						<h3 class="h3"><a href="{{route('blog.see',$p->slug)}}">{{$p->title}}</a></h3>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection
@section('js')
	<script>
		$(document).ready(function () {
			$('.blogContainer img').each(function () {
				var alt = $(this).attr('alt');
				if (alt.length > 0) {
					$(this).wrap('<figure></figure>');
					var wrap = $('<figcaption class="caption">');
					wrap.append(alt);
					$(this).parent().append(wrap);
				}
			});
		});
	</script>
@endsection

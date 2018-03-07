@extends('site.main')

@section('css')
	<style>
		#finder h2 {
			margin-bottom: 5px;
		}

		#finder h2 span {
			font-size: 14px;
		}

		#finder p {
			text-align: justify;
			margin-bottom: 10px;
		}

		#finder .col-md-2 {
			text-align: center;
		}

		#finder img {
			height: 150px;
		}

		#finder .read-more {
			float: right;
		}

		#finder .row {
			margin-bottom: 30px;
		}
	</style>
@endsection

@section('main')

	<h1>Search: <span>{{ request('q') }}</span></h1>

	<div class="container" id="finder">
		@foreach($res as $r)
			<div class="row">
				<div class="col-md-2">
					<a href="{{ route('produto_exibicao', [$r->slug]) }}">
						<img src="{{ asset('uploads/products') . '/' . $r->id . '/' . $r->id . '_sm.png' }}" alt="">
					</a>
				</div>
				<div class="col-md-10">
					<a href="{{ route('produto_exibicao', [$r->slug]) }}">
						<h2>{{ $r->name }} <span>{{ $r->presentation }}</span></h2>
					</a>
					<p>
						{{ str_limit($r->description, 300, '...') }}
						<a href="{{ route('produto_exibicao', [$r->slug]) }}">
							Read More
							<i class="fas fa-angle-right"></i>
						</a>
					</p>
				</div>
			</div>
		@endforeach
	</div>

@endsection
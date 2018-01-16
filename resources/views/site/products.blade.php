@extends('site.main')

@section('css')
	<style>

		#search-col {
			font-size: 14px;
		}

		.panel {
			border: none;
		}

		.panel-body ul {
			margin: 0;
			padding: 0;
			list-style: none;
		}

		.panel-body ul li label {
			display: block;
			font-weight: normal;
			margin: 0;
		}

		.panel-body ul li label:hover {
			background: #f1f1f1;
			cursor: pointer;
		}

		.item-normal {
			color: #636b6f;
		}

		.item-marcado {
			background: #f1f1f1;
		}

		#products-grid ul {
			list-style: none;
		}

		#products-grid li {
			width: 25%;
			float: left;
		}

		#products-grid .panel {
			text-align: center;
			margin: 10px;
			transition: all 0.2s ease;
			box-shadow: 0 0 1px #ccc;
		}

		#products-grid .panel:hover {
			box-shadow: 0 0 50px #d1d1d1;
		}

		#products-grid .panel-header {
			padding-top: 10px;
		}

		#products-grid img {
			height: 150px;
		}

		h4 {
			font-size: 14px;
		}

		.panel-heading {
			border: none;
		}
	</style>
@endsection

@section('main')
	<div class="container">

		<h1>All Products</h1>

		<div class="row">
			<div class="col-md-3" id="search-col">

				{{-- Search: --}}
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search for...">
					<span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fas fa-search"></i></button>
                    </span>
				</div>

				<br>

				{{-- Lines: --}}
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Lines</h3>
					</div>
					<div class="panel-body">
						<ul>
							@foreach($lines as $line)
								<li>
									<label class="item-normal">
										<input type="checkbox" data-item="lines" data-id="{{ $line->id }}">
										{{ $line->name }}
									</label>
								</li>
							@endforeach
						</ul>
					</div>
				</div>

				{{-- Types: --}}
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Types</h3>
					</div>
					<div class="panel-body">
						<ul>
							@foreach($types as $type)
								<li>
									<label class="item-normal">
										<input type="checkbox" data-item="types" data-id="{{ $type->id }}">
										{{ $type->name }}
									</label>
								</li>
							@endforeach
						</ul>
					</div>
				</div>

				{{-- Categories: --}}
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Categories</h3>
					</div>
					<div class="panel-body">
						<ul>
							@foreach($categories as $category)
								<li>
									<label class="item-normal">
										<input type="checkbox" data-item="categories" data-id="{{ $category->id }}">
										{{ $category->name }}
									</label>
								</li>
							@endforeach
						</ul>
					</div>
				</div>

				{{-- Goals: --}}
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Goals</h3>
					</div>
					<div class="panel-body">
						<ul>
							@foreach($goals as $goal)
								<li>
									<label class="item-normal">
										<input type="checkbox" data-item="goals" data-id="{{ $goal->id }}">
										{{ $goal->name }}
									</label>
								</li>
							@endforeach
						</ul>
					</div>
				</div>

				{{-- Flavors: --}}
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Flavors</h3>
					</div>
					<div class="panel-body">
						<ul>
							@foreach($flavors as $flavor)
								<li>
									<label class="item-normal">
										<input type="checkbox" data-item="flavors" data-id="{{ $flavor->id }}">
										{{ $flavor->name }}
									</label>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9" id="products-grid">
				<ul>
					@foreach($products as $product)
						<li
							data-line="{{ $product->line_id }}"
							data-type="{{ $product->type_id }}"
							data-category="{{ $product->categories()->select('id')->get()->implode('id', ',') }}"
							data-goal="{{ $product->goals()->select('id')->get()->implode('id', ',') }}"
							data-flavor="{{ $product->flavor_id }}"
						>
							<article>
								<div class="panel panel-default">
									<div class="panel-header">
										<a href="#">
											{{--<img src="{{ asset('uploads/products') . '/' . $product->id . '/' . $product->image }}" alt="">--}}
										</a>
									</div>
									<div class="panel-body">
										<h4>{{ $product->name . ' ' . $product->last_name }}</h4>
										@if(!empty($product->flavor))
											<span class="cor" style="color: {{ $product->flavor->color }}">{{ $product->flavor->name }}</span>
										@endif
										<div>{!! $product->shopify !!}</div>
									</div>
								</div>
							</article>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script>

		$(function () {

			var lines = [];
			var types = [];
			var categories = [];
			var goals = [];
			var flavors = [];
			var itens = [];
			var n = 0;

			$('#search-col :checkbox').on('click', function (event) {

				event.stopPropagation();

				$(this).parent().toggleClass('item-normal item-marcado');

				let checkboxes = $('#search-col :checkbox');

				checkboxes.each(function (index, element) {

					if (element.checked == true) {

						let id = element.dataset.id;
						let item = element.dataset.item;

						eval(item + '.push(' + id + ')');

						itens.push(item);
					}
				});

				lines = Array.from(new Set(lines));
				types = Array.from(new Set(types));
				categories = Array.from(new Set(categories));
				goals = Array.from(new Set(goals));
				flavors = Array.from(new Set(flavors));
				itens = Array.from(new Set(itens));

				let products = $('#products-grid li');
				products.each(function (index, element) {

					let _lines = parseInt(element.dataset.line);
					let _types = parseInt(element.dataset.type);
					let _categories = parseInt(element.dataset.category);
					let _goals = parseInt(element.dataset.goal);
					let _flavors = parseInt(element.dataset.flavor);

					// console.log(itens);

					itens.forEach(function (e) {

						if (eval(e + '.includes(_' + e + ')')) {
							n++;
						}
					});

					// console.log(itens.length);
					// console.log(n);

					// if (lines.includes(line) && types.includes(type) && categories.includes(category) && goals.includes(goal) && flavors.includes(flavor)) {

					if (itens.length == n) {
						element.style.display = 'block';
					} else {
						element.style.display = 'none';
					}

					n = 0;
				});

				lines = [];
				types = [];
				categories = [];
				goals = [];
				flavors = [];
				itens = [];

			});
		});

	</script>
@endsection
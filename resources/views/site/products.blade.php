@extends('site.main')

@section('css')
	<style>

		h1 span {
			font-size: 20px;
			font-weight: normal;
			letter-spacing: 1px;
		}

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

		#search-col label {
			display: block;
			font-weight: normal;
			margin: 0;
		}

		#search-col label:hover {
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

		<h1>Products <span id="sub-title"></span></h1>

		<div class="row">
			<div class="col-md-3" id="search-col">

				{{-- Search: --}}
				<input type="text" id="search-product" class="form-control" placeholder="Search for...">
				<br>

				<p>
					<label>
						<input type="checkbox" data-item="offers" data-id="1"> Sales & Promotions
					</label>
				</p>

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
				<div class="alert alert-warning text-center" style="display: none">No items found with these search parameters.</div>
				<ul>
					@foreach($products as $product)
						<li
							data-line="{{ $product->line_id }}"
							data-type="{{ $product->type_id }}"
							data-category="{{ $product->categories()->select('category_id')->get()->implode('category_id', ',') }}"
							data-goal="{{ $product->goals()->select('goal_id')->get()->implode('goal_id', ',') }}"
							data-flavor="{{ $product->flavor_id }}"
							data-offer="{{ $product->offer }}"
						>
							<article>
								<div class="panel panel-default">
									<div class="panel-header">
										<a href="#">
											<img src="{{ asset('uploads/products') . '/' . $product->id . '/' . $product->image }}" alt="">
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
			var titles = ' | ';
			var offers = [];
			var n = 0;
			var none = 0;
			var checkboxes = $('#search-col :checkbox');

			$('#search-col :checkbox').on('click', function (event) {

				event.stopPropagation();

				$(this).parent().toggleClass('item-normal item-marcado');

				checkboxes.each(function (index, element) {

					if (element.checked == true) {

						let id = element.dataset.id;
						let item = element.dataset.item;
						let title = this.parentNode.innerText;

						eval(item + '.push(' + id + ')');

						titles += title.trim() + ' • ';
						itens.push(item);
					}
				});

				lines = Array.from(new Set(lines));
				types = Array.from(new Set(types));
				categories = Array.from(new Set(categories));
				goals = Array.from(new Set(goals));
				flavors = Array.from(new Set(flavors));
				offers = Array.from(new Set(offers));
				itens = Array.from(new Set(itens));

				$('#sub-title').text(titles.slice(0, -3));

				let products = $('#products-grid li');

				products.each(function (index, element) {

					let _lines = parseInt(element.dataset.line);
					let _types = parseInt(element.dataset.type);
					let _categories = JSON.parse('[' + element.dataset.category + ']');
					let _goals = parseInt(element.dataset.goal);
					let _flavors = parseInt(element.dataset.flavor);
					let _offers = parseInt(element.dataset.offer);

					itens.forEach(function (e) {

						let typeOfVar = eval('typeof _' + e);

						switch (typeOfVar) {

							case 'number':
								if (eval(e + '.includes(_' + e + ')')) {
									n++;
								}
								break;

							case 'object':

								let array1 = eval('_' + e);
								let array2 = eval(e);

								array2.forEach(function (value, index) {

									if (array1.includes(value)) {
										n++;
									}
								});
								break;
						}
					});

					if (n >= itens.length) {
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
				titles = ' | ';
				none = 0;

				$('html, body').animate({scrollTop: 0}, 500);

				products.each(function (index, element) {
					if (element.style.display == 'none') {
						none++;
					}
				});

				if (products.length == none) {
					$('#products-grid .alert').show();
				} else {
					$('#products-grid .alert').hide();
				}

			});

			$('#search-product').keyup(function () {

				checkboxes.each(function (index, element) {
					element.checked = false;
					element.parentNode.classList.remove('item-marcado');
					element.parentNode.classList.add('item-normal');
				});

				var mySearch = $(this).val();

				if (mySearch) {

					$('#products-grid li').each(function () {

						let myText = $(this).find('h4').text().toLowerCase();
						let mySearchText = myText.search(mySearch);

						if (mySearchText >= 0) {
							$(this).show();
						} else {
							$(this).hide();
						}
					});
				} else {
					$('#products-grid li').each(function () {
						$(this).show();
					});
				}
			});

			@if(isset($item))
			checkboxes.each(function (index, element) {

				let id = element.dataset.id;
				let item = element.dataset.item;
				let title = this.parentNode.innerText;

				if (item == '{{ $item }}' && id == '{{ $id }}') {
					element.click();
				}

				$('#sub-title').text(title);
			});
			@endif

		});
	</script>
@endsection
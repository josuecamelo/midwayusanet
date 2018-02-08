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
			height: 336px;
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
	<div class="container-fluid">

		<h1>Products <span id="sub-title"></span></h1>

		<div class="row">
			<div class="col-md-3" id="search-col">

				{{-- Search: --}}
				<input type="text" id="search-product" class="form-control" placeholder="Search for...">
				<br>

				<p>
					<label>
						<input type="checkbox" data-item="offers" data-slug="offers"> Sales & Promotions
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
										<input type="checkbox" data-item="lines" data-slug="{{ $line->slug }}">
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
										<input type="checkbox" data-item="types" data-slug="{{ $type->slug }}">
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
								@if($goal->products()->count() > 0)
									<li>
										<label class="item-normal">
											<input type="checkbox" data-item="goals" data-slug="{{ $goal->slug }}">
											{{ $goal->name }}
										</label>
									</li>
								@endif
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
								{{--@if($category->products()->count() > 0)--}}
									<li>
										<label class="item-normal">
											<input type="checkbox" data-item="categories" data-slug="{{ $category->slug }}">
											{{ $category->name }} ({{  $category->products()->count() }} item(s))
										</label>
									</li>
								{{--@endif--}}
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
								@if($flavor->relatedProducts()->count() > 0)
									<li>
										<label class="item-normal">
											<input type="checkbox" data-item="flavors" data-slug="{{ $flavor->slug }}">
											{{ $flavor->name }}
										</label>
									</li>
								@endif
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
							data-line="{{ $product->line->slug }}"
							data-type="{{ $product->type->slug }}"
							data-category="{{ $product->productCategories()->select('slug')->get()->implode('slug', ',') }}"
							data-goal="{{ $product->productGoals()->select('slug')->get()->implode('slug', ',') }}"
							data-flavor="@if($product->flavor_id){{ $product->flavor->slug }}@endif"
							data-offer="{{ ($product->offer) ? 'offers' : 'all' }}"
						>
							<article>
								<div class="panel panel-default">
									<div class="panel-header">
										<a href="{{ $product->url_visualizacao  }}">
											<img src="{{ asset('uploads/products') . '/' . $product->id . '/' . $product->image }}" alt="">
										</a>
									</div>
									<div class="panel-body">
										<h4>
											{{ $product->name . ' ' . $product->last_name }}
											@if(!empty($product->flavor))
												<span class="cor" style="color: {{ $product->flavor->color }}">{{ $product->flavor->name }}</span>
											@endif
										</h4>
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

			/* Ao clicar em algum item */

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

						let slug = element.dataset.slug;
						let item = element.dataset.item;
						let title = this.parentNode.innerText;

						// Adiciona os itens individuais marcados:
						eval(item + '.push("' + slug + '")');

						titles += title.trim() + ' • ';

						// Tipos de itens marcados: lines, types, goals, etc.
						itens.push(item);
					}
				});

				// Itens individuais marcados:
				offers = Array.from(new Set(offers));
				lines = Array.from(new Set(lines));
				types = Array.from(new Set(types));
				categories = Array.from(new Set(categories));
				goals = Array.from(new Set(goals));
				flavors = Array.from(new Set(flavors));
				itens = Array.from(new Set(itens));

				$('#sub-title').text(titles.slice(0, -3));

				// products: Todos os produtos do lado direito
				let products = $('#products-grid li');

				products.each(function (index, element) {

					// Características de cada produto do lado direito:
					let _offers = element.dataset.offer;
					let _lines = element.dataset.line;
					let _types = element.dataset.type;
					let _categories = element.dataset.category;
					let _goals = element.dataset.goal;
					let _flavors = element.dataset.flavor;

					// Percorre os itens marcados:
					itens.forEach(function (e) {

						// Se nas características de cada produto possui algum dos itens individuais marcados:
						if (eval('_' + e + '.includes(' + e + ')')) {
							n++;
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


			/* Marcar itens ao carregar a página: */

			var pathname = window.location.pathname;
			var parts = pathname.split('/');
			parts.splice(0, 2);

			function check(item, element) {

				let checkboxes = document.querySelectorAll('input[data-item="' + item + '"]');
				checkboxes.forEach(function (e) {

					if (e.dataset.slug == element) {
						e.click();
					}
				});
			}

			parts.forEach(function (element, index) {

				switch (index) {
					case 0:
						check('offers', element);
						break;
					case 1:
						check('lines', element);
						break;
					case 2:
						check('types', element);
						break;
					case 3:
						check('goals', element);
						break;
					case 4:
						check('categories', element);
						break;
					case 5:
						check('flavors', element);
						break;
				}
			});

		});
	</script>
@endsection
@extends('admin.main')

@section('css')
	<style>

		button i {
			margin: 0;
		}

		.select-from, .select-to {
			width: 100%;
			border: none;
			padding: 10px;
		}

		.bt-action-right {
			padding-left: 2px !important;
			position: absolute;
			right: -40px;
			font-size: 16px;
		}

		.bt-action-left {
			padding-left: 0 !important;
			position: absolute;
			left: -40px;
			font-size: 16px;
		}

	</style>
@endsection

@section('main')

	@include('flash::message')

	<div class="bg-light lter b-b hidden-print">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-page" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ route('menus.listar') }}"><i class="fa fa-th" aria-hidden="true"></i> Menus</a>
				</div>
				<div class="collapse navbar-collapse" id="menu-page">
					<ul class="nav navbar-nav">
						<li><a href="{{ route('menus.listar', 1)  }}"><i class="fa fa-venus" aria-hidden="true"></i> Women's Products</a></li>
						<li><a href="{{ route('menus.listar', 2)  }}"><i class="fa fa-mars" aria-hidden="true"></i> Men's Products</a></li>
						<li><a href="{{ route('menus.listar', 3)  }}"><i class="fa fa-cubes" aria-hidden="true"></i> Shop All Products</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	{!! Form::model($menu, ['route'=> ['menus.atualizar', $menu->id]]) !!}
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4" id="popular-categories">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Popular Categories</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-5">
								<button type="button" class="btn btn-rounded btn btn-icon btn-default bt-action-right btn-add-categories" data-toggle="tooltip" data-placement="top" title="Adicionar item">
									<i class="fa fa-angle-double-right" aria-hidden="true"></i>
								</button>
								<div class="panel panel-default">
									<div class="panel-heading">All Categories</div>
									{!! Form::select('categories_list', $categories[0], null,['class'=>'select-from', 'multiple', 'size'=> count($categories[0])]) !!}
								</div>
							</div>
							<div class="col-md-5 col-md-offset-2">
								<button type="button" class="btn btn-rounded btn btn-icon btn-default bt-action-left btn-remove-categories" data-toggle="tooltip" data-placement="top" title="Remover item">
									<i class="fa fa-angle-double-left" aria-hidden="true"></i>
								</button>
								<div class="panel panel-default">
									<div class="panel-heading">Selected Categories</div>
									{!! Form::select('menu_categories', $categories[1], (!isset($relatedCategoriesList) ? null : $relatedCategoriesList),['class'=>'select-to', 'multiple', 'size'=>5]) !!}
								</div>
								<div class="text-center">
									<div class="btn-group">
										<button type="button" class="btn btn-sm btn-default btn-up-categories" data-toggle="tooltip" data-placement="top" title="Mover item para cima">
											<i class="fa fa-angle-double-up" aria-hidden="true"></i>
										</button>
										<button type="button" class="btn btn-sm btn-default btn-down-categories" data-toggle="tooltip" data-placement="top" title="Mover item para baixo">
											<i class="fa fa-angle-double-down" aria-hidden="true"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4" id="popular-products">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Popular Products</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-5">
								<button type="button" class="btn btn-rounded btn btn-icon btn-default bt-action-right btn-add-products" data-toggle="tooltip" data-placement="top" title="Adicionar item">
									<i class="fa fa-angle-double-right" aria-hidden="true"></i>
								</button>
								<div class="panel panel-default">
									<div class="panel-heading">All Products</div>
									{!! Form::select('products_list', $products[0], null,['class'=>'select-from', 'multiple', 'size'=> count($products[0])]) !!}
								</div>
							</div>
							<div class="col-md-5 col-md-offset-2">
								<button type="button" class="btn btn-rounded btn btn-icon btn-default bt-action-left btn-remove-products" data-toggle="tooltip" data-placement="top" title="Remover item">
									<i class="fa fa-angle-double-left" aria-hidden="true"></i>
								</button>
								<div class="panel panel-default">
									<div class="panel-heading">Selected Products</div>
									{!! Form::select('menu_products', $products[1], (!isset($relatedProductsList) ? null : $relatedProductsList),['class'=>'select-to', 'multiple', 'size'=> 5]) !!}
								</div>
								<div class="text-center">
									<div class="btn-group">
										<button type="button" class="btn btn-sm btn-default btn-up-products" data-toggle="tooltip" data-placement="top" title="Mover item para cima">
											<i class="fa fa-angle-double-up" aria-hidden="true"></i>
										</button>
										<button type="button" class="btn btn-sm btn-default btn-down-products" data-toggle="tooltip" data-placement="top" title="Mover item para baixo">
											<i class="fa fa-angle-double-down" aria-hidden="true"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4" id="featured">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Featured</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-5">
								<button type="button" class="btn btn-rounded btn btn-icon btn-default bt-action-right btn-add-product" data-toggle="tooltip" data-placement="top" title="Adicionar item">
									<i class="fa fa-angle-double-right" aria-hidden="true"></i>
								</button>
								<div class="panel panel-default">
									<div class="panel-heading">All Products</div>
									{!! Form::select('products_list', $products[2], null,['class'=>'select-from', 'multiple', 'size'=> count($products[2])]) !!}
								</div>
							</div>
							<div class="col-md-5 col-md-offset-2">
								<button type="button" class="btn btn-rounded btn btn-icon btn-default bt-action-left btn-remove-product" data-toggle="tooltip" data-placement="top" title="Remover item">
									<i class="fa fa-angle-double-left" aria-hidden="true"></i>
								</button>
								<div class="panel panel-default">
									<div class="panel-heading">Selected Products</div>
									{!! Form::select('featured_product_id', $products[3], isset($products[3][0]) ? $products[3][0]->id : null,['class'=>'select-to', 'multiple', 'size'=>5]) !!}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-md-offset-5">
				<button type="submit" class="btn btn-success btn-block"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
			</div>
		</div>
	</div>

	{!! Form::close() !!}

@endsection

@section('js')
	<script>

		$(function () {

			$('[data-toggle="tooltip"]').tooltip({
				container: 'body'
			});


			/* Add Event Listener: */


			// Categories:

			$('.btn-add-categories').on('click', function () {
				addItens($(this), 5);
				//ver uma forma de ao adicionar os items seleciona-los em $('select[name="menu_categories"]
				console.log( $('select[name="menu_categories"]').val() ) ;
			});
			$('.btn-remove-categories').on('click', function () {
				removeItens($(this));
			});
			$('.btn-up-categories').on('click', function () {
				moveUp($(this));
			});
			$('.btn-down-categories').on('click', function () {
				moveDown($(this));
			});


			// Products:

			$('.btn-add-products').on('click', function () {
				addItens($(this), 5);
			});
			$('.btn-remove-products').on('click', function () {
				removeItens($(this));
			});
			$('.btn-up-products').on('click', function () {
				moveUp($(this));
			});
			$('.btn-down-products').on('click', function () {
				moveDown($(this));
			});


			// Product:

			$('.btn-add-product').on('click', function () {
				addItens($(this), 1);
			});
			$('.btn-remove-product').on('click', function () {
				removeItens($(this));
			});


			/* Add Itens: */

			function addItens(i, n) {

				let selectTo = i.parent().siblings('div').find('select');
				let lengthSelectTo = selectTo.find('option').length;
				let textItem = n == 1 ? ' item' : ' itens';

				let item = i.siblings('div').find('select').find(':selected');
				let lengthSelectFrom = item.length;

				if (lengthSelectFrom + lengthSelectTo <= n) {
					item.each(function () {
						$(this).clone().appendTo(selectTo);
						$(this).remove();
					});
				} else {
					alert('Você pode escolher apenas ' + n + textItem + '.');
				}

				let allOptions = i.parent().siblings('div').find('select').find('option');

				selectAll(allOptions);
			}


			/* Remove itens: */

			function removeItens(i) {

				let item = i.siblings('div').find('select').find(':selected');
				let selectFrom = i.parent().siblings('div').find('select');

				item.clone().appendTo(selectFrom);
				item.remove();

				let allOptions = i.siblings('div').find('select').find('option');

				selectAll(allOptions);
			}


			/* Select All: */

			function selectAll(allOptions) {

				allOptions.each(function () {
					$(this).attr('selected', true);
				});
			}


			/* Move Up: */

			function moveUp(i) {

				let selectTo = i.parent().parent().siblings('div').find('select');
				let select = selectTo.find(':selected');

				select.each(function () {

					let newPos = $(this).index() - 1;

					if (newPos > -1) {
						selectTo.find('option').eq(newPos).before("<option value='" + $(this).val() + "' selected='selected'>" + $(this).text() + "</option>");
						$(this).remove();
					}
				});

				let allOptions = i.parent().parent().siblings('div').find('select').find('option');

				selectAll(allOptions);
			}


			/* Move Down: */

			function moveDown(i) {

				let selectTo = i.parent().parent().siblings('div').find('select');
				let select = selectTo.find(':selected');
				let lenghtSelect = select.length;

				select.each(function () {

					let lengthOptions = selectTo.find('option').length;
					let newPos = $(this).index() + lenghtSelect;

					if (newPos < lengthOptions) {
						selectTo.find('option').eq(newPos).after("<option value='" + $(this).val() + "' selected='selected'>" + $(this).text() + "</option>");
						$(this).remove();
					}
				});

				let allOptions = i.parent().parent().siblings('div').find('select').find('option');

				selectAll(allOptions);
			}
		});
	</script>
@endsection
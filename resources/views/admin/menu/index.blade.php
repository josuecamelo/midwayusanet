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
						<li><a href="#"><i class="fa fa-venus" aria-hidden="true"></i> Women's Products</a></li>
						<li><a href="#"><i class="fa fa-mars" aria-hidden="true"></i> Men's Products</a></li>
						<li><a href="#"><i class="fa fa-cubes" aria-hidden="true"></i> Shop All Products</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<form>

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
										<div class="panel-heading">All Products</div>
										<select name="selectfrom" class="select-from" multiple size="4">
											<option value="1">Item 1</option>
											<option value="2">Item 2</option>
											<option value="3">Item 3</option>
											<option value="4">Item 4</option>
										</select>
									</div>
								</div>
								<div class="col-md-5 col-md-offset-2">
									<button type="button" class="btn btn-rounded btn btn-icon btn-default bt-action-left btn-remove-categories" data-toggle="tooltip" data-placement="top" title="Remover item">
										<i class="fa fa-angle-double-left" aria-hidden="true"></i>
									</button>
									<div class="panel panel-default">
										<div class="panel-heading">Selected Products</div>
										<select name="selectto" class="select-to" multiple size="5">
											<option value="5">Item 5</option>
											<option value="6">Item 6</option>
											<option value="7">Item 7</option>
										</select>
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
										<select name="selectfrom" class="select-from" multiple size="5">
											<option value="1">Item 1</option>
											<option value="2">Item 2</option>
											<option value="3">Item 3</option>
											<option value="4">Item 4</option>
										</select>
									</div>
								</div>
								<div class="col-md-5 col-md-offset-2">
									<button type="button" class="btn btn-rounded btn btn-icon btn-default bt-action-left btn-remove-products" data-toggle="tooltip" data-placement="top" title="Remover item">
										<i class="fa fa-angle-double-left" aria-hidden="true"></i>
									</button>
									<div class="panel panel-default">
										<div class="panel-heading">Selected Products</div>
										<select name="selectto" class="select-to" multiple size="5">
											<option value="5">Item 5</option>
											<option value="6">Item 6</option>
											<option value="7">Item 7</option>
										</select>
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
										<select name="selectfrom" class="select-from" multiple size="5">
											<option value="1">Item 1</option>
											<option value="2">Item 2</option>
											<option value="3">Item 3</option>
											<option value="4">Item 4</option>
										</select>
									</div>
								</div>
								<div class="col-md-5 col-md-offset-2">
									<button type="button" class="btn btn-rounded btn btn-icon btn-default bt-action-left btn-remove-product" data-toggle="tooltip" data-placement="top" title="Remover item">
										<i class="fa fa-angle-double-left" aria-hidden="true"></i>
									</button>
									<div class="panel panel-default">
										<div class="panel-heading">Selected Products</div>
										<select name="selectto" class="select-to" multiple size="5">
											<option value="5">Item 5</option>
										</select>
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

	</form>

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

				let selectFrom = i.siblings('div').find('select');
				let lengthSelectFromFinal = selectFrom.find('option').length;
				selectFrom.attr('size', lengthSelectFromFinal);
			}


			/* Remove itens: */

			function removeItens(i) {

				let item = i.siblings('div').find('select').find(':selected');
				let selectFrom = i.parent().siblings('div').find('select');

				item.clone().appendTo(selectFrom);
				item.remove();

				let lengthSelectFrom = selectFrom.find('option').length;
				selectFrom.attr('size', lengthSelectFrom);
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
			}
		});
	</script>
@endsection
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
			<div class="col-md-4" id="popular-categories">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Popular Categories</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-5">
								<button type="button" class="btn btn-rounded btn btn-icon btn-default bt-action-right btn-add" data-toggle="tooltip" data-placement="top" title="Adicionar item">
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
								<button type="button" class="btn btn-rounded btn btn-icon btn-default bt-action-left btn-remove" data-toggle="tooltip" data-placement="top" title="Remover item">
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
										<button type="button" class="btn btn-sm btn-default btn-up" data-toggle="tooltip" data-placement="top" title="Mover item para cima">
											<i class="fa fa-angle-double-up" aria-hidden="true"></i>
										</button>
										<button type="button" class="btn btn-sm btn-default btn-down" data-toggle="tooltip" data-placement="top" title="Mover item para baixo">
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
								<button type="button" class="btn btn-rounded btn btn-icon btn-default bt-action-right btn-add" data-toggle="tooltip" data-placement="top" title="Adicionar item">
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
								<button type="button" class="btn btn-rounded btn btn-icon btn-default bt-action-left btn-remove" data-toggle="tooltip" data-placement="top" title="Remover item">
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
										<button type="button" class="btn btn-sm btn-default btn-up" data-toggle="tooltip" data-placement="top" title="Mover item para cima">
											<i class="fa fa-angle-double-up" aria-hidden="true"></i>
										</button>
										<button type="button" class="btn btn-sm btn-default btn-down" data-toggle="tooltip" data-placement="top" title="Mover item para baixo">
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
								<button type="button" class="btn btn-rounded btn btn-icon btn-default bt-action-right btn-add" data-toggle="tooltip" data-placement="top" title="Adicionar item">
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
								<button type="button" class="btn btn-rounded btn btn-icon btn-default bt-action-left btn-remove" data-toggle="tooltip" data-placement="top" title="Remover item">
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
										<button type="button" class="btn btn-sm btn-default btn-up" data-toggle="tooltip" data-placement="top" title="Mover item para cima">
											<i class="fa fa-angle-double-up" aria-hidden="true"></i>
										</button>
										<button type="button" class="btn btn-sm btn-default btn-down" data-toggle="tooltip" data-placement="top" title="Mover item para baixo">
											<i class="fa fa-angle-double-down" aria-hidden="true"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
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

			$('.btn-add').click(function () {
				$('.select-from option:selected').each(function () {
					$('.select-to').append("<option value='" + $(this).val() + "'>" + $(this).text() + "</option>");
					$(this).remove();
				});
			});
			$('.btn-remove').click(function () {
				$('.select-to option:selected').each(function () {
					$('.select-from').append("<option value='" + $(this).val() + "'>" + $(this).text() + "</option>");
					$(this).remove();
				});
			});

			$('.btn-up').on('click', function () {
				$('.select-to option:selected').each(function () {
					var newPos = $('.select-to option').index(this) - 1;
					if (newPos > -1) {
						$('.select-to option').eq(newPos).before("<option value='" + $(this).val() + "' selected='selected'>" + $(this).text() + "</option>");
						$(this).remove();
					}
				});
			});

			$('.btn-down').on('click', function () {
				var countOptions = $('.select-to option').length;
				$('.select-to option:selected').each(function () {
					var newPos = $('.select-to option').index(this) + 1;
					if (newPos < countOptions) {
						$('.select-to option').eq(newPos).after("<option value='" + $(this).val() + "' selected='selected'>" + $(this).text() + "</option>");
						$(this).remove();
					}
				});
			});
		});
	</script>
@endsection
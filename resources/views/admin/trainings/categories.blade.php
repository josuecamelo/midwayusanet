@extends('admin.main')

@section('main')

	<div class="bg-light lter b-b wrapper-md hidden-print">
		<h1 class="m-n font-thin h3"><i class="fa fa-asterisk" aria-hidden="true"></i> Categorias</h1>
	</div>

	<form action="" method="post">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-11">
					<div class="form-group">
						<label for="nome">Nome *</label>
						<input type="text" name="nome" id="nome" class="form-control" autofocus required>
					</div>
				</div>
				<div class="col-md-1">
					<div class="form-group">
						<label>&nbsp;</label>
						<button type="submit" class="btn btn-block btn-success"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
					</div>
				</div>
			</div>
		</div>
	</form>

	<div class="container-fluid">
		<table class="table table-striped table-responsive table-hover">
			<thead>
			<tr>
				<th>Nome</th>
				<th>Editar</th>
				<th>Deletar</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>About</td>
				<td><a href="#" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></td>
				<td><a href="#" class="btn btn-xs btn-danger bt-delete"><i class="fa fa-times" aria-hidden="true"></i> Deletar</a></td>
			</tr>
			<tr>
				<td>Contato</td>
				<td><a href="#" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></td>
				<td><a href="#" class="btn btn-xs btn-danger bt-delete"><i class="fa fa-times" aria-hidden="true"></i> Deletar</a></td>
			</tr>
			<tr>
				<td>Athletes</td>
				<td><a href="#" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></td>
				<td><a href="#" class="btn btn-xs btn-danger bt-delete"><i class="fa fa-times" aria-hidden="true"></i> Deletar</a></td>
			</tr>
			</tbody>
		</table>
	</div>

@endsection
@extends('admin.main')

@section('css')
	<style>
		.cor {
			width: 15px;
			height: 15px;
			border-radius: 100%;
		}
	</style>
@endsection

@section('main')

	@include('admin.products.flavors._nav')

	<div class="container-fluid">
		<table class="table table-striped table-responsive table-hover">
			<thead>
			<tr>
				<th width="10"></th>
				<th>Nome</th>
				<th>Editar</th>
				<th>Deletar</th>
			</tr>
			</thead>
			<tbody>
			@foreach($flavors as $flavor)
				<tr>
					<td><div class="cor" style="background-color: {{ $flavor->color  }}"></div></td>
					<td>{{ $flavor->name  }}</td>
					<td><a href="{{ route('sabores.editar', ['id'=> $flavor->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></td>
					<td><a href="{{ route('sabores.remover', ['id'=> $flavor->id]) }}" class="btn btn-xs btn-danger bt-delete"><i class="fa fa-times" aria-hidden="true"></i> Deletar</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{!! $flavors->render() !!}
	</div>

@endsection
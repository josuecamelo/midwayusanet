@extends('admin.main')

@section('main')

	@include('admin.products.types._nav')

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
			@foreach($types as $type)
				<tr>
					<td>{{ $type->name  }}</td>
					<td><a href="{{ route('tipos.editar', ['id'=> $type->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></td>
					<td><a href="{{ route('tipos.remover', ['id'=> $type->id]) }}" class="btn btn-xs btn-danger bt-delete"><i class="fa fa-times" aria-hidden="true"></i> Deletar</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{!! $types->render() !!}
	</div>

@endsection
@extends('admin.main')

@section('main')

	@include('admin.stores._nav')

	<div class="container-fluid">
		<table class="table table-striped table-responsive table-hover">
			<thead>
			<tr>
				<th>Nome</th>
				<th>Endereço</th>
				<th>Cidade</th>
				<th>UF</th>
				<th>Editar</th>
				<th>Deletar</th>
			</tr>
			</thead>
			<tbody>
			@foreach($stores as $store)
				<tr>
					<td>{{ $store->other_name }}</td>
					<td>{{ $store->address . ' ' . $store->district }}</td>
					<td>{{ $store->city }}</td>
					<td>{{ $store->state }}</td>
					<td><a href="{{ route('lojas.editar', ['id'=> $store->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></td>
					<td><a href="{{ route('lojas.remover', ['id'=> $store->id]) }}" class="btn btn-xs btn-danger bt-delete"><i class="fa fa-times" aria-hidden="true"></i> Deletar</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{!! $stores->render() !!}
	</div>

@endsection
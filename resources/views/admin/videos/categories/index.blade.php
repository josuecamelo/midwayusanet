@extends('admin.main')

@section('main')

	@include('admin.trainings.categories._nav')

	@if(count($categories))
		<div class="container-fluid">
			<table class="table table-striped table-responsive table-hover">
				<thead>
				<tr>
					<th>Categoria</th>
					<th>Editar</th>
					<th>Deletar</th>
				</tr>
				</thead>
				<tbody>
				@foreach($categories as $category)
					<tr>
						<td>{{ $category->name }}</td>
						<td><a href="{{ route('treinos.categorias.editar', ['id'=> $category->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></td>
						<td><a href="{{ route('treinos.categorias.remover', ['id'=> $category->id]) }}" class="btn btn-xs btn-danger bt-delete"><i class="fa fa-times" aria-hidden="true"></i> Deletar</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
			{!! $categories->render() !!}
		</div>
	@else
		<p class="text-center">Nenhum item cadastrado.</p>
	@endif

@endsection
@extends('admin.main')
@section('main')
	@if($t == 1)
		@include('admin.blog.posts._nav_news')
	@else
		@include('admin.blog.posts._nav_science')
	@endif

	<div class="container-fluid">
		<table class="table table-striped table-responsive table-hover">
			<thead>
			<tr>
				<th width="10">#</th>
				<th>Titulo</th>
				<th>Categoria</th>
				<th>Usuário</th>
				<th>Editar</th>
				<th>Deletar</th>
			</tr>
			</thead>
			<tbody>
			@foreach($posts as $post)
				<tr>
					<td>{{$post->id}}</td>
					<td>{{ $post->title  }}</td>
					<td>{{ $post->category->name  }}</td>
					<td>{{ $post->user->name  }}</td>
					<td><a href="{{ route('posts.edit', ['id'=> $post->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a></td>
					<td><a href="{{ route('posts.destroy', ['id'=> $post->id]) }}" class="btn btn-xs btn-danger bt-delete"><i class="fa fa-times" aria-hidden="true"></i> Deletar</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{!! $posts->render() !!}
	</div>

@endsection
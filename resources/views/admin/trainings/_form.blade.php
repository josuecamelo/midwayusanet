<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="titulo">Título *</label>
				{!! Form::text('title', null, ['class'=>'form-control', 'id'=>'titulo', 'autofocus', 'required']) !!}
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="categoria">Categoria *</label>
				{!! Form::select('category_id', $categories, null, ['class'=>'form-control', 'id'=>'categoria', 'required']) !!}
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="video">Vídeo *
					<small>(Link do vídeo no Youtube)</small>
				</label>
				{!! Form::text('video', null, ['class'=>'form-control', 'id'=>'video', 'required']) !!}
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<label>&nbsp;</label>
				<button type="submit" class="btn btn-block btn-success"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="descricao">Descrição</label>
				{!! Form::textarea('description', null, ['class'=>'form-control', 'id'=>'descricao']) !!}
			</div>
		</div>
	</div>
</div>
<p class="text-center">
	<small>* Os campos marcados com asterisco (*) são de preenchimentos obrigatórios.</small>
</p>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10">
			<div class="form-group">
				<label for="name">Nome *</label>
				{!! Form::text('name', null, ['class'=>'form-control', 'autofocus', 'required']) !!}
			</div>
		</div>
		<div class="col-md-1">
			<div class="form-group">
				<label for="color">Tipo *</label>
				{!! Form::select('type_id', $types, null, ['class'=>'form-control', 'required']) !!}
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
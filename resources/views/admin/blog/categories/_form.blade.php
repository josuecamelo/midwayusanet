<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
			<div class="form-group">
				<label for="name">Name *</label>
				{!! Form::text('name', null, ['class'=>'form-control', 'autofocus', 'required']) !!}
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="type">Type *</label>
				{!! Form::select('type', $types,null, ['id'=>'type', 'class'=>'form-control', 'required']) !!}
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<label>&nbsp;</label>
				<button type="submit" class="btn btn-block btn-success"><i class="fa fa-check" aria-hidden="true"></i> Save</button>
			</div>
		</div>
	</div>
</div>
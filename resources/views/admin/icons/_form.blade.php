<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="name">Name *</label>
				{!! Form::text('name', null, ['class'=>'form-control', 'id'=>'name', 'autofocus', 'required']) !!}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="icon">Icon *</label>
				<input type="file" name="url" id="icon" class="form-control upload-img" data-responsive="true" data-url="@if(isset($icon->url)){{ asset('uploads/icons') . '/' . $icon->url }}@endif">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 col-md-offset-5">
			<button type="submit" class="btn btn-success btn-block"><i class="fa fa-check" aria-hidden="true"></i> Save</button>
		</div>
	</div>
</div>
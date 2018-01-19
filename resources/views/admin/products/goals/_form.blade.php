<div class="col-md-2">
	<div class="form-group">
		<label for="name">Name *</label>
		{!! Form::text('name', null, ['class'=>'form-control', 'autofocus', 'required']) !!}
	</div>
</div>
<div class="col-md-5">
	<div class="form-group">
		<label for="description">Description</label>
		{!! Form::text('description', null, ['class'=>'form-control']) !!}
	</div>
</div>
<div class="col-md-2">
	<div class="form-group">
		<label for="logo">Logo</label>
		<input type="file" name="logo" id="logo" class="form-control upload-img" data-responsive="true" data-url="@if(isset($goal->logo)){{ asset('uploads/goals') . '/' . $goal->id . '/' . $goal->logo }}@endif">
	</div>
</div>
<div class="col-md-2">
	<div class="form-group">
		<label for="banner">Banner</label>
		<input type="file" name="banner" id="banner" class="form-control upload-img" data-responsive="true" data-url="@if(isset($goal->banner)){{ asset('uploads/goals') . '/' . $goal->id . '/' . $goal->banner }}@endif">
	</div>
</div>
<div class="col-md-1">
	<div class="form-group">
		<label>&nbsp;</label>
		<button type="submit" class="btn btn-block btn-success"><i class="fa fa-check" aria-hidden="true"></i> Save</button>
	</div>
</div>
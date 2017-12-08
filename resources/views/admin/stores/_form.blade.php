<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="name">Razão Social *</label>
				{!! Form::text('name', null, ['class'=>'form-control', 'id'=>'name', 'autofocus', 'required']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="other_name">Fantasia *</label>
				{!! Form::text('other_name', null, ['class'=>'form-control', 'id'=>'other_name', 'required']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="zip">CEP</label>
				{!! Form::text('zip', null, ['class'=>'form-control', 'id'=>'zip', 'required']) !!}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="address">Endereço *</label>
				{!! Form::text('address', null, ['class'=>'form-control', 'id'=>'address', 'required']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="complement">Complemento *</label>
				{!! Form::text('complement', null, ['class'=>'form-control', 'id'=>'complement', 'required']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="district">Bairro *</label>
				{!! Form::text('district', null, ['class'=>'form-control', 'id'=>'district', 'required']) !!}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="city">Cidade *</label>
				{!! Form::text('city', null, ['class'=>'form-control', 'id'=>'city', 'required']) !!}
			</div>
		</div>
		<div class="col-md-1">
			<div class="form-group">
				<label for="state">UF *</label>
				{!! Form::text('state', null, ['class'=>'form-control', 'id'=>'state', 'required', 'maxlength'=>'2']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label for="region">Região *</label>
				{!! Form::select('region', $regions, isset($region) ? $region : null, ['placeholder' => 'Selecione...', 'class'=>'form-control', 'id'=>'region', 'required']) !!}
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="phone">Telefone</label>
				{!! Form::text('phone', null, ['class'=>'form-control', 'id'=>'phone']) !!}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label for="contact">Contato *</label>
				{!! Form::text('contact', null, ['class'=>'form-control', 'id'=>'contact', 'required']) !!}
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="email">Email *</label>
				{!! Form::text('email', null, ['class'=>'form-control', 'id'=>'email'], 'required') !!}
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="cnpj">CNPJ *</label>
				{!! Form::text('cnpj', null, ['class'=>'form-control', 'id'=>'cnpj', 'required']) !!}
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="ie">IE *</label>
				{!! Form::text('ie', null, ['class'=>'form-control', 'id'=>'ie', 'required']) !!}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="latitude">Latitude</label>
				{!! Form::text('latitude', null, ['class'=>'form-control', 'id'=>'latitude']) !!}
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="longitude">Longitude</label>
				{!! Form::text('longitude', null, ['class'=>'form-control', 'id'=>'longitude']) !!}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 col-md-offset-5">
			<button type="submit" class="btn btn-success btn-block"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div id="jMap"></div>
		</div>
	</div>
</div>
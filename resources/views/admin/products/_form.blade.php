<div class="row">
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="name">Nome *</label>
					{!! Form::text('name', null, ['class'=>'form-control', 'autofocus', 'required']) !!}
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="last_name">Último Nome</label>
					{!! Form::text('last_name', null, ['class'=>'form-control', 'id'=>'last_name']) !!}
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="presentation">Apresentação</label>
					{!! Form::text('presentation', null, ['class'=>'form-control', 'required']) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="description">Descrição *</label>
					{!! Form::textarea('description', null, ['class'=>'form-control textarea','required']) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="benefits">Benefícios</label>
					{!! Form::textarea('benefits', null, ['class'=>'form-control textarea']) !!}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading font-bold"><b>Tópicos</b></div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4"><label>Título</label></div>
							<div class="col-md-5"><label>Texto</label></div>
							<div class="col-md-2"><label>Ícone</label></div>
							<div class="col-md-1"></div>
						</div>
						<div class="topicos">
							@if(!isset($product))
								<div class="topico">
									<div class="row">
										<div class="col-md-4">
											<input type="text" data-ref="-1" name="topico_titulo[-1]" class="form-control">
										</div>
										<div class="col-md-5">
											<input type="text" data-ref="-1" name="topico_texto[-1]" class="form-control">
										</div>
										<div class="col-md-3">
											<input type="file" data-ref="-1" name="img_topico[-1]" class="upload-img" data-responsive="true">
										</div>
										<button type="button" class="btn btn-danger btn-xs bt-delete-item"><i class="fa fa-times"></i></button>
									</div>
								</div>
							@else
								@if(count($topics) > 0)
									@foreach($topics as $x => $tp)
										<div class="topico">
											<div class="row" data-id_tp="{{ $tp->id }}">
												<div class="col-md-4">
													<input type="text" value="{{ $tp->topic_description }}" name="topico_titulo[{{ $tp->id  }}]" class="form-control">
												</div>
												<div class="col-md-5">
													<input type="text" value="{{ $tp->description }}" name="topico_texto[{{ $tp->id  }}]" class="form-control">
												</div>
												<div class="col-md-3">
													@if(isset($tp->image))
														<input type="file" data-url="{{ asset("/uploads/products/$product->id/topics/$tp->image")  }}" name="img_topico[{{ $tp->id  }}]" class="upload-img" data-responsive="true">
													@else
														<input type="file" name="img_topico[{{ $tp->id  }}]" class="upload-img" data-responsive="true">
													@endif
												</div>
												<button type="button" class="btn btn-danger btn-xs bt-delete-item"><i class="fa fa-times"></i></button>
											</div>
										</div>
									@endforeach
								@else
									<div class="topico">
										<div class="row">
											<div class="col-md-4">
												<input type="text" data-ref="-1" name="topico_titulo[-1]" class="form-control">
											</div>
											<div class="col-md-5">
												<input type="text" data-ref="-1" name="topico_texto[-1]" class="form-control">
											</div>
											<div class="col-md-3">
												<input type="file" data-ref="-1" name="img_topico[-1]" class="upload-img" data-responsive="true">
											</div>
											<button type="button" class="btn btn-danger btn-xs bt-delete-item"><i class="fa fa-times"></i></button>
										</div>
									</div>
								@endif
							@endif
						</div>
						<button type="button" class="btn btn-primary btn-xs bt-add-topic"><i class="fa fa-plus"></i> Adicionar Novo Tópico</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="link-compra-online">Link para compra online</label>
					{!! Form::text('link_purchase', null, ['class'=>'form-control']) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="shopify">Shopify</label>
					{!! Form::textarea('shopify', null, ['class'=>'form-control textarea']) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="excerpt">Resumo</label>
					{!! Form::textarea('excerpt', null, ['class'=>'form-control textarea']) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10">
				<div class="form-group">
					<label for="video">Vídeo</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-youtube-play" aria-hidden="true"></i></span>
						{!! Form::text('video', null, ['id'=>'video','class'=>'form-control', 'placeholder'=>'URL vídeo Youtube']) !!}
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<label>&nbsp;</label>
				<a href="#" class="btn btn-block btn-info bt-visualizar" data-toggle="modal" data-target="#modal-video"><i class="fa fa-eye" aria-hidden="true"></i> Visualizar</a>
			</div>
		</div>
		<div class="row" id="sabor">
			<div class="col-md-6">
				<div class="form-group">
					<label for="flavor_id">Sabor</label>
					{!! Form::select('flavor_id', $flavors, isset($product) ? $product->flavor_id : null ,['class'=>'form-control']) !!}
				</div>
			</div>
			{{--<div class="col-md-4">--}}
				{{--<div class="form-group">--}}
					{{--<label for="related_flavors">Sabores Relacionados</label>--}}
					{{--{!! Form::select('related_flavors[]', $flavorsList, empty($relatedFlavorsList) ? null : $relatedFlavorsList,['class'=>'form-control sabores-relacionados', 'multiple']) !!}--}}
				{{--</div>--}}
			{{--</div>--}}
			<div class="col-md-6">
				<div class="form-group">
					<label for="related_flavors">Produtos Relacionados</label>
					{!! Form::select('related_products[]', $products, empty($relatedProductsList) ? null : $relatedProductsList,['class'=>'form-control sabores-relacionados', 'multiple']) !!}
				</div>
			</div>
		</div>
		<div class="row" id="informacao-nutricional">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading font-bold"><b>Informação Nutricional</b></div>
					<div class="panel-body">
						<div class="form-group">
							<label for="portion">Porção</label>
							{!! Form::text('serving_size', null, ['class'=>'form-control']) !!}
						</div>
						<div class="row">
							<div class="col-md-6">
								<label>Nutriente</label>
							</div>
							<div class="col-md-3">
								<label>Quantidade</label>
							</div>
							<div class="col-md-3">
								<label>%VD</label>
							</div>
						</div>
						<div class="nutrientes">
							<div class="row">
								<div class="col-md-6">{!! Form::textarea('nutrients', null, ['class'=>'form-control tarea']) !!}</div>
								<div class="col-md-3">{!! Form::textarea('nutrient_qty', null, ['class'=>'form-control tarea']) !!}</div>
								<div class="col-md-3">{!! Form::textarea('nutrient_vd', null, ['class'=>'form-control tarea']) !!}</div>
							</div>
						</div>

						<div class="form-group">
							<label for="complement">Complemento</label>
							{!! Form::textarea('complement', null, ['class'=>'form-control textarea']) !!}
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="tags">Tags</label>
					{!! Form::text('tags', null, ['class'=>'form-control']) !!}
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>&nbsp;</label>
					<button type="submit" class="btn btn-block btn-success"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="image">Imagem *</label>
					@if(isset($product->image))
						<input type="file" data-url="{{ asset("/uploads/products/$product->id/$product->image")  }}" name="image" class="upload-img" data-responsive="true">
					@else
						<input type="file" name="image" class="upload-img" data-responsive="true">
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading font-bold"><b>Linha</b></div>
					<div class="panel-body">
						@foreach($lines as $l => $line)
							<div class="radio">
								<label class="i-checks">
									{{--@if(isset($product) && $product->line_id == $line->id)--}}
									<input type="radio" name="line_id[]" checked value="{{ $line->id }}">
									{{--@else--}}
									{{--<input type="radio" name="line_id[]" value="{{ $line->id }}">--}}
									{{--@endif--}}
									<i></i>
									{{ $line->name }}
								</label>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading font-bold"><b>Tipo</b></div>
					<div class="panel-body">
						@foreach($types as $type)
							<div class="radio">
								<label class="i-checks">
									@if(isset($product) && $product->type_id == $type->id)
										<input type="radio" name="type_id[]" checked value="{{ $type->id }}">
									@else
										<input type="radio" name="type_id[]" value="{{ $type->id }}">
									@endif
									<i></i>
									{{ $type->name  }}
								</label>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="categorias">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading font-bold"><b>Categorias</b></div>
					<div class="panel-body">
						<div class="categoria">
							@foreach($categories as $cat => $category)
								<div class="checkbox">
									<label class="i-checks">
										@if(isset($relatedCategoriesProductsList) && in_array($category->id, $relatedCategoriesProductsList))
											<input type="checkbox" class="form-control" checked value="{{ $category->id }}" name="categories_ids[]">
										@else
											<input type="checkbox" value="{{ $category->id }}" name="categories_ids[]">
										@endif
										<i></i>
										{{ $category->name  }}
									</label>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row" id="objetivos">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading font-bold"><b>Objetivos</b></div>
					<div class="panel-body">
						@foreach($goals as $goalIdx => $goal)
							<div class="checkbox">
								<label class="i-checks">
									@if(isset($relatedGoalsProductsList) &&in_array($goal->id, $relatedGoalsProductsList))
										<input checked type="checkbox" name="goals_ids[]" value="{{ $goal->id }}">
									@else
										<input type="checkbox" name="goals_ids[]" value="{{ $goal->id }}">
									@endif
									<i></i>
									{{ $goal->name }}
								</label>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>

		<div class="row" id="destaque-porcao">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading font-bold"><b>Destaques por porção</b></div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-5">Valor</div>
							<div class="col-md-7">Nutriente</div>
						</div>
						<div class="qtds-porcao">
							@if( !empty($product->portions) )
								@foreach($product->portions as $ip => $p)
									<div class="qtd-porcao">
										<div class="row" data-id="{{ $p->id }}">
											<div class="col-md-5">
												<input type="text" name="portions[{{$p->id}}][value]" value="{{ $p->value }}" class="form-control input-portions-value">
											</div>
											<div class="col-md-7">
												<input type="text" name="portions[{{$p->id}}][nutrient]" value="{{ $p->nutrient }}" class="form-control input-portions-nutrient">
											</div>
											<button type="button" class="btn btn-danger btn-xs bt-delete-qtd-porcao"><i class="fa fa-times"></i></button>
										</div>
									</div>
								@endforeach
							@else
								<div class="qtd-porcao">
									<div class="row">
										<div class="col-md-5">
											<input type="text" name="portions[-1][value]" class="form-control input-portions-value">
										</div>
										<div class="col-md-7">
											<input type="text" name="portions[-1][nutrient]" class="form-control input-portions-nutrient">
										</div>
										<button type="button" class="btn btn-danger btn-xs bt-delete-qtd-porcao"><i class="fa fa-times"></i></button>
									</div>
								</div>
							@endif
						</div>
						<button type="button" class="btn btn-primary btn-xs pull-right" id="bt-add-qtd-porcao"><i class="fa fa-plus" aria-hidden="true"></i>Adicionar Novo Item</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@extends('admin.main')

@section('css')
	<style>
		.color {
			border-radius: 3px;
			color: #fff;
			padding: 1px 3px;
		}

		table {
			margin-top: 30px;
		}

		td {
			padding: 5px;
		}
	</style>
@endsection

@section('main')
	<div class="container-fluid">
		<table>
			@foreach($listagemPermissoes as $key => $perms)
				<tr>
					<td><b>{{ preg_replace('/(?<=\\w)(?=[A-Z])/'," $1", str_replace('AdminController', '', $key)) }}</b></td>
					@foreach($perms as $permKey => $p)
						<td>
							<label class="i-switch m-t-xs m-r" data-toggle="tooltip" data-placement="top" title="{{ $p[0] }}">
								<input data-permission-id="{{ $permKey  }}" type="checkbox" {{ $p[1] ? 'checked' : '' }} name="{{ $p[0] }}" class="radio">
								<i></i>
							</label>
						</td>
					@endforeach
				</tr>
			@endforeach
		</table>
	</div>
@endsection

@section('js')
	<script>
		$(function () {

			$('[data-toggle="tooltip"]').tooltip({
				container: 'body'
			});

			$('.radio').on('change', function () {
				var item = $(this).attr('name');
				var check = $(this).is(":checked");
				var id = $(this).data('permission-id');
				var url = base_url + "/admin/permissoes/"+ id +"/permitir";

                $.get( url );
			});
		});
	</script>
@endsection
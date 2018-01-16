@extends('site.main')

@section('css')
	<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.css') }}">
	<style>

		*::-webkit-input-placeholder {
			color: #ccc !important;;
		}

		*:-moz-placeholder {
			color: #ccc !important;;
		}

		*::-moz-placeholder {
			color: #ccc !important;;
		}

		*:-ms-input-placeholder {
			color: #ccc !important;
		}

		#lojas header {
			margin: 80px 0 60px;
			background: url({{asset('img/bg2.jpg')}}) fixed;
		}

		h2 {
			color: #6d7d32;
			text-align: center;
			margin: 40px 0 30px;
		}

		@media (min-width: 1200px) {
			#lojas header h1 {
				margin: 0;
				padding: 50px;
				width: 100%;
				font-size: 28px;
				color: #d0bc86;
				letter-spacing: 16px;
				line-height: 40px;
			}
		}

		@media (max-width: 1200px) {
			#lojas header h1 {
				margin: 0;
				padding: 40px;
				width: 100%;
				font-size: 25px;
				color: #d0bc86;
				letter-spacing: 10px;
				line-height: 40px;
			}
		}

		#lojas {
			margin-top: -100px;
			padding-top: 100px;
			padding-bottom: 140px;
			background: url({{ asset('img/bg.jpg') }}) fixed;
			display: block;
			position: relative;
		}

		#lojas h1 {
			color: #ba9e17;
			text-align: center;
			margin-bottom: 50px;
			padding-top: 100px;
			font-weight: bold;
		}

		#lojas form {
			text-align: center;
		}

		#lojas p {
			font-size: 17px;
			line-height: 26px;
			color: #444;
			text-align: center;
			margin-bottom: 30px;
			font-weight: bold;
		}

		.resultado {
			color: #333;
		}

		.table-hover > tbody > tr:hover {
			background: #6d7d32;
			color: #fff;
		}

		#modal-mapa {
			z-index: 9999;
		}

		.modal-lg {
			width: 1200px;
		}

		.modal-title {
			color: #6d7d32;
			text-align: center;
		}

		.endereco {
			color: #777 !important;
			font-weight: normal !important;
		}

		#startMap, #map {
			display: block;
			width: 100% !important;
			height: 500px;
		}

		html, body {
			height: 100%;
			margin: 0;
			padding: 0;
		}

		.iw_container {
			color: #444;
		}
	</style>
@endsection

@section('main')

	<section id="lojas">

		<header>
			<h1>Encontre uma loja</h1>
		</header>

		<div class="container text-center">
			@include('_flash')
		</div>

		<div class="container">
			<p>Digite seu CEP e encontre a loja com produtos Military Trail mais próxima de você!</p>
			<form action="{{ route('lojas.pesquisar') }}" class="form-inline myForm">
				<input type="search" name="search" id="search_lojas" class="form-control input-lg" placeholder="CEP" value="{{ $cep or '' }}" required autofocus>
				<button type="submit" class="btn btn-primary btn-lg"><span>Pesquisar</span> <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
			</form>
			<p class="text-center">
				<small><a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="_blank">Saiba o seu CEP aqui</a></small>
			</p>
		</div>

		<div id="startMap"></div>

		<div class="container">
			<h2>Lojas</h2>
			<div class="resultado">
				<table class="table table-hover" id="tabLojas">
					<thead>
					<tr>
						<th>Nome</th>
						<th>Endereço</th>
						<th>Bairro</th>
						<th>Cidade</th>
						<th>UF</th>
						<th>Ver no Mapa</th>
					</tr>
					</thead>
					<tbody>
					@foreach($stores as $key => $store)
						<tr>
							<td class="other_name">{{ $store->other_name }}</td>
							<td class="address">{{ $store->address }}, {{ $store->complement }}</td>
							<td class="district">{{ $store->district }}</td>
							<td class="city">{{ $store->city }}</td>
							<td class="state">{{ $store->state }}</td>
							<td>
								<button class="btn btn-primary bt-ver-no-mapa" data-toggle="modal" data-target="#modal-mapa" data-latitude="{{ $store->latitude }}" data-longitude="{{ $store->longitude }}">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
									Ver no Mapa
								</button>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="modal fade" id="modal-mapa" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"></h4>
						<p class="endereco"></p>
					</div>
					<div class="modal-body">
						<div id="map"></div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>

	</section>

@endsection

@section('js')
	<script type="text/javascript" charset="utf8" src="{{ asset('js/jquery.dataTables.js') }}"></script>
	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZyGvRUbt54ql9guh2x2rdrSMGw0YD74">
	</script>
	<script>
		$(function () {

			$('#tabLojas').dataTable({
				"columnDefs": [
					{ "orderable": false, "targets": 5 }
				],
				"bPaginate": false,
				"bInfo": false,
				"language": {
					"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese.json"
				}
			});

			$('#tabLojas_filter label input').addClass('form-control');

			var startMap = '';
			var infoWindowStart = '';
			var stores = '';
			var search = false;
			var coordenadas = '';
			var myMap = '';
			var myMarker = '';
			var myLatLng = '';


			function createMarker(latlng, other_name, address, complement, district, city, state, zip, first) {

				var startMarker = new google.maps.Marker({
					map: startMap,
					position: latlng,
					title: other_name,
					icon: (search && first) ? 'http://militarytrail.com.br/img/marcador-loja-mais-proxima.png' : '',
					animation: (search && first) ? google.maps.Animation.BOUNCE : '',
				});

				google.maps.event.addListener(startMarker, 'click', function () {

					var iwContent = '<div class="iw_container">' +
						'<b>' + other_name + '</b>' +
						'<div class="iw_content">' + address + ', ' + complement + '<br>' +
						district + ', ' + city + ', ' + state + '<br />' +
						zip + '</div></div>';

					infoWindowStart.setContent(iwContent);
					infoWindowStart.open(startMap, startMarker);
				});
			}

			function eachJson(result) {
				var bounds = new google.maps.LatLngBounds();
				$.each(result, function (index, element) {
					var latlng = new google.maps.LatLng(element.latitude, element.longitude);
					var other_name = element.other_name;
					var address = element.address;
					var complement = element.complement;
					var district = element.district;
					var city = element.city;
					var state = element.state;
					var zip = element.zip;
					var first = (index == 0) ? true : false;

					createMarker(latlng, other_name, address, complement, district, city, state, zip, first);

					bounds.extend(latlng);
				});
			}

			function setCoordinates(result) {
				$.each(result, function (index, element) {
					coordenadas += element.latitude + ',' + element.longitude + '|';
				});
				coordenadas = coordenadas.slice(0, -1);
			}

			function displayMarkers() {
				$.get(base_url + '/lojas/json', function (result) {
					stores = result;
					setCoordinates(result);
					eachJson(result);
				});
			}

			function initializeMap() {
				var mapOptions = {
					center: new google.maps.LatLng(-15.0000000, -55.0000000),
					zoom: 4,
					mapTypeId: 'roadmap',
				};

				startMap = new google.maps.Map(document.getElementById('startMap'), mapOptions);
				infoWindowStart = new google.maps.InfoWindow();

				google.maps.event.addListener(startMap, 'click', function () {
					infoWindowStart.close();
				});
			}


			initializeMap();
			displayMarkers();


			/* Ver no Mapa */

			function initMap(latitude, longitude) {

				let lat = parseFloat(latitude);
				let lng = parseFloat(longitude);

				myLatLng = {lat: lat, lng: lng};

				myMap = new google.maps.Map(document.getElementById('map'), {
					zoom: 15,
					center: myLatLng
				});

				myMarker = new google.maps.Marker({
					position: myLatLng,
					map: myMap,
					title: 'Military Trail'
				});
			}

			$('#modal-mapa').on('shown.bs.modal', function (e) {
				if (typeof myMap == "undefined") return;
				google.maps.event.trigger(myMap, "resize");
				myMarker.setPosition(myLatLng);
				myMap.setCenter(myLatLng);
			});


			$('.myForm').on('submit', function (event) {

				event.preventDefault();

				let btSubmit = $(this).find(':submit');
				let zip = $('#search_lojas').val();
				let origins = zip.replace(/[^\w\s]/gi, '');
				let destinations = coordenadas;
				let url = base_url + '/lojas/pesquisa/json';

				$.ajax({
					url: url,
					data: {
						origins: origins,
						destinations: destinations
					},
					type: 'GET',
					success: function (data) {
						console.log(data);
//Status OK
//Status NOT_FOUND
						let d = JSON.parse(data);
						let elements = d.rows[0].elements;

						$.each(stores, function (index) {
							stores[index]['duration'] = elements[index]['duration'];
							stores[index]['distance'] = elements[index]['distance'];
						});

						stores.sort(function (a, b) {
							return a.distance.value - b.distance.value;
						});

						search = true;
						initializeMap();
						eachJson(stores);

						stores.sort(function (a, b) {
							return a.id - b.id;
						});

						console.log(stores);
//						$.each(stores, function (index) {
//							console.log(stores);
//							console.log(stores[index]['distance']['value']);
//						});
					},
					beforeSend: function () {
						btSubmit.prop('disabled', true);
						btSubmit.find('span').text('Aguarde...');
						btSubmit.find('i').removeClass('fa-arrow-right');
						btSubmit.find('i').addClass('fa-refresh fa-spin fa-fw');
					},
					complete: function () {
						btSubmit.prop('disabled', false);
						btSubmit.find('span').text('Pesquisar');
						btSubmit.find('i').removeClass('fa-refresh fa-spin fa-fw');
						btSubmit.find('i').addClass('fa-arrow-right');
					}
				});
			});

			$("#search_lojas").mask("99999999");

			$('.bt-ver-no-mapa').on('click', function () {

				let other_name = $(this).parent().siblings('.other_name').text();
				let address = $(this).parent().siblings('.address').text();
				let district = $(this).parent().siblings('.district').text();
				let city = $(this).parent().siblings('.city').text();
				let state = $(this).parent().siblings('.state').text();

				let latitude = $(this).data('latitude');
				let longitude = $(this).data('longitude');

				$('.modal-title').text(other_name);
				$('.endereco').text(address + ' ' + district + ' ' + city + ' ' + state);

				initMap(latitude, longitude);
			});
		});
	</script>
@endsection
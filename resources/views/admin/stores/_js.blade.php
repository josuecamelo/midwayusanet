<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBw8qLosz_paHyxkplbRxWiy_QZBpTUj2I"></script>
<script>
	/*

	 Desenvolvimento por Josué Camelo dos Santos Ferreira
	 Desenvolvimento Web
	 josueprg@gmail.com
	 (62)-92527138
	 Correção em 07/02/2016
	 Adaptação Midway em 22/03/2017
	 */

	var selecionaRegiao = function (uf) {
		$.getJSON('http://servicodados.ibge.gov.br/api/v1/localidades/estados', function (result) {
			$.each(result, function (index, element) {
				if (uf == element['sigla']) {
					$('#region').val((element['regiao']['nome']).toUpperCase());
				}
			});
		});
	};

	$(document).ready(function () {
		$("#cnpj").mask("99.999.999/9999-99");
		$("#phone").mask("(099) 9999-9999");
		$("#zip").mask("99999-999");

		var somenteNumeros = function (valor) {
			return valor.replace(/\D/g, '');
		};
		var trim = function (valor) {
			return valor.replace(" ", "");
		};

		var consultaCep1 = function (cep) {
			if (cep != '7500-000' && cep.length >= 9) {
				$.get("http://apps.widenet.com.br/busca-cep/api/cep.json", {code: cep}, function (result) {
					if (result.status != 1) {
						console.log('Erro na Busca de CEP 1. Tentando em Outro Servidor');
						$.getJSON("//viacep.com.br/ws/" + somenteNumeros(cep) + "/json/?callback=?", function (dados) {
							if (!("erro" in dados)) {
								$("input#city").val(dados.localidade);
								$("input#district").val(dados.bairro);
								$("input#address").val(dados.logradouro);
								$('input#state').val(dados.uf);
								selecionaRegiao(dados.uf);
								console.log('Achou o CEP na Busca 2.')
							} else {
								console.log('Erro Busca 2');
							}
						});
					} else {
						$("input#city").val(result.city);
						$("input#district").val(result.district);
						$("input#address").val(result.address);
						$('input#state').val(result.state);
						selecionaRegiao(result.state);
					}
				});
			}
		};

		$('#zip').on('keyup', function (e) {
			var valor = $(this).val();
			//Nova variável "cep" somente com dígitos.
			var cep = somenteNumeros(valor);

			//Verifica se campo cep possui valor informado.
			if (cep != "") {
				//Expressão regular para validar o CEP.
				var validacep = /^[0-9]{8}$/;
				//Valida o formato do CEP.
				if (validacep.test(cep)) {
					consultaCep1(valor);
				}
			}
		});

		$('#zip').on('blur', function (e) {
			var valor = $(this).val();
			//Nova variável "cep" somente com dígitos.
			var cep = somenteNumeros(valor);

			//Verifica se campo cep possui valor informado.
			if (cep != "") {
				//Expressão regular para validar o CEP.
				var validacep = /^[0-9]{8}$/;
				//Valida o formato do CEP.
				if (validacep.test(cep)) {
					consultaCep1(valor);
				}
			}
		});
	});
</script>
<script>
	/*
	 *
	 * GeoLocalização GMaps
	 * josuecamelo
	 * 23/03/2017
	 * */

	var geocoder;
	var map;
	var marker;

	var quebrarEnderecoGoogleMaps = function (endereco, atualizaEndereco) {
		var retorno = endereco.split(",");

		if (atualizaEndereco != 0) {
			$('#address').val(retorno[0]); //cidade

			if (retorno.length > 4) {
				$('#zip').val(retorno[3]);//cep
			} else {
				$('#zip').val('');
			}
		}
	}

	function initialize() {
		var lat = $('#latitude').val();
		var lng = $('#longitude').val();

		if ((lat == '' && lng == '') || (lat == undefined && lng == undefined)) {
			var latlng = new google.maps.LatLng(-16.3333, -48.9667); //Coordenada Inicial
			var options = {
				zoom: 5,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};

			map = new google.maps.Map(document.getElementById("jMap"), options);

			geocoder = new google.maps.Geocoder();

			marker = new google.maps.Marker({
				map: map,
				draggable: true,
			});

			marker.setPosition(latlng);
		} else {
			var latlng = new google.maps.LatLng(lat, lng); //Coordenada Inicial
			var options = {
				zoom: 17,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};

			map = new google.maps.Map(document.getElementById("jMap"), options);

			geocoder = new google.maps.Geocoder();

			marker = new google.maps.Marker({
				map: map,
				draggable: true,
			});

			marker.setPosition(latlng);
		}
	}

	$(document).ready(function () {
		initialize(); //Inicializando Mapa

		var carregarNoMapa = function (endereco) {
			geocoder.geocode({'address': endereco + ', Brasil', 'region': 'BR'}, function (results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					if (results[0]) {
						var latitude = results[0].geometry.location.lat();
						var longitude = results[0].geometry.location.lng();

						//$('#address').val(results[0].formatted_address);
						$('#latitude').val(latitude);
						$('#longitude').val(longitude);

						quebrarEnderecoGoogleMaps(results[0].formatted_address, 0);

						var location = new google.maps.LatLng(latitude, longitude);
						marker.setPosition(location);
						map.setCenter(location);
						map.setZoom(16);
					}
				}
			});
		}

		//Localização Reversa
		google.maps.event.addListener(marker, 'dragend', function () {
			geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					if (results[0]) {
						//$('#address').val(results[0].formatted_address);
						$('#latitude').val(marker.getPosition().lat());
						$('#longitude').val(marker.getPosition().lng());

						quebrarEnderecoGoogleMaps(results[0].formatted_address, 1)
					}
				} else if (status === google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
					/*setTimeout(function() {
						geocoder.geocode(address);
					}, 200);*/
				} else {
					console.log("Geocode was not successful for the following reason:"
						+ status);
				}
			});
		});

		var endereco = '';
		var address = $('#address');
		var complement = $('#complement');
		var city = $('#city');
		var state = $('#state');

		function setAddress() {
			if (address.val() != '' && city.val() != '' && state.val() != '') {
				endereco = address.val() + ', ' + complement.val() + ', ' + city.val() + '-' + state.val();
				carregarNoMapa(endereco);
			}
		}

		setAddress();

		$('#zip').on('blur', function () {
			setAddress();
		});
	});
</script>
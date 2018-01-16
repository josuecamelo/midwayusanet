<script>

//	$(function () {
//		$('[data-toggle="tooltip"]').tooltip({
//			container: 'body',
//			placement: 'top'
//		});
//	})

	$('.tarea').on('keyup onpaste', function () {
		var alturaScroll = this.scrollHeight;
		var alturaCaixa = $(this).height();

		if (alturaScroll > (alturaCaixa + 15)) {
			if (alturaScroll > 500) return;
			$(this).css('height', alturaScroll);
		}
	});


	adicionaTopico = function () {
		let topicos = document.querySelector('.topicos');

		let todosTopicos = document.querySelectorAll('.topico');
		let count = todosTopicos.length + 1;

		topicos.appendChild(createTopic(count));

		$('.bt-add-topic').tooltip({
			container: 'body',
			placement: 'top'
		});

		$('.bt-delete-item').tooltip({
			container: 'body',
			placement: 'top'
		});
	}

	btAddTopic = document.querySelector('.bt-add-topic');
	btAddTopic.addEventListener('click', adicionaTopico);


	/* Criar tópicos: */

	createTopic = function (number) {
		let divTopico = document.createElement('div');
		divTopico.classList.add('topico');
		divTopico.setAttribute('draggable', 'true');
		divTopico.setAttribute('id', 'topico' + number);

		let divRow = document.createElement('div');
		divRow.classList.add('row');

		let div4 = document.createElement('div');
		div4.classList.add('col-md-4');

		let inputTitle = document.createElement('input');
		inputTitle.setAttribute('type', 'text');
		inputTitle.setAttribute('name', 'topico_titulo[' + (number * -1) + ']');
		inputTitle.classList.add('form-control');

		let div5 = document.createElement('div');
		div5.classList.add('col-md-5');

		let inputText = document.createElement('input');
		inputText.setAttribute('type', 'text');
		inputText.setAttribute('name', 'topico_texto[' + (number * -1) + ']');
		inputText.classList.add('form-control');

		let div3 = document.createElement('div');
		div3.classList.add('col-md-3');

		let labelImg = document.createElement('label');
		labelImg.textContent = 'Ícone';

		let buttonImg = document.createElement('button');
		buttonImg.setAttribute('type', 'button');
		buttonImg.classList.add('btn', 'btn-block', 'btn-default', 'bt-upload');
		buttonImg.onclick = function () {
			inputFile.click();
		};

		let iconButtonImg = document.createElement('i');
		iconButtonImg.classList.add('fa', 'fa-file-image-o');

		let textButtonImg = document.createTextNode('Definir imagem');

		let inputFile = document.createElement('input');
		inputFile.setAttribute('type', 'file');
		inputFile.setAttribute('name', 'img_topico[' + (number * -1) + ']');
		inputFile.setAttribute('data-responsive', 'true');
		inputFile.classList.add('upload-img', 'hidden');

		let buttonDelete = document.createElement('button');
		buttonDelete.classList.add('btn', 'btn-danger', 'btn-xs', 'bt-delete-item');
		buttonDelete.setAttribute('type', 'button');
		buttonDelete.addEventListener('click', confirmDeleteRow);

		let iconButtonDelete = document.createElement('i');
		iconButtonDelete.classList.add('fa', 'fa-times');

		inputFileChange(inputFile, buttonImg);

		buttonDelete.appendChild(iconButtonDelete);

		buttonImg.appendChild(iconButtonImg);
		buttonImg.appendChild(textButtonImg);

		div3.appendChild(buttonImg);
		div3.appendChild(inputFile);

		div5.appendChild(inputText);

		div4.appendChild(inputTitle);

		divRow.appendChild(div4);
		divRow.appendChild(div5);
		divRow.appendChild(div3);
		divRow.appendChild(buttonDelete);

		divTopico.appendChild(divRow);

		return divTopico;
	}


	/* Confirmar deletar tópico: */

	confirmDeleteRow = function () {
		if (confirm('Tem certeza de que deseja excluir este tópico?')) {
			this.parentNode.parentNode.remove();
			//let topicos = document.querySelectorAll('.topico');

			/*topicos.forEach(function (element, index) {
				let number = parseInt(index + 1);
				element.querySelector('.count').textContent = number;
				element.querySelector('input[type=text]').setAttribute('name', 'topico' + number);
			});*/
			var obj = this.parentNode.parentNode.parentNode;
			//console.log( obj.dataset.id_tp );
            var url = base_url + "/admin/produtos/"+ obj.dataset.id_tp +"/topic/destroy";

            /*$.ajax({
                type: "GET",
                url: url,
                async: false,
                cache: false,
                success: function () {

                }
            });*/
            $.get( url );
		}
	}

	confirmDeleteNutriente = function () {
		if (confirm('Tem certeza de que deseja excluir este nutriente?')) {

			this.parentNode.remove();

			let nutrientes = document.querySelector('.nutrientes');
			let itens = nutrientes.querySelectorAll('.item-nutriente');

			itens.forEach(function (element, index) {
				let number = parseInt(index + 1);
				element.querySelector('.nutriente').setAttribute('name', 'nutriente' + number);
				element.querySelector('.quantidade').setAttribute('name', 'quantidade' + number);
				element.querySelector('.vd').setAttribute('name', 'vd' + number);
			});
		}
	}

	confirmDeleteQtdPorcao = function () {
		if (confirm('Tem certeza de que deseja excluir este item?')) {

			this.parentNode.remove();

//			let qtdsPorcao = document.querySelector('.qtds-porcao');
//			let itens = qtdsPorcao.querySelectorAll('.qtd-porcao');

//			itens.forEach(function (element, index) {
//				let number = parseInt(index + 1);
//				element.querySelector('.input-portions-value').setAttribute('name', 'portions_value[]' + number);
//				element.querySelector('.input-portions-nutrient').setAttribute('name', 'portions_nutrient[]' + number);
//			});

            var obj = this.parentNode;
            var url = base_url + "/admin/produtos/"+ obj.dataset.id +"/portion/destroy";

            if(obj.dataset.id != undefined) {
                $.get( url );
            }
		}
	}

	btDeleteItem = document.querySelectorAll('.bt-delete-item');
	btDeleteItem.forEach(function (element) {
		element.addEventListener('click', confirmDeleteRow);
	});


	/* Reordenar tópicos: */

	reordenaTopicos = function (index, element) {
		let number = parseInt(index + 1);
		element.querySelector('.count').textContent = number;
		element.querySelector('input[type=text]').setAttribute('name', 'topico' + number);
		element.querySelector('input[type=file]').setAttribute('name', 'imgTopico' + number);
	}


	/* Reordenar tópicos: */

	/*reordenaNutrientes = function (index, element) {
		let number = parseInt(index + 1);
		element.querySelector('.nutriente').setAttribute('name', 'nutriente' + number);
		element.querySelector('.quantidade').setAttribute('name', 'quantidade' + number);
		element.querySelector('.vd').setAttribute('name', 'dv' + number);
	}*/


	/*let btAddNutrient = document.querySelector('#bt-add-nutrient');
	btAddNutrient.addEventListener('click', function () {

		let nutrientes = document.querySelector('.nutrientes');
		let itens = nutrientes.querySelectorAll('.item-nutriente');
		let count = itens.length;
		let number = count + 1;

		let divItemNutriente = document.createElement('div');
		divItemNutriente.classList.add('item-nutriente', 'row');

		let divNutriente = document.createElement('div');
		divNutriente.classList.add('col-md-6');

		let inputNutriente = document.createElement('input');
		inputNutriente.setAttribute('type', 'text');
		inputNutriente.setAttribute('name', 'nutriente' + number);
		inputNutriente.classList.add('form-control', 'nutriente');

		divNutriente.appendChild(inputNutriente);

		let divQuantidade = document.createElement('div');
		divQuantidade.classList.add('col-md-3');

		let inputQuantidade = document.createElement('input');
		inputQuantidade.setAttribute('type', 'text');
		inputQuantidade.setAttribute('name', 'quantidade' + number);
		inputQuantidade.classList.add('form-control', 'quantidade');

		divQuantidade.appendChild(inputQuantidade);

		let divVd = document.createElement('div');
		divVd.classList.add('col-md-3');

		let inputVd = document.createElement('input');
		inputVd.setAttribute('type', 'text');
		inputVd.setAttribute('name', 'vd' + number);
		inputVd.classList.add('form-control', 'vd');

		divVd.appendChild(inputVd);

		let btDeleteItemNutriente = document.createElement('button');
		btDeleteItemNutriente.setAttribute('type', 'button');
		btDeleteItemNutriente.classList.add('btn', 'btn-danger', 'btn-xs', 'bt-delete-item-nutriente');
		btDeleteItemNutriente.addEventListener('click', confirmDeleteNutriente);

		let iconBtDeleteItemNutriente = document.createElement('i');
		iconBtDeleteItemNutriente.classList.add('fa', 'fa-times');

		btDeleteItemNutriente.appendChild(iconBtDeleteItemNutriente);

		divItemNutriente.appendChild(divNutriente);
		divItemNutriente.appendChild(divQuantidade);
		divItemNutriente.appendChild(divVd);
		divItemNutriente.appendChild(btDeleteItemNutriente);

		nutrientes.appendChild(divItemNutriente);
	});*/

	let btAddQtdPorcao = document.querySelector('#bt-add-qtd-porcao');
	btAddQtdPorcao.addEventListener('click', function () {

		let qtdsPorcao = document.querySelector('.qtds-porcao');
		let itens = qtdsPorcao.querySelectorAll('.qtd-porcao');
		let count = itens.length;
		let number = count + 1;

		let divQtdPorcao = document.createElement('div');
		divQtdPorcao.classList.add('qtd-porcao');

		let divRow = document.createElement('div');
		divRow.classList.add('row');

		let div5 = document.createElement('div');
		div5.classList.add('col-md-5');

		let inputPortionsValue = document.createElement('input');
		inputPortionsValue.setAttribute('type', 'text');
		inputPortionsValue.setAttribute('name', 'portions[' + (number * -1) +'][value]');
		inputPortionsValue.classList.add('form-control', 'input-portions-value');

		let div7 = document.createElement('div');
		div7.classList.add('col-md-7');

		let inputPortionsNutrient = document.createElement('input');
		inputPortionsNutrient.setAttribute('type', 'text');
		inputPortionsNutrient.setAttribute('name', 'portions[' + (number * -1) + '][nutrient]');
		inputPortionsNutrient.classList.add('form-control', 'input-portions-nutrient');

		let btDeleteQtdPorcao = document.createElement('button');
		btDeleteQtdPorcao.setAttribute('type', 'button');
		btDeleteQtdPorcao.classList.add('btn', 'btn-danger', 'btn-xs', 'bt-delete-qtd-porcao');
		btDeleteQtdPorcao.addEventListener('click', confirmDeleteQtdPorcao);

		let iconBtDeleteQtdPorcao = document.createElement('i');
		iconBtDeleteQtdPorcao.classList.add('fa', 'fa-times');

		btDeleteQtdPorcao.appendChild(iconBtDeleteQtdPorcao);

		div5.appendChild(inputPortionsValue);
		div7.appendChild(inputPortionsNutrient);

		divRow.appendChild(div5);
		divRow.appendChild(div7);
		divRow.appendChild(btDeleteQtdPorcao);

		divQtdPorcao.appendChild(divRow);

		qtdsPorcao.appendChild(divQtdPorcao);
	});

	//$('.bt-delete-item-nutriente').on('click', confirmDeleteNutriente);

	$(function () {

		$('.bt-visualizar').on('click', function () {

			let url = $('#video').val();
			let video = 'https://www.youtube.com/embed/' + url.replace('https://youtu.be/', '') + '?autoplay=1';

			$('#video-modal').attr('src', video);
		});

		$('#modal-video').on('hide.bs.modal', function (event) {
			$('#video-modal').attr('src', '');
		});

		uploadImg();

		$('[data-toggle="tooltip"]').tooltip();

		$('.topicos').sortable({
			placeholder: "over",
//			beforeStop: function () {
//				$('.topico').each(function (index, element) {
//					reordenaTopicos(index, element);
//				});
//			}
		});

		/*$('.nutrientes').sortable({
			placeholder: "overNutriente",
			beforeStop: function () {
				$('.item-nutriente').each(function (index, element) {
					reordenaNutrientes(index, element);
				});
			}
		});*/


//            $('input[type=radio][name=type]').change(function () {
//
//                let valor = this.value;
//
//                $('.categoria').each(function () {
//                    if (valor == $(this).data('categoria')) {
//                        $(this).show();
//                    } else {
//                        $(this).hide();
//                    }
//                });
//
//                if (valor == 'suplemento') {
//                    $('#sabor').show();
//                    $('#objetivos').show();
//                    $('#informacao-nutricional').show();
//                    $('#destaque-porcao').show();
//                }
//                else {
//                    $('#sabor').hide();
//                    $('#objetivos').hide();
//                    $('#informacao-nutricional').hide();
//                    $('#destaque-porcao').hide();
//                }
//
//                $('#categorias').show();
//            });

		/*$('#sabor').hide();
		 $('#categorias').hide();
		 $('#objetivos').hide();
		 $('#informacao-nutricional').hide();
		 $('#destaque-porcao').hide();*/

		$(".sabores-relacionados").select2();

		let btDeleteQtdPorcao = document.querySelectorAll('.bt-delete-qtd-porcao');
		btDeleteQtdPorcao.forEach(function (element) {
			element.addEventListener('click', confirmDeleteQtdPorcao);
		});

	});
</script>
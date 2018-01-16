<script>
	$(function () {

		setInterval(function () {
			let allVideoUrls = document.querySelectorAll('.video');
			allVideoUrls.forEach(function (element) {
				let div = element.parentNode.parentNode.nextElementSibling;
				let button = div.querySelector('button');
				if (element.value == '') {
					button.classList.add('disabled');
				} else {
					button.classList.remove('disabled');
				}
			});
		}, 1000);

		uploadImg();
		uploadImgGallery();

		$('.bt-delete-img-galeria').on('click', function () {
			if (confirmDelete()) {
				let val = $('#images_for_delete').val();
				let id = $(this).data('id');
				let value = (val == '') ? id : val + ',' + id;
				$('#images_for_delete').val(value);
				$(this).parent().remove();
			}
		});

		function deleteVideoGaleria() {
			if (confirmDelete()) {
				let val = $('#videos_for_delete').val();
				let id = $(this).data('id');
				let value = (val == '') ? id : val + ',' + id;
				$('#videos_for_delete').val(value);
				$(this).parent().parent().remove();
			}
		}

		function abrirModal(t) {
			$('#modal-video').modal('show');
			setVarsModal(t);
		}

		function setVarsModal(t) {
			let titulo = t.parent().siblings('.col-md-6').find('.titulo').val();
			let url = t.parent().siblings('.col-md-4').find('.video').val();
			let video = 'https://www.youtube.com/embed/' + url.replace('https://youtu.be/', '') + '?autoplay=1';

			$('#titulo').html(titulo);
			$('#video').attr('src', video);
		}

		$('.bt-delete-video-galeria').on('click', deleteVideoGaleria);

		$('.bt-modal-video').on('click', function (e) {
			e.preventDefault();
			setVarsModal($(this));
		});

		$('#modal-video').on('hide.bs.modal', function (event) {
			$('#video').attr('src', '');
		});

		$('#bt-add-video').on('click', function () {

			let todosVideos = document.querySelectorAll('.v');
			let number = todosVideos.length + 1;

			let divV = document.createElement('div');
			divV.classList.add('v');

			let divRow = document.createElement('div');
			divRow.classList.add('row');

			let div6 = document.createElement('div');
			div6.classList.add('col-md-6');

			let inputTitle = document.createElement('input');
			inputTitle.setAttribute('type', 'text');
			inputTitle.setAttribute('name', 'video_title[' + (number * -1) + ']');
			inputTitle.classList.add('form-control', 'titulo');

			div6.appendChild(inputTitle);

			let div4 = document.createElement('div');
			div4.classList.add('col-md-4');

			let divInputGroup = document.createElement('div');
			divInputGroup.classList.add('input-group');

			let spanInputGroupAddon = document.createElement('span');
			spanInputGroupAddon.classList.add('input-group-addon');

			let iconUrl = document.createElement('i');
			iconUrl.classList.add('fa', 'fa-youtube');

			spanInputGroupAddon.appendChild(iconUrl);

			let inputUrl = document.createElement('input');
			inputUrl.setAttribute('type', 'text');
			inputUrl.setAttribute('name', 'video_url[' + (number * -1) + ']');
			inputUrl.classList.add('form-control', 'video');

			divInputGroup.appendChild(spanInputGroupAddon);
			divInputGroup.appendChild(inputUrl);

			div4.appendChild(divInputGroup);

			let div2 = document.createElement('div');
			div2.classList.add('col-md-2');

			let btVisualizar = document.createElement('button');
			btVisualizar.classList.add('btn', 'btn-info', 'btn-block', 'bt-modal-video', 'disabled');
			btVisualizar.setAttribute('type', 'button');
			btVisualizar.setAttribute('data-toggle', 'modal');
			btVisualizar.setAttribute('data-target', '#modal-video');

			let iconBtVisualizar = document.createElement('i');
			iconBtVisualizar.classList.add('fa', 'fa-eye');

			let txtBtVisualizar = document.createTextNode('Visualizar');

			btVisualizar.appendChild(iconBtVisualizar);
			btVisualizar.appendChild(txtBtVisualizar);

			div2.appendChild(btVisualizar);

			let btDelete = document.createElement('button');
			btDelete.setAttribute('type', 'button');
			btDelete.classList.add('btn', 'btn-danger', 'btn-xs', 'bt-delete-video-galeria');
			btDelete.addEventListener('click', deleteVideoGaleria);

			let iconBtDelete = document.createElement('i');
			iconBtDelete.classList.add('fa', 'fa-times');

			btDelete.appendChild(iconBtDelete);

			divRow.appendChild(div6);
			divRow.appendChild(div4);
			divRow.appendChild(div2);
			divRow.appendChild(btDelete);

			divV.appendChild(divRow);

			let videos = document.querySelector('#videos');
			videos.appendChild(divV);

			inputTitle.focus();

//			$('#videos')
//				.append($('<div></div>').addClass('v')
//					.append($('<div></div>').addClass('row')
//						.append($('<div></div>').addClass('col-md-6')
//							.append($('<input>').addClass('titulo form-control').attr({type: 'text', name: 'video_titulo[]'})))
//						.append($('<div></div>').addClass('col-md-4')
//							.append($('<div></div>').addClass('input-group')
//								.append($('<span></span>').addClass('input-group-addon')
//									.append($('<i></i>').addClass('fa fa-youtube')))
//								.append($('<input>').addClass('video form-control').attr({type: 'text', name: 'video_url'}))))
//						.append($('<div></div>').addClass('col-md-2')
//							.append($('<button></button>').addClass('btn btn-info btn-block bt-modal-video').data('toggle', 'modal').data('target', '#modal-video').attr({type: 'button'}).on('click', function () {
//								abrirModal($(this))
//							})
//								.append($('<i></i>').addClass('fa fa-eye'))
//								.append(document.createTextNode('Visualizar'))))
//						.append($('<button></button>').addClass('btn btn-danger btn-xs bt-delete-video-galeria').attr({type: 'button'}).click(deleteVideoGaleria)
//							.append($('<i></i>').addClass('fa fa-times')))
//						.append($('<input>').addClass('hidden').attr({type: 'checkbox', name: 'video-for-delete[]'}))));
		});

		reordenaVideos = function (index, element) {
			let number = parseInt(index + 1);
			element.querySelector('.titulo').setAttribute('name', 'titulo' + number);
			element.querySelector('.video').setAttribute('name', 'video' + number);
			element.dataset.order = number;
		}

		$('#videos').sortable({
			placeholder: "overVideo",
//			beforeStop: function () {
//				$('.v').each(function (index, element) {
//					reordenaVideos(index, element);
//				});
//			}
		});

		$('#galeria-imagens').sortable({
			placeholder: "overImagem",
			beforeStop: function () {
				var value = '';
				$('.figura').each(function (index, element) {
					let id = $(this).data('id');
					value = (value == '') ? id : value + ',' + id;
				});
				$('#images_order').val(value);
//				$('.figura').each(function (index, element) {
//					element.dataset.order = parseInt(index + 1);
//				});
			},
//			start: function( event, ui ) {
//				console.log('---');
//				let largura = ui.item.find('img').width();
//				let altura = ui.item.find('img').height();
//				console.log(largura + ' x ' + altura);
//			},
			start: function(e, ui){
				ui.placeholder.width(ui.item.width());
				ui.placeholder.height(ui.item.height());
			}
		});

		$(".produtos-usados").select2();
	});
</script>
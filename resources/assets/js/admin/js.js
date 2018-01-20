$(function(){

	// Alerta:

	$('div.alert').addClass('animated bounceInRight');

	window.setTimeout(function(){
		$('div.alert').addClass('bounceOutRight');
	}, 3000);

});

/**************************************** Confirm delete: ****************************************/

confirmDelete = function (event) {
	if (confirm('Are you sure you want to delete this item??')) {
		return true;
	} else {
		event.preventDefault();
		return false;
	}
}

btDelete = document.querySelectorAll('.bt-delete');
btDelete.forEach(function (element) {
	element.addEventListener('click', confirmDelete);
});


/**************************************** Button upload and preview: ****************************************/

uploadImg = function () {
	console.log('upload img');
	let uploads = document.querySelectorAll('.upload-img');
	uploads.forEach(function (element) {
		element.style.display = 'none';
		let button = buttonUpload('Set image');
		let parent = element.parentNode;
		parent.insertBefore(button, element);
		button.onclick = function () {
			element.click();
		};
		let imgOld = element.dataset.url;
		if (imgOld != null) {
			let img = document.createElement('img');
			img.setAttribute('src', imgOld);
			img.classList.add('img-responsive');
			button.after(img);
		}
		inputFileChange(element, button);
	});
}

buttonUpload = function (t) {
	let button = document.createElement('button');
	button.classList.add('btn', 'btn-block', 'btn-default', 'bt-upload');
	button.setAttribute('type', 'button');
	let icon = document.createElement('i');
	icon.classList.add('fa', 'fa-file-image-o');
	let text = document.createTextNode(t);
	button.appendChild(icon);
	button.appendChild(text);
	return button;
}

inputFileChange = function (element, button) {
	element.onchange = function () {
		let previousImg = this.previousSibling;
		let img = (previousImg.nodeName == 'IMG') ? previousImg : document.createElement('img');
		if (this.dataset.responsive == 'true') {
			img.classList.add('img-responsive');
		}
		button.after(img);
		let reader = new FileReader();
		reader.onload = function (e) {
			img.setAttribute('src', e.target.result);
		};
		reader.readAsDataURL(this.files[0]);
	};
}


/**************************************** Upload Image Gallery: ****************************************/

uploadImgGallery = function () {
	let uploads = document.querySelectorAll('.upload-img-gallery');
	uploads.forEach(function (element) {
		element.style.display = 'none';
		let button = buttonUpload('Select images');
		let parent = element.parentNode;
		parent.insertBefore(button, element);
		button.onclick = function () {
			element.click();
		};
		element.onchange = function () {
			let previousOutput = this.previousSibling;
			let output = (previousOutput.nodeName == 'OUTPUT') ? previousOutput : document.createElement('output');
			output.innerHTML = '';
			button.after(output);
			console.log(this.files.length);
			for (let i = 0; i < this.files.length; i++) {
				let img = document.createElement('img');
				if (this.dataset.responsive == 'true') {
					img.classList.add('img-responsive');
				}
				let reader = new FileReader();
				reader.onload = function (e) {
					img.setAttribute('src', e.target.result);
				};
				reader.readAsDataURL(this.files[i]);
				output.appendChild(img)
			}
		};
	});
};

/**************************************** Show Image uploading: ****************************************/

readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#thumb').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
};

/**************************************** DataPick: ****************************************/

$.fn.datepicker.defaults.format = "dd-mm-yyyy";
$.fn.datepicker.defaults.todayHighlight = true;
$.fn.datepicker.defaults.autoclose = true;
$('.datapick').mask("99-99-9999");
$('body .datapick').datepicker();
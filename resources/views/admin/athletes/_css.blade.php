<style>
	.col-submit {
		text-align: center;
	}

	.col-submit .checkbox {
		margin-top: -5px;
	}

	.col-submit button {
		margin-bottom: 15px;
	}

	.redes-sociais {
		margin-top: 15px;
	}

	.redes-sociais .input-group {
		margin-bottom: 5px;
	}

	output img {
		opacity: 0.6;
	}

	#galeria-imagens img, output img {
		height: 200px;
		/*margin: 10px;*/
	}

	#galeria-imagens figure {
		cursor: move;
		margin: 2px 2px 0 0;
	}

	.bt-delete-img-galeria {
		margin: 5px 5px;
		opacity: 0;
		transition: all 0.3s ease;
		z-index: 99999999;
		position: absolute;
	}

	.bt-delete-video-galeria {
		margin: 7px -10px;
		position: absolute;
		opacity: 0;
		transition: all 0.3s ease;
		z-index: 99999999;
	}

	.bt-delete-img-galeria i, .bt-delete-video-galeria i {
		margin-right: 0;
	}

	figure:hover .bt-delete-img-galeria, .v:hover .bt-delete-video-galeria {
		opacity: 1;
	}

	figure {
		float: left;
	}

	.v {
		margin-bottom: 5px;
		cursor: move;
	}

	.overVideo {
		background: #cfdadd;
		display: block;
		height: 41px;
	}

	.overImagem {
		background: #cfdadd;
		/*display: block;*/
		/*height: 200px;*/
		/*width: 200px;*/
		/*margin: 10px;*/
	}

	.figura {
		float: left;
		display: inline-block;
	}

	#produtos-usados {
		margin-top: 15px;
	}

	#visivel {
		position: absolute;
		top: 62px;
		right: 15px;
	}

	#visivel label {
		margin-top: 3px;
	}

	#visivel span {
		margin-right: 5px;
	}

	.i-switch {
		margin: -4px 0;
	}
</style>
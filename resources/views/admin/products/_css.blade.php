<style>
	.bts {
		opacity: 0;
	}

	.topico:hover .bt-delete-item {
		opacity: 1;
		transition: all 0.3s ease;
	}

	.topico, .item-nutriente {
		cursor: move;
	}

	.bt-delete-item, .bt-delete-item-nutriente {
		margin: 7px -10px;
		position: absolute;
		opacity: 0;
		transition: all 0.3s ease;
		z-index: 99999999;
	}

	.bt-delete-qtd-porcao {
		position: absolute;
		right: 5px;
		margin-top: 6px;
		opacity: 0;
		transition: all 0.3s ease;
	}

	.bt-add-topic {
		margin-top: 5px;
		float: right;
	}

	.bt-delete-item-nutriente i, .bt-delete-qtd-porcao i, .bt-delete-item i {
		margin-right: 0;
	}

	.item-nutriente:hover .bt-delete-item-nutriente {
		opacity: 1;
	}

	.qtd-porcao:hover .bt-delete-qtd-porcao {
		opacity: 1;
	}

	#bt-add-nutrient {
		margin-top: -18px;
	}

	#bt-add-qtd-porcao {
		margin-top: 5px;
	}

	.nutrientes {
		padding-bottom: 30px;
	}

	.col-submit {
		margin-top: -0px;
	}

	.col-submit label {
		margin-bottom: 0px;
	}

	.col-submit button {
		margin-bottom: 15px;
	}

	.count {
		margin-left: 5px;
	}

	.over {
		background: #cfdadd;
		display: block;
		height: 36px;
	}

	.overNutriente {
		background: #cfdadd;
		display: block;
		height: 40px;
	}

	#visivel {
		position: absolute;
		top: 62px;
		right: 15px;
	}

	#visivel label {
		margin-top: 3px;
	}

	#visivel span, #out-of-stock span {
		margin-right: 5px;
	}

	.i-switch {
		margin: -4px 0;
	}

	.select2-container--default.select2-container--focus .select2-selection--multiple, .select2-container--default .select2-selection--multiple {
		padding: 1px;
	}

	.select2.select2-container.select2-container--default.select2-container {
		width: 100% !important;
		display: block;
	}

	.panel {
		background-color: rgba(255, 255, 255, 0.5);
	}

	#out-of-stock {
		position: absolute;
		top: 66px;
		right: 150px;
	}

	#coming-soon {
		position: absolute;
		top: 66px;
		right: 310px;
	}
</style>
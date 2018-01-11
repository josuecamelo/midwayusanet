<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductRelatedTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::create('product_relateds', function (Blueprint $table)
		{
			$table->increments('id');
			
			$table->integer('parent_id')->unsigned();
			$table->foreign('parent_id')->references('id')->on('products');
			
			$table->integer('product_id')->unsigned();
			$table->foreign('product_id')->references('id')->on('products');
		});*/
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::dropIfExists('product_relateds');
	}
}

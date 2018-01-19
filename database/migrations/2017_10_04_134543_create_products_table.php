<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::create('products', function (Blueprint $table)
		{
			$table->increments('id');
			
			$table->string('name', 255);
			$table->string('last_name', 255);
			$table->text('presentation');
			$table->text('description');
			$table->text('benefits')->nullable();
			$table->string('link_purchase', 255)->nullable();
			$table->text('shopify', 255)->nullable();
			$table->text('excerpt')->nullable();
			$table->string('video', 255)->nullable();
			//$table->string('related-flavors');
			$table->string('tags', 255)->nullable();
			$table->string('image', 255)->nullable();
			
			$table->integer('flavor_id')->nullable();
			$table->string('topics', 255);
			$table->integer('line_id');
			
			$table->integer('type_id');
			
			//$table->integer('category');
			//$table->integer('goal');
			//$table->integer('supplement-facts');
			$table->string('highlights_portion', 255);
			
			$table->boolean('visibility')->default(1);
		    $table->tinyInteger('offer',1)->default(0);
			$table->text('serving_size');
			$table->text('complement');
			
			$table->text('nutrients');
			$table->text('nutrient_qty');
			$table->text('nutrient_vd');
			
			$table->string('slug', 255);
			$table->string('last_name_slug', 255);
			
			$table->timestamps();
			$table->softDeletes();
		});*/
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::dropIfExists('products');
	}
}

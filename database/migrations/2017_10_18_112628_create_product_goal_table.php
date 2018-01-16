<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductGoalTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::create('product_goals', function (Blueprint $table)
		{
			$table->increments('id');
			
			$table->integer('product_id')->unsigned();
			$table->foreign('product_id')->references('id')->on('products');
			
			$table->integer('goal_id')->unsigned();
			$table->foreign('goal_id')->references('id')->on('goals');
			
			$table->timestamps();
		});*/
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::dropIfExists('product_goals');
	}
}

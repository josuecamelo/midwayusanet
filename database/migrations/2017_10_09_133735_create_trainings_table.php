<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::create('trainings', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 255);
			$table->text('description');
			$table->boolean('visibility');
			$table->string('video', 255);
			
			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')->references('id')->on('training_categories');
			
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
		//Schema::dropIfExists('trainings');
	}
}

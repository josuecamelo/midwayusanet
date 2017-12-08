<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthleteVideoTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::create('athlete_video', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 255);
			$table->string('url', 255);
			$table->integer('order');
			
			$table->integer('athlete_id')->unsigned();
			$table->foreign('athlete_id')->references('id')->on('athletes');
			
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
		//Schema::dropIfExists('athlete_video');
	}
}

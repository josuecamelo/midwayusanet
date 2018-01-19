<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::create('goals', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 255);
			$table->text('description')->nullable();
			$table->string('logo', 255)->nullable();
			$table->string('banner', 255)->nullable();
			$table->string('slug', 255);
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
		//Schema::dropIfExists('goals');
	}
}

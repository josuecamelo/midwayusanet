<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthletesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::create('athletes', function (Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 255);
			$table->string('last_name', 255);
			$table->string('profession', 255)->nullable();
			$table->text('about')->nullable();
			$table->text('bio')->nullable();
			$table->integer('age')->nullable();
			$table->decimal('weight')->nullable();
			$table->decimal('height')->nullable();
			$table->string('photo')->nullable();
			$table->string('banner')->nullable();
			$table->string('thumbnail')->nullable();
			$table->string('facebook')->nullable();
			$table->string('twitter')->nullable();
			$table->string('instagram')->nullable();
			$table->string('youtube')->nullable();
			$table->string('snapchat')->nullable();
			$table->boolean('visibility')->default(1);
			$table->string('slug', 255);
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
		//Schema::dropIfExists('athletes');
	}
}

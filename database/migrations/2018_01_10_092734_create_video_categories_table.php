<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoCategoriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('video_categories', function (Blueprint $table)
		{
			$table->increments('id');
			
			$table->integer('parent_category_id')->unsigned();
			$table->foreign('parent_category_id')->references('parent_category_id')->on('video_categories');
			
			$table->string('name', 255);
			$table->timestamps();
			$table->softDeletes();
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('video_categories');
	}
}

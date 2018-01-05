<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->integer('featured_product_id')->unsigned();
            $table->foreign('featured_product_id')->references('id')->on('products');

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
        //Schema::dropIfExists('menu');
    }
}

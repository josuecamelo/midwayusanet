<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function(Blueprint $table)
        {
            /*$table->foreign('type_id')
              ->references('id')
              ->on('types');*/

           /* $table->foreign('line_id')
                ->references('id')
                ->on('lines');*/

            /*$table->foreign('flavor_id')
                ->references('id')
                ->on('flavors');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::table('products', function(Blueprint $table)
        {
            $table->dropForeign(['type_id']);
            $table->dropForeign(['line_id']);
            $table->dropForeign(['flavor_id']);
        });*/
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('blog_posts', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('title', 255);
//            $table->string('slug', 255);
//            $table->integer('blog_category_id');
//            $table->string('description', 255)->nullable();
//            $table->string('tags', 255)->nullable();
//            $table->string('image',255)->nullable();
//            $table->text('content');
//            $table->integer('user_id');
//            $table->timestamps();
//            $table->softDeletes();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('blog_categories');
    }
}

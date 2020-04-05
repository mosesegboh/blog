<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->increments('id');
            //the unsigned means the integer can only be positive therefor it give us a bigger amount of memory at our disposal
            $table->integer('post_id')->unsigned();
            //you can manually give foreign key attribute in laravel which is done below
            $table->foreign('post_id')->references('id')->on('posts');
            $table->integer('tag_id')->unsigned();
            $table->foreign('tag_id')->unsigned('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post_tag');
    }
}

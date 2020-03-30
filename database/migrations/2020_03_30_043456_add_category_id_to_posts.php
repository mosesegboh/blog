<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //write your database code here
            //we made it nullable so that we dont have to go back and start adding categories in every post,unsigned basically means dont store the negative integers for the id column it helps with our memory save
            $table->integer('category_id')->nullable()->after('slug')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //your down function here which is opposite of up usually drop
            $table->dropColumn('category_id');
        });
    }
}

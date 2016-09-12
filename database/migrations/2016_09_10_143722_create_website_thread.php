<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteThread extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_threads',function($table){
        $table->integer('website_id')->unsigned();
        $table->foreign('website_id')->references('website_id')->on('user_websites');
        $table->increments('thread_id');
        $table->string('identifier',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

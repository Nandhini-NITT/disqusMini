<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWebsites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_websites',function($table){
        	$table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('user_id')->on('users');
        $table->char('website_name',30);
        $table->increments('website_id');
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

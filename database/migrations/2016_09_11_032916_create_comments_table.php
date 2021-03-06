<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments',function($table){
        $table->integer('thread_id')->unsigned();
        $table->foreign('thread_id')->references('thread_id')->on('website_threads');
        $table->integer('givenby')->unsigned();
        $table->foreign('givenby')->references('user_id')->on('users');
        $table->dateTime('timestamp');
        $table->text('comment');
        $table->increments('comment_id');
        $table->integer('parent_id')->default(-1);
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

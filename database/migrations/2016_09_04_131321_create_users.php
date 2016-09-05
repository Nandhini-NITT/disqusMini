<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('users', function($table)
			{
   			 $table->increments('user_id');
   			 $table->char('user_name',20);
   			 $table->char('email_id',100);
   			 $table->char('user_pass',100);
   			 $table->char('phno',11);
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
